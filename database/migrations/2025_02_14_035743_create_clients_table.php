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
        Schema::create('clients', function (Blueprint $table) {
            $table->string('Ref', 30)->primary();
            $table->integer('idClient')->unique()->index();
            $table->timestamp('dateCurr')->useCurrent();
            $table->string('phone', 45)->nullable();
            $table->string('mail', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->decimal('monthSalary', 15, 2)->nullable();
            $table->char('currSalary', 3)->nullable();
            $table->string('decision', 45);
            $table->decimal('limitItog', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
