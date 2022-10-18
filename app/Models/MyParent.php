<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyParent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['user_id','first_name','last_name','age','occupation_id','gender','d_o_b','phone_number','image','country_id','state_id','local_government_id','address','age'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
