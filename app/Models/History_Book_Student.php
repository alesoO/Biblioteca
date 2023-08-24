<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Book_Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'book_id'     ,
        'school_year' ,
        'registration',
        'loan_date',
        'delivery_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    }
