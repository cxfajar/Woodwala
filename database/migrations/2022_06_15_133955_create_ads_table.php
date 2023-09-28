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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->string('description');
            $table->integer('quantity')->default(0);
            $table->integer('price')->default(0);
            $table->integer('post_by');
            $table->integer('hired_user')->default(0);
            $table->string('status');
            $table->string('type');
            $table->string('ad_status');
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
        Schema::dropIfExists('ads');
    }
};
