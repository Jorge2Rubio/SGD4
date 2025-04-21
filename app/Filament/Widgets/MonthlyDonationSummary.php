<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Carbon\Carbon;
use Filament\Widgets\Widget;

class MonthlyDonationSummary extends Widget
{
    protected static string $view = 'filament.widgets.monthly-donation-summary';

    public function render(): \Illuminate\View\View
    {
        $total = Donation::whereMonth('created_at', Carbon::now()->month)
                         ->whereYear('created_at', Carbon::now()->year)
                         ->sum('amount');

        return view(static::$view, [
            'total' => $total,
        ]);
    }
}
