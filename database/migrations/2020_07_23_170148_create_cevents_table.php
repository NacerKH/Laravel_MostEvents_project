<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cevents', function (Blueprint $table) 
        {
            $table->id();
            $table->string('picture')->default('');
            $table->integer('ticket')->default(10);
            $table->boolean('active')->default(true);
            
            $table->unsignedBigInteger('cevent_id');
            $table->foreign('cevent_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('cevents');
    }
}
