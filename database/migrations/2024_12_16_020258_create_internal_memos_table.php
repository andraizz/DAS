<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_memo', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan')->nullable();
            $table->string('divisi')->nullable();
            $table->string('project')->nullable();
            $table->string('perihal')->nullable();
            $table->date('tanggal_memo')->nullable();
            $table->date('end_date')->nullable();
            $table->string('confidential')->nullable();
            $table->string('file_path')->nullable();
            $table->string('ticket_number')->nullable();
            $table->string('document_number')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('internal_memo');
    }
}
