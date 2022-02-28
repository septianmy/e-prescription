@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Obat</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
  
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Obat</th>
                      <th>Stok</th>
                      {{-- <th>Action</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataObat as $data)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $data->obatalkes_kode }}</td>
                      <td>{{ $data->obatalkes_nama }}</td>
                      <td>{{ $data->stok }}</td>
                      {{-- <td>
                      <a class="btn btn-primary" href="/dataobat/edit/{{ $data->id }}">Edit</a>
                      <form action="/dataobat/delete/{{ $data->id }}" method="POST" style="margin-top: -38px; margin-left: 65px;">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data obat {{ $data->nama }}')" class="btn btn-danger deleteBooking">Hapus</button>
                      </form>
                      </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>
@stop
@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "paging": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
        value: new Date()
    });
  });
</script>
@stop