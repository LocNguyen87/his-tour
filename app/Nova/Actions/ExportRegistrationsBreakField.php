<?php

namespace App\Nova\Actions;

use App\Registration;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Http\Requests\ActionRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ExportRegistrationsBreakField extends DownloadExcel implements
    FromQuery,
    WithMapping,
    WithColumnFormatting,
    ShouldAutoSize,
    WithHeadings
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param Registration $registration
     *
     * @return array
     */
    public function map($registration) : array
    {
        return [
            $registration->id,
            $registration->registration_code,
            $registration->referer,
            $registration->tour->title,
            $registration->tour->from->title,
            $registration->adults_number,
            $registration->adults_price,
            $registration->infants_number,
            $registration->infants_price,
            $registration->childs_shared_number,
            $registration->childs_shared_price,
            $registration->childs_single_number,
            $registration->childs_single_price,
            $registration->total_price,
            $registration->payment_method,
            Date::dateTimeToExcel($registration->created_at),
        ];
    }

    public function columnFormats() : array
    {
        return [
            'A' => NumberFormat::FORMAT_GENERAL,
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_NUMBER,
            'G' => '#,##0',
            'H' => NumberFormat::FORMAT_NUMBER,
            'I' => '#,##0',
            'J' => NumberFormat::FORMAT_NUMBER,
            'K' => '#,##0',
            'L' => NumberFormat::FORMAT_NUMBER,
            'M' => '#,##0',
            'N' => '#,##0',
            'O' => NumberFormat::FORMAT_TEXT,
            'P' => NumberFormat::FORMAT_DATE_DATETIME
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Registration Code',
            'Referer',
            'Tour Name',
            'Tour From',
            'Adults',
            'Adults Price',
            'Infants',
            'Infants Price',
            'Childs (Shared)',
            'Childs (Shared) Price',
            'Childs (Single)',
            'Childs (Single) Price',
            'Total Price',
            'Payment Method',
            'Created At'
        ];
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
