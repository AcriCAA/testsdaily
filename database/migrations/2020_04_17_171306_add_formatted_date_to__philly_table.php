<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormattedDateToPhillyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       
    public function up()
    {
        Schema::table('phillies', function (Blueprint $table) {
            //
            $table->string('date')->after('updated_at'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phillies', function (Blueprint $table) {
            //
            $table->dropColumn('date'); 
        });
    }
}
