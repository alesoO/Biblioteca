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
 

    public function setLoanDateAttribute($value)
    {
        $this->attributes['loan_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setReturnDateAttribute($value)
    {
        $this->attributes['return_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function getLoanDateAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }

    public function getDeliveryDateAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
    public function getReturnDateAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
            