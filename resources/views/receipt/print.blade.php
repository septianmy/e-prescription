<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuteeth Dental Therapist | System</title>

    <link rel="icon" href="{{ asset('dist/favicon.ico') }}" type="image/gif" sizes="16x16">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select 2-->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('css/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="row">
        <div class="image col" style="background-color: #02a2d0 !important; padding:10px 0px 10px 20px">
            {{-- <img src="{{ asset('dist/cuteeth_logo.png') }}" alt="User Image" height="50"> --}}
        </div>
    </div>
    <div class="row">
      <div class="col">
        <h4>E-Prescription</h4>
    </div>
    </div>
    <div class="row">
        
        <div class="col">
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <table>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>: {{$namaPasien}}</td>
                            </tr>
                            <tr>
                              <th>Tanggal/ Waktu</th>
                              <td>: {{$datePrescription}}</td>
                          </tr>
                        </table>
                    </div>            
                </div>
                <div class="row mt-3">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Obat</th>
                          <th>Quantity</th>
                          <th>Signa</th>
                          <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($detailPrescription as $data)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          @if($data->obatalkes_nama != null)
                            <td>{{ $data->obatalkes_nama }}</td>
                          @elseif($data->nama_racikan != null)
                          <td>{{ $data->nama_racikan }}</td>
                          @endif
                          <td>{{ $data->qty }}</td>
                          <td>{{ $data->signa_nama }}</td>
                          @if($data->obatalkes_nama != null)
                            <td>Non Racikan</td>
                          @elseif($data->nama_racikan != null)
                          <td>Racikan</td>
                          @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                  <div class="col-8">
                      Dibuat Oleh <br><br>
                      <br>


                      Dr. ____________
                  </div>            
              </div>
            </div>
          </div>
        </div>
      </div> 
</body>
<script>
    window.print();
</script>
</html>