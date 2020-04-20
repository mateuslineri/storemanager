<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUf extends Migration
{
    public function up()
    {
        Schema::create('uf', function (Blueprint $table) {
            $table->id();
            $table->string('initials');
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('uf');
    }
}
