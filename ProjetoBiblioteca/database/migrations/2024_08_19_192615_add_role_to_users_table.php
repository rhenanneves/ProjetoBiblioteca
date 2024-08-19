<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_add_role_to_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('bibliotecario'); // Define o papel padrão como 'bibliotecario'
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
}

};
