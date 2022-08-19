<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBargainServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bargain_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bargain_id')->constrained('bargains')->cascadeOnDelete();;
            $table->integer('service_id')->constrained('services')->cascadeOnDelete();;
            $table->integer('price');
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
        Schema::dropIfExists('bargain_services');
    }
}
