<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat1 extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['class_type_id','teacher_id','student_id','subject_id','score'];

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

   public function subject()
   {
      return $this->belongsTo(Subject::class);
   }
}
