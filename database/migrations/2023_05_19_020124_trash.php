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
        Schema::create("trash", function(Blueprint $table) {
            $table->id();
            $table->string("status");
            $table->string("weight");
            $table->string("address");
            $table->string("description");
            $table->string("image");
            // foreign user_id
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            // foreign collector_id
            $table->unsignedBigInteger("collector_id");
            $table->foreign("collector_id")->references("id")->on("collector");
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
        Schema::dropIfExists("trash");
    }
};
