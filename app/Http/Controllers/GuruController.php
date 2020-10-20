<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Files;
use App\FileTanya;
use App\FilePrediksi;
use File;
use DB;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->roles == 'siswa'){
            return redirect()->route('dashboard');
        }else{
            return view('guru_dashboard');
        }
    }

    //rangkuman

    public function showRangkumanDDL(){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $materi = 'ddl';       
        try{
            $rangkuman = Files::where('materi_rangkuman', $materi)->paginate(5);

            $bool = 1;
            return view('report_rangkuman_ddl', compact('bool', 'rangkuman'));
        }catch(\Exception $e){
            $bool = 0;
            return view('report_rangkuman_ddl', ['bool'=>$bool]);
        }    
    }

    public function showRangkumanDML(){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $materi = 'dml';       
        try{
            $rangkuman = Files::where('materi_rangkuman', $materi)->paginate(5);

            $bool = 1;
            return view('report_rangkuman_dml', compact('bool', 'rangkuman'));
        }catch(\Exception $e){
            $bool = 0;
            return view('report_rangkuman_dml', ['bool'=>$bool]);
        }    
    }

    public function reportRangkuman($id_rangkuman, Request $request){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $rangkuman = Files::where('id', $id_rangkuman)->first();
        try{
            $this->validate($request,
                [
                    'catatan' => ['required', 'string', 'max:255'],
                    'status' => ['required', 'string', 'max:255']
                ]
            );

            $rangkuman->catatan = $request->catatan;
            $rangkuman->status = $request->status;
            $rangkuman->save();

            return redirect()->back()->with(['success' => 'Berhasil memberikan tinjauan !']);
        }catch(\Exception $e){
            return redirect()->back()->with(['failed' => 'Gagal meninjau ! (Status belum diberikan)']);
        }
    }

    //pertanyaan

    public function showPertanyaanDDL(){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $materi = 'ddl';       
        try{
            $pertanyaan = FileTanya::where('materi_pertanyaan', $materi)->paginate(5);

            $bool = 1;
            return view('report_pertanyaan_ddl', compact('bool', 'pertanyaan'));
        }catch(\Exception $e){
            $bool = 0;
            return view('report_pertanyaan_ddl', ['bool'=>$bool]);
        }    
    }

    public function showPertanyaanDML(){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $materi = 'dml';       
        try{
            $pertanyaan = FileTanya::where('materi_pertanyaan', $materi)->paginate(5);

            $bool = 1;
            return view('report_pertanyaan_dml', compact('bool', 'pertanyaan'));
        }catch(\Exception $e){
            $bool = 0;
            return view('report_pertanyaan_dml', ['bool'=>$bool]);
        }    
    }

    public function reportPertanyaan($id_pertanyaan, Request $request){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $pertanyaan = FileTanya::where('id', $id_pertanyaan)->first();
        try{
            $this->validate($request,
                [
                    'catatan' => ['required', 'string', 'max:255'],
                    'status' => ['required', 'string', 'max:255']
                ]
            );

            $pertanyaan->catatan = $request->catatan;
            $pertanyaan->status = $request->status;
            $pertanyaan->save();

            return redirect()->back()->with(['success' => 'Berhasil memberikan tinjauan !']);
        }catch(\Exception $e){
            return redirect()->back()->with(['failed' => 'Gagal meninjau ! (Status belum diberikan)']);
        }
    }

    //prediksi
    public function showPrediksiDDL(){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $materi = 'ddl';       
        try{
            $prediksi = FilePrediksi::where('materi_prediksi', $materi)->paginate(5);

            $bool = 1;
            return view('report_prediksi_ddl', compact('bool', 'prediksi'));
        }catch(\Exception $e){
            $bool = 0;
            return view('report_prediksi_ddl', ['bool'=>$bool]);
        }    
    }

    public function showPrediksiDML(){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $materi = 'dml';       
        try{
            $prediksi = FilePrediksi::where('materi_prediksi', $materi)->paginate(5);

            $bool = 1;
            return view('report_prediksi_dml', compact('bool', 'prediksi'));
        }catch(\Exception $e){
            $bool = 0;
            return view('report_prediksi_dml', ['bool'=>$bool]);
        }    
    }

    public function reportPrediksi($id_prediksi, Request $request){
        if(Auth::user()->roles != 'guru'){
            return redirect()->back();
        }
        $prediksi = FilePrediksi::where('id', $id_prediksi)->first();
        try{
            $this->validate($request,
                [
                    'catatan' => ['required', 'string', 'max:255'],
                    'status' => ['required', 'string', 'max:255']
                ]
            );

            $prediksi->catatan = $request->catatan;
            $prediksi->status = $request->status;
            $prediksi->save();

            return redirect()->back()->with(['success' => 'Berhasil memberikan tinjauan !']);
        }catch(\Exception $e){
            return redirect()->back()->with(['failed' => 'Gagal meninjau ! (Status belum diberikan)']);
        }
    }

}


