<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('history__book__students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('book_id');
            $table->date('loan_date')       ->format('d-m-Y');
            $table->date('delivery_date')   ->format('d-m-Y');
            $table->date('return_date')     ->format('d-m-Y');
            $table->timestamps();
    
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('history__book__students');
    }
};