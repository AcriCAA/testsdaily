<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression; 

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('original_day'); 
            $table->string('original_day_formatted'); 
            $table->string('previous_day');
            $table->string('previous_day_formatted');
            $table->string('state'); 
            $table->string('state_query'); 
            $table->string('query1'); 
            $table->string('query2'); 
            $table->json('page_data_day1'); 
            $table->json('page_data_day2');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeds');
    }
}
