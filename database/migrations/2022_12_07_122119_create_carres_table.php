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
        Schema::create('carres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ph_no');
            $table->string('email');
            $table->string('totalExp');
            $table->string('skillsets');
            $table->string('curentOrg');
            $table->string('addtinalRemark');
            $table->string('resume');
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
        Schema::dropIfExists('carres');
    }
};
