@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Cetak Resep</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <h5>Resep Telah selesai dibuat</h5>
                      <div class="row">
                        <div class="col ">
                          <a href="/" class="btn btn-primary float-left">Home</a>
                        </div>
                        <div class="col ">
                        <a href="/print-prescription/{{$idPrescription}}" class="btn btn-success float-right" target="_blank">Cetak Resep</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
        </div>
      </section>
</div>
@stop