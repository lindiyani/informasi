<?php

namespace App\Http\Controllers;

use App\profil;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class ProfilController extends Controller
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
            $profil = profil::all();
            return Datatables::of($profil)
            ->addColumn('logo', function($profil){
                return '<img src="/img/'.$profil->logo.'" height="80px" widht="80px">';
                })
                ->addColumn('action',function($profil){
                    return view('datatable._action',[
                        'model' => $profil,
                        'form_url' => route('profil.destroy',$profil->id),
                        'edit_url' => route('profil.edit',$profil->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $profil->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'Nama'])
        ->addColumn(['data' => 'sejarah' ,'name' => 'sejarah','title' => 'Sejarah'])
        ->addColumn(['data' => 'logo' ,'name' => 'logo','title' => 'logo'])
       
        ->addColumn(['data' => 'alamat' ,'name' => 'alamat','title' => 'Alamat'])
        ->addColumn(['data' => 'email' ,'name' => 'email','title' => 'Email'])
        ->addColumn(['data' => 'nohp' ,'name' => 'nohp','title' => 'No HP'])

        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('profil.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('profil.create');
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
     $profil = profil::create($request->except('logo'));

        //isi field logo jika ada logo yang diupload
        if ($request->hasFile('logo')) {
            //mengambil file yang diupload
            $uploaded_logo = $request->file('logo');

            //mengambil extension file
            $extension = $uploaded_logo->getClientOriginalExtension();

            //membuat nama file random berikut extension
            $filename = md5(time()). '.' . $extension;

            //menyimpan logo ke folder public/img
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_logo->move($destinationPath,$filename);

            //mengisi field logo di profil dengan filename yang baru dibuat
            $profil->logo = $filename;
            $profil->save();
        }
        
        Session::flash("flash_notification",[
            "level"=>"succes",
            "message"=>"Berhasil Menyimpan $profil->nama"
            ]);
        return redirect()->route('profil.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         profil::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Profil Berhasil Dihapus"
            ]);
        return redirect()->route('profil.index');
    }
    
}
