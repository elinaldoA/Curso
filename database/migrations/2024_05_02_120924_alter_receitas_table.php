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
       Schema::table('receitas', function (Blueprint $table) {
           $table->foreignId('user_id')->nullable()->after('valor')->constrained('users');
           $table->foreignId('cliente_id')->nullable()->after('user_id')->constrained('clientes');
       });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
       Schema::create('receitas', function (Blueprint $table) {
           $table->dropColumn('user_id');
           $table->dropColumn('cliente_id');
       });
   }
};
