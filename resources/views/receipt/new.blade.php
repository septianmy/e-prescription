<?php 
use App\Http\Controllers\PrescriptionController;
?>

@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Resep Baru</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            
            <div class="card">
                <form action="/input-obat" method="post">
                @csrf
                <div class="card-header">
                    <h5><b>Non Racikan</b></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idPrescription" value={{ $idPrescription}}>
                            <div class="form-group">
                                <label>Pilih Obat</label>
                                <select class="form-control form-control-sm selectObat" name="obat">
                                    <option value="" disabled selected>Pilih Obat</option>
                                    @foreach($dataObat as $o)
                                        @if($o->stok == 0.00) 
                                            <option disabled value={{$o->obatalkes_id}}>
                                                Qty : {{$o->stok}} - {{$o->obatalkes_nama}}                                       
                                            </option>
                                        @else 
                                        <option value={{$o->obatalkes_id}}>
                                            Qty : {{$o->stok}} - {{$o->obatalkes_nama}}                                        
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Quantity Obat</label>
                                <input type="number" name="qty_obat" class="form-control form-control-sm @error('qty_obat') is-invalid @enderror" placeholder="Quantity Obat">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Pilih Signa</label>
                                <select class="form-control form-control-sm selectObat" name="signa">
                                    <option value="" disabled selected>Pilih Signa</option>
                                    @foreach($dataSigna as $s)
                                      <option value={{$s->signa_id}}>
                                        {{$s->signa_nama}}                                        
                                      </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success float-right" value="OK"/>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5><b>Racikan</b></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <a href="/create-racikan/{{$idPrescription}}" class="btn btn-primary">Buat Racikan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5>List Obat</h5>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Quantity</th>
                  <th>Signa</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detailPrescription as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  @if($data->obatalkes_nama != null)
                    <td>{{ $data->obatalkes_nama }}</td>
                    <td>{{ $data->qty }}</td>
                  @elseif($data->nama_racikan != null)
                  <td>{{ $data->nama_racikan }}</td>
                  <td>1</td>
                  @endif
                  <td>{{ $data->signa_nama }}</td>
                  @if($data->obatalkes_nama != null)
                    <td>Non Racikan</td>
                  @elseif($data->nama_racikan != null)
                  <td>Racikan</td>
                  @endif
                  <td>
                  <form action="/data-obat-prescription/delete/{{ $data->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data obat {{ $data->obatalkes_nama }}')" class="btn btn-danger deleteBooking">Remove</button>
                  </form>
                  </td>
                </tr>
                @if($data->nama_racikan != null)
                          @php
                          $detailRacikan = PrescriptionController::getDetailRacikan($data->id_racikan);
                          @endphp
                          @foreach($detailRacikan as $data)
                          <tr>
                             <td></td>
                             <td colspan=5>
                               - <i>{{ $data->obatalkes_nama}}</i>
                             </td>
                          </tr>
                          @endforeach
                        @endif
                @endforeach
                </tbody>
            </table>
            <form action="/save-prescription" method="post">
                @csrf
                <input type="hidden" name="idPrescription" value={{ $idPrescription}}>
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control form-control-sm @error('nama_pasien') is-invalid @enderror" placeholder="Nama Pasien">
                </div>
                <div class="form-group row">
                    <div class="col px-3">
                        <input type="submit" class="btn btn-success" value="Simpan Resep" style="float:right"/>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@stop
@section('js')
<script>
  $(function () {
    $('.selectObat').select2()

    $('#selectCountry').select2({
      placeholder: "Pilih Obat"
    })
  });
</script>
@stop