<?php 
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PrescriptionController;

$countDataObat = MasterDataController::getCountDataObat();
$countDataSigna = MasterDataController::getCountDataSigna();
$countDataPrescription = PrescriptionController::getCountDataPrescription();
?>

@extends('layout.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
            <h3><?php echo $countDataObat; ?></h3>
              <p>Total Obat</p>
            </div>
            <div class="icon">
              <i class="fas fa-capsules"></i>
            </div>
            <a href="/data-obat" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
            <h3><?php echo $countDataSigna; ?></h3>
              <p>Total Signa</p>
            </div>
            <div class="icon">
              <i class="fas fa-stethoscope "></i>
            </div>
            <a href="/data-signa" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
            <h3><?php echo $countDataPrescription; ?></h3>
              <p>Total Resep</p>
            </div>
            <div class="icon">
              <i class="fas fa-clipboard"></i>
            </div>
            <a href="/receipt-history" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@stop