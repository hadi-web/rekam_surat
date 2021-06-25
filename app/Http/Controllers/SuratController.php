<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use PDF;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trash = Surat::onlyTrashed();
        $surat = Surat::all()->sortDesc();
        return view('surat/index', compact('surat','trash'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat = Surat::all();
        return view('surat/create', compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|min:3',
            'pengirim' => 'required',
        ],[
            'nomor_surat.required' => 'Nomor Surat tidak boleh kosong',
            'nomor_surat.min' => 'Nomor Surat harus diisi minimal 3 karakter',
            'pengirim.required' => 'Pengirim tidak boleh kosong',
        ]);
        // return $request;
        
        $surat = $request->data_file;
        $file = new surat;
        $file->nomor_surat = $request->nomor_surat;
        $file->tanggal_surat = $request->tanggal_surat;
        $file->pengirim = $request->pengirim;
        $file->data_file = $request->file('data_file')->storeAs('img', 
                           $request->file('data_file')->getClientOriginalName(), 'public');
        $file->save();

        // $surat = new surat; 
        // surat::create($request->all());

        return redirect('surat')->with('status', 'Surat berhasil ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show( Surat $surat)
    {
        $surat->makeHidden('id');
        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        return view('surat.edit',compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|min:3',
            'pengirim' => 'required',
        ],[
            'nomor_surat.required' => 'Nomor Surat tidak boleh kosong',
            'nomor_surat.min' => 'Nomor Surat harus diisi minimal 3 karakter',
            'pengirim.required' => 'Pengirim tidak boleh kosong',
        ]);
        // return $request;
        Surat::where('id', $surat->id)
            ->update([
                'nomor_surat' => $request->nomor_surat,
                'pengirim' => $request->pengirim,
                'tanggal_surat' => $request->tanggal_surat,
                ]);
                return redirect('surat')->with('status', 'Surat berhasil diubah!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        // hapus data secara permanen
        $surat->delete();
        return redirect('surat')->with('status', 'Surat berhasil dihapus!'); 
    }

    public function trash()
    {
        $kotak_masuk = Surat::all();
        $surat = Surat::onlyTrashed()->simplePaginate(5);
        return view('surat.trash', compact('surat','kotak_masuk'));
    }

    public function restore($id = null)
    {
        if($id != null){
            $surat = Surat::onlyTrashed()
            ->where('id',$id)
            ->restore();
        }else {
            $surat = Surat::onlyTrashed()->restore();
        }

        return redirect('surat/trash')->with('status', 'Surat berhasil di-restore');
    }
    public function deleted($id = null)
    {
        if($id != null){
            $surat = Surat::onlyTrashed()
            ->where('id',$id)
            ->forceDelete();
        }else {
            $surat = Surat::onlyTrashed()->forceDelete();
        }

        return redirect('surat/trash')->with('status', 'Surat berhasil dihapus permanen');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Surat::all();
  
        // share data to view
        view()->share('surat',$data);
        $pdf = PDF::loadView('pdf_view', $data);
        $sheet = $pdf->setPaper('a4', 'landscape');
          return $sheet->download('Data Surat.pdf');  
      }
}
