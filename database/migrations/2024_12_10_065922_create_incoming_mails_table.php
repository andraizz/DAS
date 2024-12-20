<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_mail', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('perihal')->nullable();
            $table->string('disposisi')->nullable();
            $table->date('tanggal_diterima')->nullable();
            $table->date('tanggal_surat')->nullable();
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
        Schema::dropIfExists('incoming_mail');
    }
}
