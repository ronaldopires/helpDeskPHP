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
        Schema::create('list_requests', function (Blueprint $table) {
            $table->id();
            $table->string('created_by');
            $table->string('status');
            $table->string('origin_of_requisition');
            $table->string('department');
            $table->tinyInteger('floor');
            $table->integer('branch_line')->nullable();
            $table->string('location');
            $table->string('requester');
            $table->string('requester_email')->nullable();
            $table->string('problem');
            $table->string('priority');
            $table->string('observation');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('requests');
    }
};
