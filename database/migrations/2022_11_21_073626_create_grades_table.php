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
        Schema::create('grades', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama',100);
            $table->integer('kehadiran');
            $table->float('tugas');
            $table->float('uts');
            $table->float('uas');
            $table->float('akhir');
            $table->string('grade', 2);
            $table->string('ket', 10);
            $table->string('image', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
