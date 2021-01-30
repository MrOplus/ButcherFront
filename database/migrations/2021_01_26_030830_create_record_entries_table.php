<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id');
            $table->string('type')->default('A');
            $table->text('value');
            $table->integer('ttl')->default(60);
            $table->integer('weight')->default(1);
            $table->integer('order');

            $table->foreign('record_id')->references('id')->on('zone_records')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_entries');
    }
}
