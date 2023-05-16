<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CV extends Controller
{
    public function CV(): Factory|View|Application
    {
        $basic_information = BasicInformation::getBasicInformation();
        return view('CV.index', [
            'basic_information' => $basic_information
        ]);
    }
}
