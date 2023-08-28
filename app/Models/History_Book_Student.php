<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Book_Student extends Model
{
    protected $fillable = [
        'student_id', 
        'book_id', 
        'loan_date',
        'delivery_date',
        'return_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
            