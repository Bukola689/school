<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['class_type_id','term_id','session_id','student_id'];

    public function classType()
    {
       return $this->belongsTo(ClassType::class);
    }
 
    public function term()
    {
       return $this->belongsTo(Term::class);
    }
 
    public function session()
    {
       return $this->belongsTo(Session::class);
    }
 
    public function student()
    {
       return $this->belongsTo(Student::class);
    }
}
