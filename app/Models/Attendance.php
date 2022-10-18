<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['class_type_id','teacher_id','student_id','visibility'];

    public function classType()
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
}
