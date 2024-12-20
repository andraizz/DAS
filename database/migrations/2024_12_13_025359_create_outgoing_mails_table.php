<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_mail', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('penandatangan')->nullable();
            $table->string('divisi')->nullable();
            $table->string('perihal')->nullable();
            $table->date('tanggal_dikirim')->nullable();
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
        Schema::dropIfExists('outgoing_mails');
    }
}
