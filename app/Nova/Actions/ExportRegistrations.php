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

class ExportRegistrations extends DownloadExcel implements
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
            $registration->full_name,
            $registration->phone_number,
            $registration->email,
            $registration->address,
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
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
            'I' => NumberFormat::FORMAT_NUMBER,
            'J' => '#,##0',
            'K' => NumberFormat::FORMAT_NUMBER,
            'L' => '#,##0',
            'M' => NumberFormat::FORMAT_NUMBER,
            'N' => '#,##0',
            'O' => NumberFormat::FORMAT_NUMBER,
            'P' => '#,##0',
            'Q' => '#,##0',
            'R' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_DATE_DATETIME
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Registration Code',
            'Full Name',
            'Phone Number',
            'Email',
            'Address',
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
