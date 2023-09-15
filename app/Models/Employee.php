<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [

        'name',
        'email',
        'phone',
        'address',
        'position',
        'salary',
        'skills'
    ];

    protected $primaryKey = 'employee_id';

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'employee_x_skills', 'employee_id', 'skill_id');
    }
}
