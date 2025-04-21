<?php

namespace App\Filament\Exports;

use App\Models\Donation;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class DonationExporter extends Exporter
{
    protected static ?string $model = Donation::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('checkout_id'),
            ExportColumn::make('donor_name'),
            ExportColumn::make('email'),
            ExportColumn::make('amount'),
            ExportColumn::make('status'),
            ExportColumn::make('created_at')->label('Donated At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your donation export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
