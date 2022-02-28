@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History Prescription</h1>
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
                      <th>Nama Pasien</th>
                      <th>Tanggal Resep</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataPrescription as $data)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $data->patient_name }}</td>
                      <td>{{ $data->created_at }}</td>
                      <td>
                      <a class="btn btn-primary" href="/print-prescription/{{ $data->id }}" target="_blank">Print</a>
                      <form action="/dataobat/delete/{{ $data->id }}" method="POST" style="margin-top: -38px; margin-left: 65px;">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus resep {{ $data->patien_name }}')" class="btn btn-danger deleteBooking">Remove</button>
                      </form>
                      </td>
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