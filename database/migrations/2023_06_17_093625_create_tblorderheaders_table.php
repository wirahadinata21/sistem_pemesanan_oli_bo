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
        Schema::create('tblorderheader', function (Blueprint $table) {
            $table->string('idorder')->unique();
            $table->dateTime('tgltransaksi', $precision = 0);
            $table->string('idcustomer');
            $table->string('nomorpo');
            $table->string('lampiranpo');
            $table->string('statusorder');
            $table->string('idmarketing');
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
        Schema::dropIfExists('tblorderheader');
    }
};
