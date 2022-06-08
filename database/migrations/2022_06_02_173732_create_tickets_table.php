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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('department_id');
            $table->enum('status', ['Novo', 'Em atendimento', 'Encerrado']);
            $table->enum('origin', ['Help Desk', 'E-mail', 'Telefone']);
            $table->string('place', 150);
            $table->string('requester', 150);
            $table->string('requester_email')->nullable();
            $table->string('problem');
            $table->enum('priority', ['Baixa', 'Média', 'Alta', 'Urgente']);
            $table->text('comments');
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
        Schema::dropIfExists('tickets');
    }
};
