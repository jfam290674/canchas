<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->default('Cliente')->after('password'); // Tipo de usuario
            $table->string('carnet')->nullable()->after('user_type'); // Archivo del carnet
            $table->string('celular_1', 15)->nullable(false)->after('carnet'); // Celular obligatorio
            $table->string('celular_2', 15)->nullable()->after('celular_1');   // Celular opcional
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_type', 'carnet', 'celular_1', 'celular_2']);
        });
    }
}
