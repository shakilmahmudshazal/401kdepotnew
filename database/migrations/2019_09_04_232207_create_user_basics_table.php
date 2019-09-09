<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_basics', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->integer('badge_id')->default(1);
             $table->integer('user_id');
            $table->string('username',190)->unique();
             $table->string('website')->nullable();
             $table->string('compensationModel')->nullable();
             $table->string('firm')->nullable();
             $table->string('firmWebsite')->nullable();
             $table->string('crdNumber')->nullable();
             $table->date('dob')->nullable();
             $table->string('city');
             $table->string('state');
             $table->integer('zipcode');

             $table->string('phone')->nullable();
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
        Schema::dropIfExists('user_basics');
    }
}
