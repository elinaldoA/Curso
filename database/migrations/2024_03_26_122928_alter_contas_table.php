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
            $table->foreignId('user_id')->nullable()->after('situacao_conta_id')->constrained('users');
            $table->foreignId('cliente_id')->nullable()->after('user_id')->constrained('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->dropColumn('categoria_id');
            $table->dropColumn('user_id');
            $table->dropColumn('cliente_id');
        });
    }
};
