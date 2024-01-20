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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_number')->unique();
            $table->string('sto_number')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('rack_id');
            $table->unsignedBigInteger('software_id');
            $table->unsignedBigInteger('category_statuses_id');
            $table->unsignedBigInteger('conditions_id');
            $table->text('explanation')->nullable();
            $table->string('approval_status')->default('pending');
            $table->unsignedBigInteger('create_user_id');
            $table->unsignedBigInteger('approval_user_id')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('rack_id')->references('id')->on('racks');
            $table->foreign('software_id')->references('id')->on('softwares');
            $table->foreign('category_statuses_id')->references('id')->on('category_statuses');
            $table->foreign('conditions_id')->references('id')->on('conditions');
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->foreign('approval_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
