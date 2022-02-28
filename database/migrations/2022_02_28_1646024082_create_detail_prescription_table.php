<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPrescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('detail_prescription', function (Blueprint $table) {

		$table->increments('id');
		$table->integer('id_prescription')->default(0);
		$table->integer('id_obat')->default(0);
		$table->integer('id_racikan')->default(0);
		$table->integer('qty')->default(0);
		$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		$table->timestamp('deleted_at')->nullable();
		$table->integer('id_signa')->default(0);

        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_prescription');
    }
}