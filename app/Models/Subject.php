<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['class_type_id','name','code'];

    public function timeTable()
    {
        return $this->hasMany(TimeTable::class);
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }
}
