<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_line', function (Blueprint $table) {
            $table->string('id_user',50);
            $table->unique('id_user');
            $table->string('username',40);
            $table->char('gender', 1)->nullable();
            $table->unsignedInteger('umur')->nullable();
            $table->string('mode',10)->default('default');
            $table->boolean('notifikasi')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_line');
    }
}
