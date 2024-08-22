<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('request_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interpretation_request_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('interpreter_id')->nullable();
            $table->text('change_description');
            $table->timestamps();

            $table->foreign('interpretation_request_id')->references('id')->on('interpretation_requests')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('administrators')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('interpreter_id')->references('id')->on('interpreters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_changes');
    }
};
