<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string("description")->nullable();
            $table->string("image")->nullable();
            $table->string("slug")->nullable()->unique();
            $table->boolean('is_director')->default(false);
            $table->string('director_position')->nullable();
            $table->string('director_description')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable()->onDelete('cascade');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
