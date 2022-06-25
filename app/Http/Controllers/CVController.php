<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Skills;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function CV(): Factory|View|Application
    {
        return view('CV.index', [
            'basic_information' => BasicInformation::getBasicInformation(),
            'skills' => Skills::getSkills(),
            'portfolios' => Portfolio::getPortfolio(),
            'experiences' => Experience::getExperience(),
            'educations' => Education::getEducation(),
        ]);
    }
}
