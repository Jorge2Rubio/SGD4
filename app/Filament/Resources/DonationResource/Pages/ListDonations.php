<?php

namespace App\Filament\Resources\DonationResource\Pages;

use App\Filament\Resources\DonationResource;
use App\Filament\Exports\DonationExporter;
use Filament\Actions\ExportAction; // ✅ Correct namespace
use Filament\Resources\Pages\ListRecords;

class ListDonations extends ListRecords
{
    protected static string $resource = DonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make('export')
                ->exporter(DonationExporter::class)
                ->label('Export Donations')
                ->fileName(fn () => 'donations_' . now()->format('Y-m-d_H-i-s')),
        ];
    }

    protected function hasCreateAction(): bool
    {
        return false;
    }
}
