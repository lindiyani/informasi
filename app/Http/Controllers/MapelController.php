<?php

namespace App\Http\Controllers;

use App\mapel;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
class MapelController extends Controller
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
            $mapel = mapel::all();
            return Datatables::of($mapel)
                ->addColumn('action',function($mapel){
                    return view('datatable._action',[
                        'model' => $mapel,
                        'form_url' => route('mapel.destroy',$mapel->id),
                        'edit_url' => route('mapel.edit',$mapel->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $mapel->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'nama'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('mapel.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mapel.create');
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
            'nama' => 'required']);
        $mapel = mapel::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $mapel->nama "
            ]);
        return redirect()->route('mapel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
         $mapel = mapel::find($id);
        return view('mapel.edit')->with(compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $this->validate($request, [
             'nama' => 'required']);
        $mapel = mapel::find($id);
        $mapel->update($request->all());
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil Mengubah $mapel->nama"
            ]);

        return redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        mapel::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"mapel Berhasil Dihapus"
            ]);
        return redirect()->route('mapel.index');
    }
}
