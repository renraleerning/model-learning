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
                            <h5 class="m-b-10">Pengantar</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Pengantar</a></li>                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
						<h3>Pengantar</h3>
                    </div>
                    <div class="card-body">

                        <p style="font-size: 12pt">	Haiii nama_siswa, pada menu materi DDL dan DML ini akan mencakup
                            beberapa materi, </br>diantaranya :</p>
                            <ol type="1">
                                <li> Type data pada mysql </li>
                                <li> DDL : CRUD database <i>Create, Read, Update, dan Delete</i></li>
                                <li> DML : <i>Manipulation database</i></li>
                            </ol>
						<p style="font-size: 12pt"> Selamat belajar :))</p>
                        
                    </div>
                </div>
            </div>
            <ul class="pagination">
                <li class="page-item">                
                <a class="page-link" href="/dashboard/materi/ddl/{{1}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

