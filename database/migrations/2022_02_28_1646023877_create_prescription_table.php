<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {

		$table->increments('id');
		$table->string('patient_name')->nullable()->default('NULL');
		$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		$table->timestamp('deleted_at')->nullable();
		$table->integer('is_store')->default(0);

        });
    }

    public function down()
    {
        Schema::dropIfExists('prescription');
    }
}