<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'book_id',
        'delivery_date',
        'loan_date'
    ];

    public function student(){
        return $this->belongsToMany(Student::class, 'student_id');
    }
    public function book(){
        return $this->belongsToMany(Book::class, 'book_id');
    }
}
