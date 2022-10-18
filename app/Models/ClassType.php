<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $fillable = ['my_class_id','name'];

    public function myClass()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function timeTable()
    {
        return $this->hasMany(TimeTable::class);
    }
}
