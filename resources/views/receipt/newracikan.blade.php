@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Buat Racikan</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
                <form action="/input-racikan" method="post">
                @csrf
                <input type="hidden" name="idRacikan" value={{ $idRacikan }}>
                <div class="form-group row">
                            <label class="col-sm-2">Pilih Obat</label>
                            <div class="col-sm-10">
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
                    <div class="form-group row">
                            <label class="col-sm-2">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" name="qty" class="form-control form-control-sm @error('qty') is-invalid @enderror" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col px-3">
                                <input type="submit" class="btn btn-success" value="Tambah Obat" style="float:right"/>
                            </div>
                    </div>
                </form>
                <h6>List Obat</h6>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($detailRacikan as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->obatalkes_nama }}</td>
                  <td>{{ $data->qty }}</td>
                  <td>
                  <form action="/data-obat-racikan/delete/{{ $data->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data obat {{ $data->obatalkes_nama }}')" class="btn btn-danger deleteBooking">Remove</button>
                  </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            <form action="/save-racikan" method="post">
                @csrf
                <div class="form-group row">
                    <input type="hidden" name="idRacikan" value={{ $idRacikan }}>
                    <input type="hidden" name="idPrescription" value={{ $idPrescription }}>
                    <label class="col-sm-2">Nama Racikan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_racikan" class="form-control form-control-sm @error('nama_racikan') is-invalid @enderror" placeholder="Nama Racikan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Pilih Signa</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm selectObat" name="signa" style="width: 100%;">
                            <option value="" disabled selected>Pilih Signa</option>
                            @foreach($dataSigna as $s)
                            <option value={{$s->signa_id}}>
                                {{$s->signa_nama}}                                        
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col px-3">
                        <input type="submit" class="btn btn-success" value="Simpan Racikan" style="float:right"/>
                    </div>
                </div>
            </form>
        </div>
            
            
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

    $('#addObat').on('click', function(){
        addObat();
    });
    function addObat(){
        
        var elementAddObat = "<div></div>";
        $('.placingAddObat').append(elementAddObat);
    };
  });
</script>
@stop