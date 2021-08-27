<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationOnAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->unsignedBigInteger('location_id')->after('identifier');
            $table->boolean('is_vaccine')->default(0)->after('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internal_identifiers', function (Blueprint $table) {
            $table->dropForeign('attendances_location_id_foreign');
            $table->string('location')->after('identifier');
            $table->dropColumn('location_id');
            $table->dropColumn('is_vaccine');
        });
    }
}
