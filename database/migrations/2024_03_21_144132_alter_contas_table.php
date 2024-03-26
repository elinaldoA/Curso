<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contas', function (Blueprint $table) {
            $table->foreignId('categoria_id')->default(1)->after('situacao_conta_id')->constrained('categorias');
            //$table->foreignId('user_id')->after('categoria_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->dropColumn('categoria_id');
            //$table->dropColumn('user_id');
        });
    }
};
