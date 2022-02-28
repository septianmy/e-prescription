<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaMTable extends Migration
{
    public function up()
    {
        Schema::create('signa_m', function (Blueprint $table) {

		$table->increments('signa_id');
		$table->string('signa_kode',100)->nullable()->default('NULL');
		$table->string('signa_nama',250)->nullable()->default('NULL');
		$table->text('additional_data')->nullable()->default('NULL');
		$table->datetime('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->integer('created_by')->default(0);
		$table->integer('modified_count')->default(0);
		$table->datetime('last_modified_date')->nullable();
		$table->integer('last_modified_by')->default(0);
		$table->tinyInteger('is_deleted')->default(0);
		$table->tinyInteger('is_active')->default(0);
		$table->datetime('deleted_date')->nullable();
		$table->integer('deleted_by')->default(0);

        });
    }

    public function down()
    {
        Schema::dropIfExists('signa_m');
    }
}