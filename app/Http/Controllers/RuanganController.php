<?php

namespace App\Http\Controllers;

use App\ruangan;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
class RuanganController extends Controller
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
            $fasilitas = ruangan::all();
            return Datatables::of($fasilitas)
                ->addColumn('action',function($fasilitas){
                    return view('datatable._action',[
                        'model' => $fasilitas,
                        'form_url' => route('fasilitas.destroy',$fasilitas->id),
                        'edit_url' => route('fasilitas.edit',$fasilitas->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $fasilitas->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'nama'])
        ->addColumn(['data' => 'lokasi' ,'name' => 'lokasi','title' => 'lokasi'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('fasilitas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fasilitas.create');
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
            'lokasi' => 'required']);
        $fasilitas = ruangan::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $fasilitas->nama "
            ]);
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $fasilitas = ruangan::find($id);
        return view('fasilitas.edit')->with(compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
             'nama' => 'required',
            'lokasi' => 'required']);
        $fasilitas = ruangan::find($id);
        $fasilitas->update($request->all());
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil Mengubah $fasilitas->nama"
            ]);

        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
         ruangan::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"fasilitas Berhasil Dihapus"
            ]);
        return redirect()->route('fasilitas.index');
    }
}
