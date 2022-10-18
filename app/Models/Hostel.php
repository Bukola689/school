<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

     protected $guarded = [];

    protected $fillable = ['student_id','block','room_no'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
