<?php

namespace App\Filament\Admin\Resources\Invoices\Pages;

use App\Filament\Admin\Resources\Invoices\InvoiceResource;
use App\Notifications\InvoicePaymentLinkNotification;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Notification;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sharePaymentLink')
                ->label('Share Payment Link')
                ->icon('heroicon-o-link')
                ->color('gray')
                ->modalHeading('Public payment link')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close')
                ->modalContent(fn () => view('filament.admin.invoices.share-payment-link', [
                    'url' => $this->record->publicPaymentUrl(),
                ])),
            Action::make('resendPaymentLink')
                ->label('Resend Payment Link')
                ->icon('heroicon-o-paper-airplane')
                ->color('primary')
                ->requiresConfirmation()
                ->action(function (): void {
                    $this->record->ensurePublicToken();

                    $recipient = $this->record->client->owner;

                    if ($recipient) {
                        $recipient->notify(new InvoicePaymentLinkNotification($this->record));
                    } elseif (filled($this->record->client->email)) {
                        Notification::route('mail', $this->record->client->email)
                            ->notify(new InvoicePaymentLinkNotification($this->record));
                    }

                    FilamentNotification::make()
                        ->title('Payment link sent to the client')
                        ->success()
                        ->send();
                }),
            EditAction::make(),
        ];
    }
}
