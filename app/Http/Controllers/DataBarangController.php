<?php

namespace App\Http\Controllers;

use App\Models\dataBarang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBarang = dataBarang::all();
        $data['success'] = true;
        $data['message'] = 'Data Barang';
        $data['result']  = $dataBarang;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_barang' => 'required',
            'stok_barang' => 'required',
        ]);

        $result = dataBarang::create($validate);
        $data['success'] = true;
        $data['message'] = 'Data Barang Beerhasil Ditambahkan';
        $data['result'] = $result;
        return response()->json($data, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(dataBarang $dataBarang)
    {
        $dataBarang = dataBarang::find($dataBarang);
        $data['success'] = true;
        $data['message'] = 'Data Barang';
        $data['result'] = $dataBarang;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dataBarang $dataBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_barang' => 'required',
            'stok_barang' => 'required',
        ]);

       $result = dataBarang::where('id', $id)->update($validate);
        $data['success'] = true;
        $data['message'] = 'Data Barang Berhasil Diupdate';
        $data['result'] = $dataBarang;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataBarang = dataBarang::find($id);
        if($dataBarang){
            $dataBarang->delete();
            $data['success'] = true;
            $data['message'] = 'Data Barang Berhasil Dihapus';
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = 'Data Barang Tidak Ditemukan';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
