<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovernment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
