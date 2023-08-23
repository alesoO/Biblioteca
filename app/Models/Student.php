<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_year',
        'registration'
    ];

    public function book(){
        return $this->belongsToMany(Book::class, 'book_students', 'student_id', 'book_id')
            ->withPivot('loan_date', 'delivery_date')
            ->withTimestamps();
    }
    
}
