<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNegativesPhillyTable extends Migration
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
            $table->string('negatives')->after('cases'); 
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
            $table->dropColumn('negatives'); 
            //
        });
    }
}
