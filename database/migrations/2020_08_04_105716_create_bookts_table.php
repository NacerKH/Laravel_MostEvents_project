<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('cevent_id');
            $table->integer('nb_ticket');
            $table->float('total');
             $table->string('nameevent');
            $table->text('note');
            
            $table->boolean('validate')->default(false);
         
            
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
        Schema::dropIfExists('bookts');
    }
}
