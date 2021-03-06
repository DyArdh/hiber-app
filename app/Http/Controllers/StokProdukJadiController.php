<?php

namespace App\Http\Controllers;

use App\Models\HargaProduct;
use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokProdukJadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', StokGudang::class);

        $data = StokGudang::where('status', 'Produk Jadi')->with('hargaProduct')->paginate(20);

        return view('stok.produk_jadi.index', compact('data'), ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', StokGudang::class);

        $data = HargaProduct::all();

        return view('stok.produk_jadi.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', StokGudang::class);

        $validations = $request->validate([
            'berat' => 'required|numeric',
            'jenis' => 'required',
            'merk_id' => 'required',
            'harga' => 'required|numeric|min:0',
            'penanggung_jawab' => 'required|max:255',
        ]);

        $validations['status'] = 'Produk Jadi';

        StokGudang::create($validations);
        return redirect()->route('produkJadi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', StokGudang::class);

        $data = StokGudang::findOrFail($id);
        $merk = HargaProduct::all();
        return view('stok.produk_jadi.edit', compact('data', 'merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', StokGudang::class);

        $validations = $request->validate([
            'berat' => 'required|numeric',
            'merk_id' => 'required',
            'harga' => 'required|numeric|min:0',
            'penanggung_jawab' => 'required|max:255',
        ]);

        $data = StokGudang::findOrFail($id);

        $data->update($validations);
        return redirect()->route('produkJadi.index')->with('success', 'Data berhasil diubah');
    }
}
