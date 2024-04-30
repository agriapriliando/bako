<?php

namespace App\Exports;

use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportExport implements
    FromView,
    WithDrawings,
    WithColumnWidths,
    WithEvents
{

    protected $pasar_id, $tgl;

    function __construct($pasar_id, $tgl)
    {
        $this->pasar_id = $pasar_id;
        $this->tgl = $tgl;
    }

    public function view(): View
    {
        // return $pasar_id . $tgl;
        // return Carbon::parse($tgl)->subDay()->format('Y-m-d');
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $this->pasar_id)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($this->tgl)->format('Y-m-d'))
            ->get();
        $pricesCompare = Price::with('item')->orderBy('created_at', 'DESC')
            ->where('pasar_id', $this->pasar_id)
            ->whereDate('created_at', '=', Carbon::parse($this->tgl)->subDay()->format('Y-m-d'))
            ->get();
        // dd($pricesCompare);
        for ($i = 0; $i < count($prices); $i++) {
            $prices[$i]['nama_item'] = $prices[$i]->item->nama;
            $hargakemarin = Price::where('pasar_id', $prices[$i]['pasar_id'])
                ->where('item_id', $prices[$i]['item_id'])
                ->whereDate('created_at', Carbon::parse($prices[$i]['created_at'])->subDay()->format('Y-m-d'))->first();
            if ($hargakemarin) {
                $prices[$i]['hargakemarin'] = $hargakemarin['hargahariini'];
            } else {
                $prices[$i]['hargakemarin'] = FALSE;
            }
            $prices[$i]['hargaselisih'] = $prices[$i]['hargahariini'] - $prices[$i]['hargakemarin'];
        }
        return view('report.formatexcel', [
            'prices' => $prices,
            'tgl' => date('j F Y', strtotime($this->tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($this->tgl))),
            'pasar' => Pasar::find($this->pasar_id),
        ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('assets/images/kop_surat.JPG'));
        $drawing->setHeight(95);
        $drawing->setCoordinates('A1');
        return $drawing;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 27,
            'C' => 15,
            'D' => 15,
            'E' => 12,
            'F' => 7,
            'G' => 10,
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(90);
                // $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(50);
            },
        ];
    }
}
