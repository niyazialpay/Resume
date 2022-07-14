<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Github;
use App\Models\Portfolio;
use App\Models\Share;
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
            'github_repos' => Github::GithubRepos(),
            'share_token' => null
        ]);
    }

    public function ShareCV($token): Factory|View|Application
    {
        $share_token = Share::getShareToken($token);
        if($share_token)
        return view('CV.index', [
            'basic_information' => BasicInformation::getBasicInformation(),
            'skills' => Skills::getSkills(),
            'portfolios' => Portfolio::getPortfolio(),
            'experiences' => Experience::getExperience(),
            'educations' => Education::getEducation(),
            'github_repos' => Github::GithubRepos(),
            'share_token' => $share_token
        ]);
        else abort(404);
    }
}
