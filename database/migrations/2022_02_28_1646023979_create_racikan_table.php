<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacikanTable extends Migration
{
    public function up()
    {
        Schema::create('racikan', function (Blueprint $table) {

		$table->increments('id');
		$table->string('nama_racikan')->nullable()->default('NULL');
		$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		$table->timestamp('deleted_at')->nullable();
		$table->integer('is_store')->default(0);

        });
    }

    public function down()
    {
        Schema::dropIfExists('racikan');
    }
}