<?php

namespace App\Exports;

use App\TrainingQuizResult;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainingQuizExport implements FromCollection, ShouldAutoSize , WithMapping, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return TrainingQuizResult::select('user_id', DB::raw('count(*) as total'),'users.*')
            ->join('users', 'users.id', 'training_quiz_results.user_id')->groupBy('user_id')->orderBy('name','asc')->get();
    }

    /**
     * @var Invoice $invoice
     */
    public function map($invoice): array
    {
        return [
            $invoice->name,
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

?>
