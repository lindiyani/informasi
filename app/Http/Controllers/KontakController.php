<?php

namespace App\Http\Controllers;

use App\kontak;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $berita = berita::all();
            return Datatables::of($berita)
                ->addColumn('action',function($berita){
                    return view('datatable._action',[
                        'model' => $berita,
                        'form_url' => route('berita.destroy',$berita->id),
                        'edit_url' => route('berita.edit',$berita->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $berita->judul . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'judul' ,'name' => 'judul','title' => 'judul'])
        ->addColumn(['data' => 'isi' ,'name' => 'isi','title' => 'isi'])
        ->addColumn(['data' => 'tanggal' ,'name' => 'tanggal','title' => 'tanggal'])
        ->addColumn(['data' => 'ket' ,'name' => 'ket','title' => 'ket'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('berita.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show(kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit(kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(kontak $kontak)
    {
        //
    }
}
