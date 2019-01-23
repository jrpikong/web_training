<?php

namespace App\Exports;

use App\LogTransaction;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LogTransactionExport implements FromCollection, ShouldAutoSize , WithMapping, WithHeadings
{
    private $dateStart, $dateEnd;
    public function __construct($dateStart,$dateEnd)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $logs =  LogTransaction::select('user_id', DB::raw('count(*) as total'))->with('users');
        if (!empty($this->dateStart) && !empty($this->dateEnd)) {
            $users = $logs->whereBetween(DB::raw('DATE(created_at)'),[$this->dateStart,$this->dateEnd]);
        }

        $logs = $users->groupBy('user_id')->get();

        return $logs;
    }

    /**
     * @var Invoice $invoice
     */
    public function map($invoice): array
    {
        return [
            $invoice->users->name,
            $invoice->total
        ];
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Total',
        ];
    }
}
