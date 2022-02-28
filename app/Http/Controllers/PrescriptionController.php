<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\DataObat;
use App\DataSigna;
use App\Prescription;
use App\DetailPrescription;
use App\Racikan;
use App\DetailRacikan;

use Redirect;

class PrescriptionController extends Controller {

    public function index(){
        $prescription = Prescription::create([
            'is_store' => 0,
        ]);
        $idPrescription = $prescription->id;
        return redirect()->route('createPrescription', ['id' => $idPrescription]);
    }

    public static function getCountDataPrescription(){
        $data = Prescription::get()->count();
        return $data;
    }

    public function createPrescription($id){
        $idPrescription = $id;
        $dataSigna = DataSigna::get();
        $dataObat = DataObat::get();

        $detailPrescription = DB::table('detail_prescription')
            ->select('detail_prescription.id','detail_prescription.id_racikan','obatalkes_m.obatalkes_nama','racikan.nama_racikan', 'detail_prescription.qty', 'signa_m.signa_nama')
            ->leftjoin('obatalkes_m', 'detail_prescription.id_obat', '=', 'obatalkes_m.obatalkes_id')
            ->leftjoin('signa_m', 'detail_prescription.id_signa', '=', 'signa_m.signa_id')
            ->leftjoin('racikan', 'detail_prescription.id_racikan', '=', 'racikan.id')
            ->where('detail_prescription.id_prescription', $idPrescription)
            ->get();
        return view('receipt.new', compact('dataSigna', 'dataObat', 'idPrescription', 'detailPrescription'));
    }

    public function inputObat(Request $request){
        $idPrescription = $request->idPrescription;
        $idObat = $request->obat;
        $qty = $request->qty_obat;
        $idSigna = $request->signa;

        if($idObat == "" || $qty == 0 || $idSigna == ""){
            $notification = array(
                'message' => 'Input data obat harus lengkap', 
                'alert_type' => 'error',
            );
            return Redirect::back()->with('notification', $notification);
        } else {
            $dataObat = DataObat::where('obatalkes_id', $idObat)->first();
            $stokObat = $dataObat->stok;

            if($qty > $stokObat){
                $notification = array(
                    'message' => 'Quantity yang diinput melebihi stok obat yang dipilih', 
                    'alert_type' => 'error',
                );
                return Redirect::back()->with('notification', $notification);
            }
            else {
                $stokUpdate = $stokObat - $qty;
                $detailPrescription = DetailPrescription::create([
                    'id_prescription' => $idPrescription,
                    'id_obat' => $idObat,
                    'id_racikan' => 0,
                    'id_signa' => $idSigna,
                    'qty' => $qty
                ]);
                DataObat::where('obatalkes_id', $idObat)->update(['stok' => $stokUpdate]);
                return Redirect::back();
            }
        }  
    }

    public function savePrescription(Request $request){
        $idPrescription = $request->idPrescription;
        $namaPasien = $request->nama_pasien;
        if($namaPasien == ""){
            $notification = array(
                'message' => 'Nama Pasien harus diisi', 
                'alert_type' => 'error',
            );
            return Redirect::back()->with('notification', $notification);
        } else {
            $updatePrescription = Prescription::where('id',$idPrescription)->update([
                'patient_name' => $namaPasien,
                'is_store' => 1
            ]);
            return view('receipt.info', compact('idPrescription'));
        }   
    }

    public function listPrescription(){
        $dataPrescription = Prescription::where('is_store', 1)->get();
        return view('receipt.list', compact('dataPrescription'));
    }

    public function printPrescription($id){
        $idPrescription = $id;
        $dataPrescription = Prescription::where('id',$idPrescription)->first();
        $namaPasien = $dataPrescription->patient_name;
        $datePrescription = $dataPrescription->created_at;
        $detailPrescription = DB::table('detail_prescription')
            ->select('detail_prescription.id','detail_prescription.id_racikan','obatalkes_m.obatalkes_nama','racikan.nama_racikan', 'detail_prescription.qty', 'signa_m.signa_nama')
            ->leftjoin('obatalkes_m', 'detail_prescription.id_obat', '=', 'obatalkes_m.obatalkes_id')
            ->leftjoin('signa_m', 'detail_prescription.id_signa', '=', 'signa_m.signa_id')
            ->leftjoin('racikan', 'detail_prescription.id_racikan', '=', 'racikan.id')
            ->where('detail_prescription.id_prescription', $idPrescription)
            ->get();
        return view('receipt.print', compact('detailPrescription','namaPasien','datePrescription'));
    }

    public static function getDetailRacikan($id){
        $data = DB::table('detail_racikan')
            ->select('obatalkes_m.obatalkes_nama')
            ->leftjoin('obatalkes_m', 'detail_racikan.id_obat', '=', 'obatalkes_m.obatalkes_id')
            ->where('detail_racikan.id_racikan', $id)
            ->get();
        return $data;
    }

    public function deletePrescription($id){
        $delete = Prescription::find($id)->delete();

        return Redirect::back(); 
    }

