<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRoom extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['teacher_id','room_no'];

    public function teacher()
    {
       return $this->belongsTo(Teacher::class);
    }
}
