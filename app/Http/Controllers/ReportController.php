<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index($pasar_id, $tgl)
    {
        // return $pasar_id . $tgl;
        // return Carbon::parse($tgl)->subDay()->format('Y-m-d');
        $prices = Price::with('item')->orderBy('item_id')
            ->where('pasar_id', $pasar_id)
            // ->whereDate('created_at', '>=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
            ->whereDate('created_at', '=', Carbon::parse($tgl)->format('Y-m-d'))
            ->get();
        $pricesCompare = Price::with('item')->orderBy('created_at', 'DESC')
            ->where('pasar_id', $pasar_id)
            ->whereDate('created_at', '=', Carbon::parse($tgl)->subDay()->format('Y-m-d'))
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
        return view('report.format1', [
            'prices' => $prices,
            'tgl' => date('j F Y', strtotime($tgl)),
            'tglmin' => date('j F Y', strtotime('-1 day', strtotime($tgl))),
            'pasar' => Pasar::find($pasar_id)
        ]);
    }
}
