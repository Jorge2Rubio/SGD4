<?php

namespace App\Filament\Resources;

use App\Models\Donation;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DonationsExport;
use App\Filament\Resources\DonationResource\Pages;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Transactions';
    protected static ?string $label = 'Donations';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('checkout_id')->disabled(),
            TextInput::make('donor_name')->required(),
            TextInput::make('email')->email()->nullable(),
            TextInput::make('amount')->numeric()->disabled(),
            TextInput::make('status')->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('donor_name')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('amount')
                    ->money('PHP', true), // formatted currency
                BadgeColumn::make('status')->colors([
                    'success' => 'active',
                    'danger' => 'failed',
                    'warning' => 'pending',
                ]),
                TextColumn::make('created_at')->dateTime()->label('Donated At'),
            ])
            ->filters([
                Filter::make('created_at')
                    ->label('Donated Date')
                    ->form([
                        DatePicker::make('from'),
                        DatePicker::make('until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn ($q) => $q->whereDate('created_at', '<=', $data['until']));
                    }),
            ])
            ->headerActions([
                Action::make('export_excel')
                    ->label('Export to Excel')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->color('success')
                    ->form([
                        DatePicker::make('from')->label('From Date'),
                        DatePicker::make('to')->label('To Date'),
                    ])
                    ->action(function (array $data) {
                        $query = Donation::query();

                        if ($data['from']) {
                            $query->whereDate('created_at', '>=', $data['from']);
                        }

                        if ($data['to']) {
                            $query->whereDate('created_at', '<=', $data['to']);
                        }

                        $export = new DonationsExport($query->get()); // pass filtered data

                        return Response::streamDownload(
                            function () use ($export) {
                                echo Excel::raw($export, \Maatwebsite\Excel\Excel::XLSX);
                            },
                            'donations_filtered_export.xlsx'
                        );
                        
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
        ];
    }
}
