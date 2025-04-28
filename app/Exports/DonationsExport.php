<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class DonationsExport implements FromCollection, WithHeadings
{
    protected Collection $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection(): Collection
    {
        return $this->data->map(function ($donation) {
            return [
                'Checkout ID' => $donation->checkout_id,
                'Donor Name' => $donation->donor_name,
                'Email' => $donation->email,
                'Amount (PHP)' => '₱' . number_format($donation->amount, 2),
                'Status' => ucfirst($donation->status),
                'Donated At' => $donation->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Checkout ID',
            'Donor Name',
            'Email',
            'Amount (PHP)',
            'Status',
            'Donated At',
        ];
    }
}
