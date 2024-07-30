<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'score',
        'teacher_id'
    ];

    public function contacs(){
        return $this->hasOne(Contacs::class);        
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }
}
