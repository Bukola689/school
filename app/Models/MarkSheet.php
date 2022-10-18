<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkSheet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['term_id','class_type_id','session_id','mark_date','teacher_id','student_id','cat1_id','cat2_id','cat3_id','examination_id'];

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function subject()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function cat1()
    {
        return $this->belongsTo(Cat1::class);
    }

    public function cat2()
    {
        return $this->belongsTo(Cat2::class);
    }

    public function cat3()
    {
        return $this->belongsTo(Cat3::class);
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}
