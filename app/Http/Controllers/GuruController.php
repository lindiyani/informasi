<?php

namespace App\Http\Controllers;

use App\guru;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->ajax()) {
            $guru= guru::all();
            return Datatables::of($guru)
                ->addColumn('action',function($guru){
                    return view('datatable._action',[
                        'model' => $guru,
                        'form_url' => route('guru.destroy',$guru->id),
                        'edit_url' => route('guru.edit',$guru->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $nama->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'nama'])
        ->addColumn(['data' => 'alamat' ,'text' => 'alamat','title' => 'alamat'])
        ->addColumn(['data' => 'nohp' ,'name' => 'nohp','title' => 'nohp'])
        ->addColumn(['data' => 'mapel' ,'name' => 'mapel','title' => 'mapel'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('guru.index')->with(compact('html'));

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('guru.create');
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
          $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'mapel' => 'required']);
        $guru = guru::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $guru->nama "
            ]);
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(guru $guru)
    {
        //
          $guru= guru::find($id);
        return view('guru.edit')->with(compact('guru'));
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
        //
       $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'mapel' => 'required'
        ]);
        $guru= guru::find($id);
        $guru->update($request->only('nama'));
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil Mengubah $guru->nama"
            ]);

        return redirect()->route('guru.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(guru $guru)
    {
        //

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"guru Berhasil Dihapus"
            ]);
        return redirect()->route('guru.index');
    }
}
