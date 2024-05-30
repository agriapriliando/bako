<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function html($pasar_id, $tgl)
    {
        // untuk format standar bentuk html
        // return $pasar_id . $tgl;
        // return Carbon::parse($tgl)->subDay()->format('Y-m-d');
        // price normal
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $pasar_id)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
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

        return view('report.format', [
            'prices' => $prices,
            'tgl' => date('j F Y', strtotime($tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($tgl))),
            'pasar' => Pasar::find($pasar_id)
        ]);
    }

    public function htmlhet($pasar_id, $tgl)
    {
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $pasar_id)
            ->where('het', null)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
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
            ->where('pasar_id', $pasar_id)
            ->where('het', '!=', null)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
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

        return view('report.formathet', [
            'prices' => $prices,
            'priceshet' => $priceshet,
            'tgl' => date('j F Y', strtotime($tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($tgl))),
            'pasar' => Pasar::find($pasar_id)
        ]);
    }

    public function pdf($pasar_id, $tgl)
    {
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $pasar_id)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
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


        $pdf = Pdf::loadView('report.format', [
            'prices' => $prices,
            'tgl' => date('j F Y', strtotime($tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($tgl))),
            'pasar' => Pasar::find($pasar_id)
        ]);
        return $pdf->download();
    }

    public function pdfhet($pasar_id, $tgl)
    {
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $pasar_id)
            ->where('het', null)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
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
            ->where('pasar_id', $pasar_id)
            ->where('het', '!=', null)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
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

        $pdf = Pdf::loadView('report.formathet', [
            'prices' => $prices,
            'priceshet' => $priceshet,
            'tgl' => date('j F Y', strtotime($tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($tgl))),
            'pasar' => Pasar::find($pasar_id)
        ]);
        return $pdf->download();
    }
}
