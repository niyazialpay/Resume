<?php

namespace App\Http\Controllers;


use App\Mail\Mail as SendMail;
use App\Models\BasicInformation;
use App\Models\settings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class SendEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('recaptcha');
    }

    /**
     * @throws ValidationException
     */
    function contact(Request $request): Response|Application|ResponseFactory
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'subject'  =>  'required',
            'message' =>  'required',
        ]);

        $data = [
            'template'  =>  "contact",
            'name'      =>  $request->post('name'),
            'message'   =>  $request->post('message'),
            'subject'   =>  "Contact Email - ".$request->post('subject'),
            'email'     =>  $request->post('email')
        ];

        return $this->sendEmail($data);
    }

    private function sendEmail($data): Response|Application|ResponseFactory
    {
        $basic_information = BasicInformation::getBasicInformation();

        Mail::to($basic_information->email)->send(new SendMail($data));
        return response(json_encode([
            "result" => true,
            "reason" => [
                "csrf_token" => csrf_token()
            ]
        ]))->header('Content-Type','application/json');
    }
}
