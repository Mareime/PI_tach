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
        Schema::create('compt', function (Blueprint $table) {
            $table->id();
            $table->string('num_compt',20)->unique();
            $table->string('type_compt',50);
            $table->decimal('sold')->default(0.00) ;
            $table->date('date_creation');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compt');
    }
};
