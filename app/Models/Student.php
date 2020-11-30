<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email','status','program_id'
    ];

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }
}
