<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId("zone_id");
            $table->string('name');
            $table->string('A')->default('loadbalance');
            $table->string('AAAA')->default('random');
            $table->string('TXT')->default('all');
            $table->string('CNAME')->default('random');
            $table->string('NS')->default('all');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
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
        Schema::dropIfExists('zone_records');
    }
}
