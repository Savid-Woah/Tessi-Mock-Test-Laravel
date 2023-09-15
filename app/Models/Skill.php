<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [

        'name',
        'employee_id'
    ];

    protected $primaryKey = 'skill_id';

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_x_skills', 'skill_id', 'employee_id');
    }
}
