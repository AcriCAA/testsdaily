<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_a_mails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            
            $table->string('ballots_cast'); 
        $table->string('ballots_counted'); 
        $table->string('ballots_remaining'); 
        


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_a_mails');
    }
}
