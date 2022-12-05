<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("musicOrders", function(Blueprint $table){
            $table->id();
            $table->string("firstName");
            $table->string("prefix");
            $table->string("lastName");
            $table->string("email");
            $table->text("message");
            $table->timestamps();
            $table->string("connectedWorkersId")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
