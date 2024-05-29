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
        // price normal
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $this->pasar_id)
            ->where('het', null)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($this->tgl)->format('Y-m-d'))
            ->get();
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

        // price dgn HET
        $priceshet = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $this->pasar_id)
            ->where('het', '!=', null)
            // ->whereDate('created_at', '>=', Carbon::parse($this->tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($this->tgl)->format('Y-m-d'))
            ->get();
        for ($i = 0; $i < count($priceshet); $i++) {
            $priceshet[$i]['nama_item'] = $priceshet[$i]->item->nama;
            $het = Price::where('pasar_id', $priceshet[$i]['pasar_id'])
                ->where('item_id', $priceshet[$i]['item_id'])
                ->whereDate('created_at', Carbon::parse($priceshet[$i]['created_at'])->subDay()->format('Y-m-d'))->first();
            if ($het) {
                $priceshet[$i]['het'] = $het['hargahariini'];
            } else {
                $priceshet[$i]['het'] = FALSE;
            }
            $priceshet[$i]['hargaselisih'] = $priceshet[$i]['hargahariini'] - $priceshet[$i]['het'];
        }

        return view('report.formatexcel', [
            'prices' => $prices,
            'priceshet' => $priceshet,
            'tgl' => date('j F Y', strtotime($this->tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($this->tgl))),
            'pasar' => Pasar::find($this->pasar_id)
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
            'F' => 9,
            'G' => 8,
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
