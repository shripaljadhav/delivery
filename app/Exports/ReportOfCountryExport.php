<?php

namespace App\Exports;

use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;


class ReportOfCountryExport implements FromCollection,WithHeadings, WithMapping, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;
    protected $counter;
    protected $orders;
    protected $totalAmountorder;
    protected $totalAmountSum;
    protected $totaldeliverymanAmount;
    protected $startDate;
    protected $endDate;
    protected $countryname;
    protected $selectedColumns;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->counter = 1;
        $this->orders = $request['orders'];
        $this->totalAmountSum = 0;
        $this->totaldeliverymanAmount = 0;
        $this->totalAmountorder = 0;
        $this->startDate;
        $this->endDate;
        $this->countryname;
        $this->selectedColumns = $request->input('columns', []);       
    }

    public function collection()
    {
        $params = [
            'from_date' => $this->request->input('from_date'),
            'to_date' => $this->request->input('to_date'),
            'country_id' => $this->request->input('country_id'),
        ];

        $ordersQuery = Order::with('country')->where('status', 'completed');

        if ($this->request->filled('country_id')) {
            $ordersQuery->where('country_id', $params['country_id']);
        }

        if ($params['from_date']) {
            $ordersQuery->whereDate('created_at', '>=', $params['from_date']);
        }

        if ($params['to_date']) {
            $ordersQuery->whereDate('created_at', '<=', $params['to_date']);
        }

        $orders = $ordersQuery->get();

        $this->totalAmountorder = $orders->sum(function ($order) {
            return floatval($order->payment->total_amount ?? '-');
        });
        $this->totaldeliverymanAmount += $orders->sum(function ($order) {
            return floatval($order->payment->delivery_man_commission ?? '-');
        });

        $this->totalAmountSum = $orders->sum(function ($order) {
            return floatval($order->payment->admin_commission ?? '-');
        });

        $data = $orders->map(function ($order) {
            return [
                'traking_id' => $order->milisecond,
                'id' => $order->id,
                'client_name' => optional($order->client)->name,
                'deliveryman_name' => optional($order->delivery_man)->name,
                'country_name' => optional($order->country)->name,
                'total_order' => getPriceFormat(optional($order->payment)->total_amount),
                'pickup_datetime' => $order->pickup_datetime,
                'delivery_datetime' => $order->delivery_datetime,
                'commission_type' => optional($order->city)->commission_type,
                'admin_commission' => getPriceFormat(optional($order->payment)->admin_commission),
                'deliveryman_commission' => getPriceFormat(optional($order->payment)->delivery_man_commission),
            ];
        })->toArray();


        $data[] = [
            'traking_id' => '',
            'id' => '',
            'client_name' => 'Total',
            'deliveryman_name' => '',
            'country_name' => '',
            'total_order' => getPriceFormat($this->totalAmountorder) ?? '-',
            'pickup_datetime' => '',
            'delivery_datetime' => '',
            'commission_type' => '-',
            'admin_commission' => getPriceFormat($this->totalAmountSum) ?? '-',
            'deliveryman_commission' => getPriceFormat($this->totaldeliverymanAmount) ?? '-',
        ];

        return collect($data);
    }


    public function map($order): array
    {
        $row = [];

        if (in_array('traking_id', $this->selectedColumns)) {
            $row[] = $order['traking_id'] ?? '-';
        }
        if (in_array('order_id', $this->selectedColumns)) {
            $row[] = $order['id'] ?? '-';
        }
        if (in_array('user', $this->selectedColumns)) {
            $row[] = $order['client_name'] ?? '-';
        }
        if (in_array('delivery_man_excel', $this->selectedColumns)) {
            $row[] = $order['deliveryman_name'] ?? '-';
        }
        if (in_array('country_name', $this->selectedColumns)) {
            $row[] = $order['country_name'] ?? '-';
        }
        if (in_array('pickup_date_time_excel', $this->selectedColumns)) {
            $row[] = $order['pickup_datetime'] ? \Carbon\Carbon::parse($order['pickup_datetime'])->format('d-m-Y H:i:s') : '-';
        }
        if (in_array('delivery_date_time_excel', $this->selectedColumns)) {
            $row[] = $order['delivery_datetime'] ? \Carbon\Carbon::parse($order['delivery_datetime'])->format('d-m-Y H:i:s') : '-';
        }
        if (in_array('total_amount_excel', $this->selectedColumns)) {
            $row[] = $order['total_order'] ?? '-';
        }
        if (in_array('commission_type_excel', $this->selectedColumns)) {
            $row[] = $order['commission_type'] ?? '-';
        }
        if (in_array('admin_commission_excel', $this->selectedColumns)) {
            $row[] = $order['admin_commission'] ?? '-';
        }
        if (in_array('delivery_man_commission_excel', $this->selectedColumns)) {
            $row[] = $order['deliveryman_commission'] ?? '-';
        }

        return $row;
    }

    public function headings($exportType = 'excel'): array
    {
        $headings = [];
        $fromDate = $this->request->input('from_date');
        $toDate = $this->request->input('to_date');
        $countryId = $this->request->input('country_id');
        $date = ($fromDate && $toDate) ? 'From Date: ' . ($fromDate ?: '-') . ' To Date: ' . ($toDate ?: '-') : null;
        $countryName = Country::where('id', $countryId)->first();
        $countryNameget = $countryName ? $countryName->name : '-';

        if ($exportType === 'excel') {
            $headings[] = [__('message.report_of') . $countryNameget . ' ' .($date ? ' : ' . $date : '')];
            $headings[] = [];
            $columnHeadings = [];
            foreach ($this->selectedColumns as $column) {
                switch ($column) {
                    case 'traking_id':
                        $columnHeadings[] = __('message.traking_id');
                        break;
                    case 'order_id':
                        $columnHeadings[] = __('message.order_id');
                        break;
                    case 'user':
                        $columnHeadings[] = __('message.user');
                        break;
                    case 'delivery_man_excel':
                        $columnHeadings[] = __('message.delivery_man_excel');
                        break;
                    case 'country_name':
                        $columnHeadings[] = __('message.country_name');
                        break;
                    case 'pickup_date_time_excel':
                        $columnHeadings[] = __('message.pickup_date_time_excel');
                        break;
                    case 'delivery_date_time_excel':
                        $columnHeadings[] = __('message.delivery_date_time_excel');
                        break;
                    case 'total_amount_excel':
                        $columnHeadings[] = __('message.total_amount_excel');
                        break;
                    case 'commission_type_excel':
                        $columnHeadings[] = __('message.commission_type_excel');
                        break;
                    case 'admin_commission_excel':
                        $columnHeadings[] = __('message.admin_commission_excel');
                        break;
                    case 'delivery_man_commission_excel':
                        $columnHeadings[] = __('message.delivery_man_commission_excel');
                        break;
                }
            }

            $headings[] = $columnHeadings;
        } else if ($exportType === 'pdf') {
            $columnHeadings = [];
            foreach ($this->selectedColumns as $column) {
                switch ($column) {
                    case 'traking_id':
                        $columnHeadings[] = __('message.traking_id');
                        break;
                    case 'order_id':
                        $columnHeadings[] = __('message.order_id');
                        break;
                    case 'user':
                        $columnHeadings[] = __('message.user');
                        break;
                    case 'delivery_man_excel':
                        $columnHeadings[] = __('message.delivery_man_excel');
                        break;
                    case 'country_name':
                        $columnHeadings[] = __('message.country_name');
                        break;
                    case 'pickup_date_time_excel':
                        $columnHeadings[] = __('message.pickup_date_time_excel');
                        break;
                    case 'delivery_date_time_excel':
                        $columnHeadings[] = __('message.delivery_date_time_excel');
                        break;
                    case 'total_amount_excel':
                        $columnHeadings[] = __('message.total_amount_excel');
                        break;
                    case 'commission_type_excel':
                        $columnHeadings[] = __('message.commission_type_excel');
                        break;
                    case 'admin_commission_excel':
                        $columnHeadings[] = __('message.admin_commission_excel');
                        break;
                    case 'delivery_man_commission_excel':
                        $columnHeadings[] = __('message.delivery_man_commission_excel');
                        break;
                }
            }

            $headings[] = $columnHeadings;
        }

        return $headings;
    }
    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->mergeCells('A1:' . $highestColumn . '1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        for ($row = 1; $row <= $highestRow; $row++) {

            $cellValue = $sheet->getCell('I' . $row)->getValue();
            if ($cellValue) {
                $sheet->getCell('I' . $row)->setValue(ucfirst(strtolower($cellValue)));
            }

            if ($row === 1 || $sheet->getCell('B' . $row)->getValue() === 'Total') {
                $sheet->getStyle('A' . $row . ':' . $highestColumn . $row)->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
            }
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A:K')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function getTotalAmountSumorder()
    {
        return $this->totalAmountorder;
    }
    public function getTotalAmountSum()
    {
        return $this->totalAmountSum;
    }
    public function getTotaldeliverymanAmount()
    {
        return $this->totaldeliverymanAmount;
    }
}
