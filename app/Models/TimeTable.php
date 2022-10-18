<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $fillable = ['class_type_id','term_id','subject_id','teacher_id','session_id','created_at'];

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function subject()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
