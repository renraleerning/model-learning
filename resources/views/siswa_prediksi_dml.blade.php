@extends('layouts.siswa_app')

@section('content')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Memprediksi materi DML</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Memprediksi materi DML</a></li>                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        @if ($message = Session::get('success'))
            <div class="col-sm-12">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    {{ $message }}
                </div>
            </div>
        @endif

        @if ($message = Session::get('failed'))
            <div class="col-sm-12">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    {{ $message }}
                </div>
            </div>
        @endif
        <div class="row">
            <!-- [ sample-page ] start -->            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="height: 100px;">
                        <h3>List Status - Prediksi</h3>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 12pt">
                            Tabel list status prediksi anda, yang telah diperiksa
                            oleh guru.
                        </p>
                        <table class="table table-bordered table-rangkum" style="font-size: 10pt;">
                            <tr style="text-align:center">
                                <th style="width: 80px; height:auto;">No.</th>
                                <th>Nama file</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>                               
                            </tr>                                
                                <tr>
                                    <td style="text-align: center"></td>
                                    <td><a href="{{ $p->file_path }}" download>{{$p->nama_file}}</a></td>
                                    @if($p->status == 'NC')
                                        <td style="color: #e74c3c; text-align: center">Menunggu Tinjauan Guru</td>
                                    @elseif($p->status == 'C')
                                        <td style="color: #2ecc71; text-align: center">Sudah lengkap</td>
                                    @else
                                        <td style="color: #e74c3c; text-align: center">Belum lengkap</td>
                                    @endif
                                    @if($p->catatan != null)
                                        <td>{{$p->catatan}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td style="text-align: center">
                                        @if($p->status == 'R')
                                            <a href="" class="btn btn-primary btn-sm" role="button" data-toggle="modal" data-target="#modalTinjau{{$p->id}}">Ubah</a>                                   
                                        @else
                                            <a href="#"class="btn btn-secondary btn-sm disabled" role="button" aria-disabled="true">Ubah</a>
                                        @endif
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <div class="modal fade" id="modalTinjau{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTinjauTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #ecf0f1;">
                <h5 class="modal-title" id="modalTinjauLongTitle">Upload ulang prediksi</h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Catatan dari guru :</p>
                <p>{{$p->catatan}}</p>
                <form action="/prediksi-revisi/dml/{{$p->id}}" method="post" enctype="multipart/form-data">
                    @csrf                    
                    <label for="chooseFile" class=" form-control-label">Upload prediksi yang sudah dilengkapi :</label>
                    <input class="btn-upload" type="file" id="chooseFile" name="file" style="margin-bottom: 15px;" required>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-rangkum mb-2" style="width: 30%;">
                            {{ __('Simpan') }}
                        </button>
                        <button type="button" class="btn btn-secondary btn-rangkum mb-2" style="width: 30%;" data-dismiss="modal">
                            {{ __('Batal') }}
                        </button>
                    </div>         
                </form>
            </div>
            </div>
        </div>
    </div> 
</div>
@endsection

