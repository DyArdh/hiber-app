<?php

namespace App\Http\Controllers;
use App\Models\penjualan;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RekapPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::all();

        return view('penjualan.rekap.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function viewFilter(Request $request)
     {  

        $startDate = Carbon::parse(request()->startDate)->toDateTimeString();
        $endDate = Carbon::parse(request()->endDate)->addSeconds(86399)->toDateTimeString();
        
        // $data = Penjualan::all();
        $data = Penjualan::whereBetween('updated_at', [$startDate, $endDate])->get();
        // dd($data);


        return view('penjualan.rekap.viewFilter', compact('data'));
     }
}
