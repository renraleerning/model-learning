@extends('layouts.guru_app')

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
                            <h5 class="m-b-10">Merangkum materi DML</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Report rangkuman materi DML</a></li>                    
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="height: 100px;">
                        <h3>List Status - Report Rangkuman DML</h3>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 12pt">
                            Tabel list report rangkuman dml yang telah di buat oleh siswa, Silahkan
                            anda tinjau dengan download file, kemudian klik tinjau untuk meninjau
                            apakah sudah tepat atau belum.
                        </p>
                        <table class="table table-bordered table-rangkum" style="font-size: 10pt;">
                            <tr style="text-align:center">
                                <th style="width: 80px; height:auto;">No.</th>
                                <th>Nama siswa</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>                               
                            </tr>
                            @if($bool == 1)
                                @foreach($rangkuman as $r)                                
                                <tr>
                                    <td style="text-align: center"></td>
                                    <td>{{$r->user->nama}}</td>
                                    <td><a href="{{ $r->file_path }}" download>{{$r->nama_file}}</a></td>
                                    @if($r->status == 'NC')
                                        <td style="color: #e74c3c; text-align: center">Menunggu Tinjauan Anda</td>
                                    @elseif($r->status == 'C')
                                        <td style="color: #2ecc71; text-align: center">Sudah lengkap</td>
                                    @else
                                        <td style="color: #e74c3c; text-align: center">Belum lengkap</td>
                                    @endif
                                    @if($r->catatan != null)
                                        <td>{{$r->catatan}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td style="text-align: center">
                                        <a href="" data-toggle="modal" data-target="#modalTinjau{{$r->id}}">
                                            Tinjau
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endif
                        </table>
                        </br>
                        {{ $rangkuman->links() }}
                    </div>
                </div>
            </div>        
        </div>        
    </div>
    @foreach($rangkuman as $r)
    <div class="modal fade" id="modalTinjau{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTinjauTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #ecf0f1;">
                <h5 class="modal-title" id="modalTinjauLongTitle">Tinjau rangkuman {{$r->user->nama}}</h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Silahkan unduh dokumen rangkuman yang telah siswa upload !</p>
                <form action="/report-rangkuman/dml/{{$r->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="catatan">Catatan rangkuman :</label>
                        <textarea  type="text" name="catatan" id="catatan" class="form-control" 
                            placeholder="Sudah lengkap/Tambahkan ...." oninvalid="this.setCustomValidity('Mohon berikan catatan !')" oninput="setCustomValidity('')" required style="padding: 0 10px;"></textarea>
                        @error('catatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status rangkuman siswa :</label>
                        <select class="form-control" id="status" name="status" oninvalid="this.setCustomValidity('Mohon tentukan status nya !')" oninput="setCustomValidity('')" required>
                            <option value="" selected disabled>Pilih status rangkuman</option>
                            <option value="C">Sudah Lengkap</option>
                            <option value="R">Belum Lengkap</option>
                        </select>
                    </div>

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
    @endforeach
</div>
@endsection

