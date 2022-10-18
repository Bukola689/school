<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['user_id','first_name','last_name','age','occupation_id','gender','d_o_b','phone_number','image','country_id','state_id','local_government_id','address','qualification'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function localGovernment()
    {
        return $this->belongsTo(LocalGovernment::class);
    }

    public function myClass()
    {
        return $this->hasMany(MyClass::class);
    }

    public function timeTable()
    {
        return $this->hasMany(TimeTable::class);
    }
}
