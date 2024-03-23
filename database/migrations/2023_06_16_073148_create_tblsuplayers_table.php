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
        Schema::create('tblsuplayer', function (Blueprint $table) {
            $table->string('idsupplier')->unique();
            $table->string('namaperusahaan');
            $table->string('alamat');
            $table->string('phone');
            $table->string('pic');
            $table->string('kontak');
            $table->string('email');
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
        Schema::dropIfExists('tblsuplayer');
    }
};
