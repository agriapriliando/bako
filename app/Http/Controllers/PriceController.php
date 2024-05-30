<?php

namespace App\Http\Controllers;

use App\DataTables\PricesDataTable;
use App\Models\Category;
use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use DataTables;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Price::with('item', 'pasar', 'user');
            return Datatables::of($data)
                // ->editColumn('item.nama', function ($row) {
                //     $urledit = url('prices/' . $row->id . '/edit');
                //     $urldel = \Carbon\Carbon::parse($row->created_at)->translatedFormat('j F, Y H:i');
                //     $btn = '<div class="d-flex gap-1 mt-1">
                //     <a href="' . $urledit . '" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                //     <a data-tgl="' . $urldel . ' Wib" data-id="' . $row->id . '"
                //         data-name="' . $row->item->nama . '" href="#" class="btn btn-sm btn-danger btn-delete">
                //         <i class="lni lni-eraser"></i>
                //     </a></div>';
                //     $warna = $row->pasar->id == 1 ? 'bg-success' : 'bg-danger';
                //     // return $row->item->nama . '</br> <span class="badge ' . $warna . '">Lokasi : ' . $row->pasar->nama . '</span>' . $btn;
                //     return $row->item->nama . '</br>' . $btn;
                // })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                    // return $row->created_at . " WIB";
                })
                ->editColumn('hargahariini', function ($row) {
                    return "Rp " . $row->hargahariini;
                })
                ->editColumn('user.name', function ($row) {
                    return "Update by </br> " . $row->user->name;
                })
                ->addColumn('action', function ($data) {
                    $urledit = url('prices/' . $data->id . '/edit');
                    $urldel = \Carbon\Carbon::parse($data->created_at)->translatedFormat('j F, Y H:i');
                    $btn = '<div class="d-flex gap-1">
                    <a href="' . $urledit . '" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                    <a data-tgl="' . $urldel . ' Wib" data-id="' . $data->id . '"
                        data-name="' . $data->item->nama . '" href="#" class="btn btn-sm btn-danger btn-delete">
                        <i class="lni lni-eraser"></i>
                    </a>
                </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'hargahariini', 'user.name'])
                ->make();
        }
        return view('price.index');
    }

    // public function index(PricesDataTable $dataTable)
    // {
    //     return $dataTable->render('price.index');
    // }
    public function indexx()
    {
        $prices = Price::with('item', 'pasar')->orderBy('created_at', 'DESC')->get();
        for ($i = 0; $i < count($prices); $i++) {
            $hargakemarin = Price::where('pasar_id', $prices[$i]['pasar_id'])
                ->where('item_id', $prices[$i]['item_id'])
                ->whereDate('created_at', Carbon::parse($prices[$i]['created_at'])->subday()->format('Y-m-d'))->first();
            if ($hargakemarin) {
                $prices[$i]['hargakemarin'] = $hargakemarin['hargahariini'];
            } else {
                $prices[$i]['hargakemarin'] = FALSE;
            }
        }
        // dd($prices[0]);
        return view('price.index', [
            'prices' => $prices,
            'categories' => Category::all()
        ]);
    }

    public function hargapasar($slugpasar)
    {
        $pasar = Pasar::where('slugpasar', $slugpasar)->first();
        return view('price.hargapasar', [
            'prices' => Price::with('item', 'pasar')->where('pasar_id', $pasar->id)
                ->whereDate('created_at', date('Y-m-d'))
                ->orderBy('updated_at', 'DESC')
                ->get(),
            'categories' => Category::all(),
            'pasar' => $pasar,
            'tglstart' => Carbon::now(),
            'tglend' => Carbon::now()
        ]);
    }

    public function priceby(Request $request)
    {
        $tglrange = $request->tglrange;
        $dates = explode(' - ', $tglrange);
        $tglstart = date("Y-d-m 00:00:00", strtotime($dates[0]));
        $tglend = date("Y-d-m 23:59:59", strtotime($dates[1]));
        // return $tglstart;
        session()->flash('tglstart', TRUE);
        $allprices = Price::whereBetween('updated_at', [$tglstart, $tglend])->get();
        return view('price.hargatgl', [
            'tglstart' => $tglstart,
            'tglend' => $tglend,
            'prices' => $allprices,
            'categories' => Category::all(),

        ]);
    }


    public function listitem($tglinput, $pasar_id)
    {
        $tglinput = str_replace('-', '/', $tglinput);
        $itemExist = Price::whereDate('created_at', $tglinput)->where('pasar_id', $pasar_id)->get();
        $items_id = $itemExist->pluck('item_id');
        // return $items_id;
        $items = Item::whereNotIn('id', $items_id)->get();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($pasar_id)
    {
        $pasar = Pasar::find($pasar_id);
        return view('price.create', [
            'items' => Item::all(),
            'pasar' => $pasar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'item_id' => 'required',
            'pasar_id' => 'required',
            'hargahariini' => 'required',
            'tglprice' => 'required'
        ]);
        // $time = Carbon::now()->toTimeString();
        $time = Carbon::now()->format('H:i:s');
        $gabung = $request->tglprice . " " . $time;
        // $gabung = date('Y-m-d H:i:s', strtotime($gabung));
        // return $gabung;
        Price::create([
            'item_id' => $request->item_id,
            'pasar_id' => $request->pasar_id,
            'user_id' => Auth::id(),
            'hargahariini' => $request->hargahariini,
            'het' => $request->het, //item baru
            'hargaminggulalu' => 0,
            'hargabulanlalu' => 0,
            'deskripsi' => '',
            'status' => 'Tetap',
            'selisih' => 2000,
            'persen' => '2',
            'created_at' => $gabung,
            'updated_at' => $gabung
        ]);
        $pasar = Pasar::find($request->pasar_id);
        return redirect('hargapasar/' . $pasar->slugpasar)->with('status', 'Anda berhasil Menambah Harga');
    }

    // 

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        $pasar = Pasar::where('id', $price->pasar_id)->first();
        return view('price.edit', [
            'price' => $price,
            'pasar' => $pasar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        $dataValidated = $request->validate([
            'hargahariini' => 'required',
        ]);
        $dataValidated['het'] = $request->het;
        $price->update($dataValidated);

        return redirect('prices/' . $price->id . '/edit/')->with('status', 'Harga Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json([
            'message' => 'Data Harga Berhasil Dihapus'
        ]);
    }

    public function deletes($tgl, $pasar_id)
    {
        Price::whereDate('created_at', '=', $tgl)
            ->where('pasar_id', $pasar_id)->delete();
        $pasar = Pasar::find($pasar_id);
        return redirect('hargapasar/' . $pasar->slugpasar)->with('status', 'Berhasil Dihapus');
    }

    public function copyDataKemarin($tgl, $pasar_id)
    {
        $cek = Price::whereDate('created_at', Carbon::parse($tgl)->format('Y-m-d'))
            ->where('pasar_id', $pasar_id)
            ->get();
        // return $cek;
        if (count($cek) == 0) {
            $prices = Price::whereDate('created_at', Carbon::parse($tgl)->subDays(1)->format('Y-m-d'))
                ->get();
            // return $prices;
            $i = 0;
            foreach ($prices as $item) {
                unset($prices[$i]['id']);
                unset($prices[$i]['created_at']);
                unset($prices[$i]['updated_at']);
                // $prices[$i]['created_at'] = Carbon::now()->format('Y-m-d H:i:s e');
                // $prices[$i]['updated_at'] = Carbon::now()->format('Y-m-d H:i:s e');
                // Price::insert($prices[$i]);
                $i++;
                Price::create([
                    "item_id" => $item->item_id,
                    "pasar_id" => $item->pasar_id,
                    "user_id" => $item->user_id,
                    "hargahariini" => 0,
                    "het" => $item->het,
                    "hargaminggulalu" => 0,
                    "hargabulanlalu" => 0,
                    "deskripsi" => "",
                    "status" => "Tetap",
                    "selisih" => 0,
                    "persen" => 0
                ]);
            }
            // return $prices;
            $pasar = Pasar::find($pasar_id);
            return redirect('hargapasar/' . $pasar->slugpasar)->with('status', 'Berhasil Duplikat');
        } else {
            $pasar = Pasar::find($pasar_id);
            return redirect('hargapasar/' . $pasar->slugpasar)->with('status', 'Data Masih Ada, Silahkan Hapus Seluruh Harga');
        }
    }
}
