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
                            <h5 class="m-b-10">Materi DDL</h5>                            
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Materi DDL</a></li>
                            <li class="breadcrumb-item"><a href="#!">5</a></li>                              
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
						<h3>Mini Games DDL (<i>Data Definition Language</i>)</h3>
                    </div>
                    <div class="card-body">                  
                        <object class="flash-materi" width="750" height="600">
                            <param name="movie" value=" {{ asset('style/assets/minigames/linked_ddl_tipedata_date.swf' )}} ">
                            <embed src="{{ asset('style/assets/minigames/linked_ddl_tipedata_date.swf' )}}" width="550" height="400"></embed>
                        </object>
                    </div>
                </div>
            </div>
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="/materi/ddl/{{4}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{1}}">1</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{2}}">2</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{3}}">3</a></li>
                <li class="page-item"><a class="page-link" href="/materi/ddl/{{4}}">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                <a class="page-link" href="{{ route('materi.ddl.done') }}">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

