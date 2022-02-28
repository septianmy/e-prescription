<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatalkesMTable extends Migration
{
    public function up()
    {
        Schema::create('obatalkes_m', function (Blueprint $table) {

		$table->increments('obatalkes_id');
		$table->string('obatalkes_kode',100)->nullable()->default('NULL');
		$table->string('obatalkes_nama',250)->nullable()->default('NULL');
		$table->decimal('stok',15,2)->default(0.00);
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
        Schema::dropIfExists('obatalkes_m');
    }
}