    public function deleteDetailPrescription($id){
        $idDetailPrescription = $id;
        $detailPrescription = DetailPrescription::find($id);

        if($detailPrescription->id_obat != 0){
            $idObat = $detailPrescription->id_obat;
            $qty = $detailPrescription->qty;

            $dataObat = DataObat::where('obatalkes_id', $idObat)->first();
            $actualStok = $dataObat->stok;

            $updateObat = DataObat::where('obatalkes_id', $idObat)->update(['stok'=> $actualStok + $qty]);

            $deleteDetailPrescription = DetailPrescription::find($id)->delete();
            return Redirect::back();

        } else if($detailPrescription->id_racikan != 0) {
            $idRacikan = $detailPrescription->id_racikan;
            
            $deleteRacikan = Racikan::find($idRacikan)->delete();
            $detailRacikan = DetailRacikan::where('id_racikan',$idRacikan)->get();
            forEach($detailRacikan as $data){
                $id = $data->id;
                $qty = $data->qty;
                $dataObat = DataObat::where('obatalkes_id', $data->id_obat)->first();
                $actualStok = $dataObat->stok;

                $update = DataObat::where('obatalkes_id', $data->id_obat)->update([
                    'stok' => $actualStok + $qty
                ]);
                $deleteDetailRacikan = DetailRacikan::find($id)->delete();
            }
            
            $deleteDetailPrescription = DetailPrescription::find($idDetailPrescription)->delete();
            return Redirect::back();
        }
    }


    public function createRacikan($id){
        $racikan = Racikan::create([
            'is_store' => 0,
        ]);
        $idPrescription = $id;
        $idRacikan = $racikan->id;
        return redirect()->route('createDraftRacikan', ['idPrescription' => $idPrescription, 'idRacikan' => $idRacikan]);
    }

    public function createDraftRacikan($idPrescription, $idRacikan){
        $dataSigna = DataSigna::get();
        $dataObat = DataObat::get();

        $detailRacikan = DB::table('detail_racikan')
            ->select('detail_racikan.id', 'obatalkes_m.obatalkes_nama', 'detail_racikan.qty')
            ->leftjoin('obatalkes_m', 'detail_racikan.id_obat', '=', 'obatalkes_m.obatalkes_id')
            ->where('detail_racikan.id_racikan', $idRacikan)
            ->get();
        return view('receipt.newracikan', compact('dataObat', 'dataSigna', 'detailRacikan', 'idRacikan', 'idPrescription'));
    }

    public function inputRacikan(Request $request){
        $idRacikan = $request->idRacikan;
        $idObat = $request->obat;
        $qty = $request->qty;

        if($idObat == "" || $qty == 0){
            $notification = array(
                'message' => 'Input data obat harus lengkap', 
                'alert_type' => 'error',
            );
            return Redirect::back()->with('notification', $notification);
        } else {
            $dataObat = DataObat::where('obatalkes_id', $idObat)->first();
            $stokObat = $dataObat->stok;

            if($qty > $stokObat){
                $notification = array(
                    'message' => 'Quantity yang diinput melebihi stok obat yang dipilih', 
                    'alert_type' => 'error',
                );
                return Redirect::back()->with('notification', $notification);
            }
            else {
                $stokUpdate = $stokObat - $qty;
                $detailRacikan = DetailRacikan::create([
                    'id_racikan' => $idRacikan,
                    'id_obat' => $idObat,
                    'qty' => $qty
                ]);
                DataObat::where('obatalkes_id', $idObat)->update(['stok' => $stokUpdate]);
                return Redirect::back();
            }
        } 
    }

    public function deleteObatRacikan($id){
        $idRacikan = $id;

        $detailRacikan = DetailRacikan::where('id', $idRacikan)->first();
        $idObat = $detailRacikan->id_obat;
        $qtyObat = $detailRacikan->qty;

        $dataObat = DataObat::where('obatalkes_id', $idObat)->first();
        $actualStok = $dataObat->stok;
        //tambah update stok obat. 

        $updateObat = DataObat::where('obatalkes_id', $idObat)->update(['stok' => $actualStok + $qtyObat]);
        $deleteRacikan = DetailRacikan::find($idRacikan)->delete();

        return Redirect::back();
    }

    public function saveRacikan(Request $request){
        $idPrescription = $request->idPrescription;
        $idRacikan = $request->idRacikan;
        $namaRacikan = $request->nama_racikan;
        $idSigna = $request->signa;

        if($namaRacikan == "" || $idSigna == ""){
            $notification = array(
                'message' => 'Input data harus lengkap', 
                'alert_type' => 'error',
            );
            return Redirect::back()->with('notification', $notification);
        } else {
            $updateRacikan = Racikan::where('id', $idRacikan)->update([
                'nama_racikan' => $namaRacikan
            ]);
            
            $addDetailPrescription = DetailPrescription::create([
                'id_prescription' => $idPrescription,
                'id_racikan' => $idRacikan,
                'id_signa' => $idSigna
            ]);

            return redirect()->route('createPrescription', ['id' => $idPrescription]);
        }
        
    }
}