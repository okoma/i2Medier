<?php

namespace App\Filament\Admin\Resources\Projects\Pages;

use App\Enums\ProjectStatus;
use App\Filament\Admin\Resources\Invoices\InvoiceResource;
use App\Filament\Admin\Resources\Projects\ProjectResource;
use App\Models\Invoice;
use App\Models\Project;
use App\Notifications\ProjectConvertedClientNotification;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Notification;
use Throwable;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected string $view = 'filament.admin.resources.projects.pages.view-project';

    protected function getHeaderActions(): array
    {
        return [
            // ── Status transition actions ─────────────────────────────────────

            Action::make('sendProposal')
                ->label('Send Proposal')
                ->icon(Heroicon::OutlinedPaperAirplane)
                ->color('info')
                ->requiresConfirmation()
                ->modalHeading('Mark as Proposal Sent?')
                ->modalDescription('This will move the project to "Proposal Sent" and log the change in the activity notes.')
                ->modalSubmitActionLabel('Yes, mark as sent')
                ->visible(fn (Project $record) => $record->status === ProjectStatus::Enquiry)
                ->action(function (Project $record): void {
                    $this->transitionStatus($record, ProjectStatus::ProposalSent);
                }),

            Action::make('markNegotiating')
                ->label('Negotiating')
                ->icon(Heroicon::OutlinedArrowPath)
                ->color('primary')
                ->requiresConfirmation()
                ->modalHeading('Move to Negotiating?')
                ->modalDescription('This will move the project to "Negotiating" and log the change in the activity notes.')
                ->modalSubmitActionLabel('Yes, move to negotiating')
                ->visible(fn (Project $record) => $record->status === ProjectStatus::ProposalSent)
                ->action(function (Project $record): void {
                    $this->transitionStatus($record, ProjectStatus::Negotiating);
                }),

            Action::make('convertProject')
                ->label('Convert Project')
                ->icon(Heroicon::OutlinedCheckCircle)
                ->color('success')
                ->modalHeading('Convert this project?')
                ->modalDescription('This will mark the project as Converted and set the conversion date.')
                ->modalSubmitActionLabel('Convert Project')
                ->visible(fn (Project $record) => $record->status->canBeConverted())
                ->form([
                    Toggle::make('notify_client')
                        ->label('Notify client by email')
                        ->helperText('Send the client a confirmation email that their project has been approved.')
                        ->default(true),
                ])
                ->action(function (Project $record, array $data): void {
                    $previous = $record->status->getLabel();

                    $record->update([
                        'status'       => ProjectStatus::Converted,
                        'converted_at' => now(),
                    ]);

                    $record->notes()->create([
                        'user_id' => auth()->id(),
                        'body'    => 'Project converted (was ' . $previous . '). Conversion date set to ' . now()->format('d M Y') . '.',
                    ]);

                    if ($data['notify_client'] ?? false) {
                        $client = $record->client;
                        try {
                            Notification::route('mail', $client->email)
                                ->notify(new ProjectConvertedClientNotification($record, $client->contact_name));
                        } catch (Throwable $e) {
                            report($e);
                        }
                    }
                }),

            Action::make('declineProject')
                ->label('Decline')
                ->icon(Heroicon::OutlinedXCircle)
                ->color('danger')
                ->modalHeading('Decline this project?')
                ->modalDescription('The project will be marked as Declined. Please provide a reason — it will be saved to the activity notes.')
                ->modalSubmitActionLabel('Decline Project')
                ->visible(fn (Project $record) => $record->status->canBeDeclined())
                ->form([
                    Textarea::make('reason')
                        ->label('Reason for declining')
                        ->required()
                        ->rows(3)
                        ->placeholder('e.g. Budget too low, outside our scope, client unresponsive…'),
                ])
                ->action(function (Project $record, array $data): void {
                    $previous = $record->status->getLabel();

                    $record->update(['status' => ProjectStatus::Declined]);

                    $record->notes()->create([
                        'user_id' => auth()->id(),
                        'body'    => 'Project declined (was ' . $previous . '). Reason: ' . $data['reason'],
                    ]);
                }),

            // ── Invoice shortcut ──────────────────────────────────────────────

            Action::make('createInvoice')
                ->label('Create Invoice')
                ->icon(Heroicon::OutlinedDocumentText)
                ->color('gray')
                ->requiresConfirmation()
                ->modalHeading('Create invoice from project?')
                ->modalDescription('A draft invoice will be created from the selected services. You can edit amounts and add notes before sending.')
                ->modalSubmitActionLabel('Create Draft Invoice')
                ->visible(fn (Project $record) => filled($record->services) && count($record->services) > 0)
                ->action(function (Project $record): void {
                    $year     = now()->year;
                    $sequence = str_pad(
                        (string) (Invoice::whereYear('created_at', $year)->count() + 1),
                        4,
                        '0',
                        STR_PAD_LEFT,
                    );

                    $services = collect($record->services);
                    $currency = $services->first()['currency'] ?? 'NGN';

                    $subtotal = $services->sum(function (array $service): float {
                        $base       = (float) ($service['price'] ?? 0);
                        $addonTotal = collect($service['addons'] ?? [])->sum('total_price');

                        return $base + (float) $addonTotal;
                    });

                    $invoice = Invoice::query()->create([
                        'invoice_number'  => 'INV-' . $year . '-' . $sequence,
                        'client_id'       => $record->client_id,
                        'project_id'      => $record->id,
                        'status'          => 'draft',
                        'currency'        => $currency,
                        'subtotal'        => $subtotal,
                        'tax_rate'        => 0,
                        'tax_amount'      => 0,
                        'discount_amount' => 0,
                        'total'           => $subtotal,
                        'issued_at'       => now(),
                        'due_at'          => now()->addDays(14),
                        'created_by'      => auth()->id(),
                    ]);

                    foreach ($services as $service) {
                        $label = $service['service_name'];
                        if (! empty($service['variant_name'])) {
                            $label .= ' — ' . $service['variant_name'];
                        }

                        $invoice->items()->create([
                            'description' => $label,
                            'quantity'    => 1,
                            'unit_price'  => (float) ($service['price'] ?? 0),
                            'line_total'  => (float) ($service['price'] ?? 0),
                        ]);

                        foreach ($service['addons'] ?? [] as $addon) {
                            $invoice->items()->create([
                                'description' => $addon['addon_name'],
                                'quantity'    => (int) ($addon['quantity'] ?? 1),
                                'unit_price'  => (float) ($addon['unit_price'] ?? 0),
                                'line_total'  => (float) ($addon['total_price'] ?? 0),
                            ]);
                        }
                    }

                    $this->redirect(InvoiceResource::getUrl('edit', ['record' => $invoice]));
                }),

            // ── Record management ─────────────────────────────────────────────

            EditAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    private function transitionStatus(Project $record, ProjectStatus $to): void
    {
        $from = $record->status->getLabel();

        $record->update(['status' => $to]);

        $record->notes()->create([
            'user_id' => auth()->id(),
            'body'    => 'Status changed from ' . $from . ' to ' . $to->getLabel() . '.',
        ]);
    }
}
