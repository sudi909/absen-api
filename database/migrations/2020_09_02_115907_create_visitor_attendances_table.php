<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location')->index();
            $table->unsignedBigInteger('phone');
            $table->text('address')->nullable();
            $table->string('keperluan')->nullable();
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
        Schema::dropIfExists('visitor_attendances');
    }
}
