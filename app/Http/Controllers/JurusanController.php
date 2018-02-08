<?php

namespace App\Http\Controllers;

use App\jurusan;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
class JurusanController extends Controller
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
            $jurusan = jurusan::all();
            return Datatables::of($jurusan)
                ->addColumn('action',function($jurusan){
                    return view('datatable._action',[
                        'model' => $jurusan,
                        'form_url' => route('jurusan.destroy',$jurusan->id),
                        'edit_url' => route('jurusan.edit',$jurusan->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $jurusan->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'Nama'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('jurusan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jurusan.create');
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
         $this->validate($request, ['nama' => 'required|unique:jurusans']);
        $jurusan = jurusan::create($request->only('nama'));
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $jurusan->nama "
            ]);
        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $jurusan = jurusan::find($id);
        return view('jurusan.edit')->with(compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
           $this->validate($request,['nama' => 'required|unique:jurusans,nama,' . $id]);
        $jurusan = jurusan::find($id);
        $jurusan->update($request->only('nama'));
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil menyimpan $jurusan->nama"
            ]);

        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         jurusan::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"jurusan Berhasil Dihapus"
            ]);
        return redirect()->route('jurusan.index');
    }
}
