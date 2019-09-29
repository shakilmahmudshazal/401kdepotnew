<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('backgroundImage')->nullable();
            $table->string('headline')->nullable();
            $table->string('details')->nullable();

            $table->string('slideOneHeadline')->nullable();
            $table->string('slideOneDetails')->nullable();
            $table->string('slideOneLinks')->nullable();
            $table->string('slideOneImage')->nullable();

            $table->string('slideTwoHeadline')->nullable();
            $table->string('slideTwoDetails')->nullable();
            $table->string('slideTwoLinks')->nullable();
            $table->string('slideTwoImage')->nullable();

            $table->string('slideThreeHeadline')->nullable();
            $table->string('slideThreeDetails')->nullable();
            $table->string('slideThreeLinks')->nullable();
            $table->string('slideThreeImage')->nullable();

            $table->string('divOneHeadline')->nullable();
            $table->string('divOneDetails')->nullable();
            $table->string('divOneImage')->nullable();
           

            $table->string('divTwoHeadline')->nullable();
            $table->string('divTwoDetails')->nullable();
            $table->string('divTwoImage')->nullable();
           

            $table->string('divThreeHeadline')->nullable();
            $table->string('divThreeDetails')->nullable();
            $table->string('divThreeImage')->nullable();
            

            $table->string('divFourHeadline')->nullable();
            $table->string('divFourDetails')->nullable();
            $table->string('divFourImage')->nullable();
            


            

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
        Schema::dropIfExists('backgrounds');
    }
}
