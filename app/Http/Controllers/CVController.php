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
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class CVController extends Controller
{
    private function generateResume($template,$token=null): Factory|View|Application
    {
        return view($template, [
            'basic_information' => BasicInformation::getBasicInformation(),
            'skills' => Skills::getSkills(),
            'portfolios' => Portfolio::getPortfolio(),
            'experiences' => Experience::getExperience(),
            'educations' => Education::getEducation(),
            'github_repos' => Github::GithubRepos(),
            'share_token' => $token
        ]);
    }
    public function CV(): Factory|View|Application
    {
        return $this->generateResume('CV.index');
    }

    public function ShareCV($token): Factory|View|Application
    {
        $share_token = Share::getShareToken(GetPost($token));
        if($share_token)
            return $this->generateResume('CV.index', GetPost($token));
        else abort(404);
    }

    public function PDFShareCV($token=null)
    {
        if($token){
            $share_token = Share::getShareToken(GetPost($token));
            if($share_token)
                return $this->generateResume('CV.pdf', GetPost($token));
            else abort(404);
        }
        else{
            /*#$pdf = new PDF();
            $pdf = PDF::loadView('CV.pdf', [
                'basic_information' => BasicInformation::getBasicInformation(),
                'skills' => Skills::getSkills(),
                'portfolios' => Portfolio::getPortfolio(),
                'experiences' => Experience::getExperience(),
                'educations' => Education::getEducation(),
                'github_repos' => Github::GithubRepos(),
                'share_token' => $token
            ]);
            // download PDF file with download method
            return $pdf->download('pdf_file.pdf');*/
            return $this->generateResume('CV.pdf');
        }
    }


}
