<?php

namespace App\Filament\Admin\Resources\Domains\Pages;

use App\Filament\Admin\Resources\Domains\DomainResource;
use App\Models\Domain;
use App\Models\HostingAccount;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Services\WhoisService;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewDomain extends ViewRecord
{
    protected static string $resource = DomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_invoice')
                ->label('Generate Invoice')
                ->icon('heroicon-o-document-text')
                ->color('success')
                ->visible(fn (): bool => $this->getRecord()->isI2Managed() && $this->getRecord()->price > 0)
                ->form(function (Domain $record): array {
                    return [
                        DatePicker::make('due_at')
                            ->label('Due Date')
                            ->default(now()->addDays(14))
                            ->required(),
                        Toggle::make('combined')
                            ->label('Include hosting on same invoice')
                            ->default(false)
                            ->live(),
                        Select::make('hosting_account_id')
                            ->label('Hosting Account')
                            ->options(
                                HostingAccount::where('client_id', $record->client_id)
                                    ->where('management_type', 'i2_managed')
                                    ->whereNotNull('price')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->visible(fn ($get) => (bool) $get('combined')),
                        TextInput::make('notes')
                            ->label('Invoice Notes')
                            ->placeholder('Optional notes for this invoice'),
                    ];
                })
                ->action(function (array $data, Domain $record): void {
                    $year     = now()->year;
                    $sequence = str_pad(
                        (string) (Invoice::whereYear('created_at', $year)->count() + 1),
                        4, '0', STR_PAD_LEFT
                    );

                    $invoice = Invoice::create([
                        'invoice_number' => 'INV-' . $year . '-' . $sequence,
                        'client_id'      => $record->client_id,
                        'status'         => 'draft',
                        'issued_at'      => today(),
                        'due_at'         => $data['due_at'],
                        'currency'       => $record->currency ?? 'NGN',
                        'notes'          => $data['notes'] ?? null,
                        'created_by'     => auth()->id(),
                    ]);

                    InvoiceItem::create([
                        'invoice_id'            => $invoice->id,
                        'subscriptionable_type' => Domain::class,
                        'subscriptionable_id'   => $record->id,
                        'description'           => 'Domain renewal: ' . $record->domain_name,
                        'quantity'              => 1,
                        'unit_price'            => $record->price,
                        'line_total'            => $record->price,
                    ]);

                    if (! empty($data['hosting_account_id'])) {
                        $hosting = HostingAccount::find($data['hosting_account_id']);

                        if ($hosting) {
                            InvoiceItem::create([
                                'invoice_id'            => $invoice->id,
                                'subscriptionable_type' => HostingAccount::class,
                                'subscriptionable_id'   => $hosting->id,
                                'description'           => 'Hosting renewal: ' . $hosting->name,
                                'quantity'              => 1,
                                'unit_price'            => $hosting->price,
                                'line_total'            => $hosting->price,
                            ]);
                        }
                    }

                    $invoice->recalculate();

                    Notification::make()
                        ->title('Invoice created')
                        ->body('Invoice ' . $invoice->invoice_number . ' created as draft.')
                        ->success()
                        ->send();

                    $this->redirect(
                        \App\Filament\Admin\Resources\Invoices\InvoiceResource::getUrl('edit', ['record' => $invoice])
                    );
                }),

            Action::make('run_whois')
                ->label('Run WHOIS Check')
                ->icon('heroicon-o-magnifying-glass')
                ->color('info')
                ->visible(fn (): bool => filled($this->getRecord()->domain_name))
                ->requiresConfirmation()
                ->modalHeading('Run WHOIS Check')
                ->modalDescription('This will query the WHOIS server for ' . $this->getRecord()->domain_name . ' and update the monitoring data.')
                ->action(function (): void {
                    $record  = $this->getRecord();
                    $service = app(WhoisService::class);
                    $service->check($record);
                    $service->sendExpiryAlerts($record->fresh());

                    Notification::make()
                        ->title('WHOIS check complete')
                        ->body('Monitoring data updated for ' . $record->domain_name)
                        ->success()
                        ->send();

                    $this->refreshFormData([]);
                }),

            EditAction::make(),
        ];
    }
}
