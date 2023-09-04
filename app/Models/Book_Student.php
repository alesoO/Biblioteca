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

    protected $dates = [
        'loan_date',
        'delivery_date',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    
    
    public function setLoanDateAttribute($value)
    {
        $this->attributes['loan_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }



    public function getLoanDateAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

    public function getDeliveryDateAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

    public function isDeliveryLate()
    {
        return $this->delivery_date->isPast();
    }
    
}
