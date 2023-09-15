<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Utils\ApiUtils;
use App\Models\Skill;

class SkillController extends Controller
{
    public function getAllSkills(){

        $skills = Skill::all();
        return ApiUtils::generateResponse($skills, "Data fetched", 200, null);
    }
}
