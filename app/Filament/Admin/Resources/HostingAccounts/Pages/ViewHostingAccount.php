<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Pages;

use App\Filament\Admin\Resources\HostingAccounts\HostingAccountResource;
use App\Models\HostingAccount;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewHostingAccount extends ViewRecord
{
    protected static string $resource = HostingAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_invoice')
                ->label('Generate Invoice')
                ->icon('heroicon-o-document-text')
                ->color('success')
                ->visible(fn (): bool => $this->getRecord()->isI2Managed() && $this->getRecord()->price > 0)
                ->form([
                    DatePicker::make('due_at')
                        ->label('Due Date')
                        ->default(now()->addDays(14))
                        ->required(),
                    TextInput::make('notes')
                        ->label('Invoice Notes')
                        ->placeholder('Optional notes for this invoice'),
                ])
                ->action(function (array $data, HostingAccount $record): void {
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
                        'subscriptionable_type' => HostingAccount::class,
                        'subscriptionable_id'   => $record->id,
                        'description'           => 'Hosting renewal: ' . $record->name,
                        'quantity'              => 1,
                        'unit_price'            => $record->price,
                        'line_total'            => $record->price,
                    ]);

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

            EditAction::make(),
        ];
    }
}
