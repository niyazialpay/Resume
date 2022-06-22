<?php

namespace App\Http\Middleware;

use App\Models\settings;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class recaptchaVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        App::setLocale(session()->get('language'));
        $settings = settings::getSiteSettings();
        if(session()->get('score_error')) $recaptcha_response = $request->has('g-recaptcha-response')?$request->post('g-recaptcha-response', null):null;
        else $recaptcha_response = $request->post('recaptcha_response');
        $recaptcha = $this->verify($recaptcha_response, $request->getClientIp());
        if ($recaptcha->success){
            if(session()->get('score_error')){
                session()->forget('score_error');
                session()->forget('score_error');
                return $next($request);
            }
            else{
                if($recaptcha->score>=$settings->recaptcha_score){
                    session()->forget('score_error');
                    session()->forget('score_error');
                    return $next($request);
                }
                else{
                    session()->put('score_error', true);
                    return response(json_encode([
                        "result" => false,
                        "reason" => [
                            "type" => "recaptcha",
                            "description" => __('recaptcha.warning'),
                            'score' => $recaptcha->score
                        ]
                    ]))->header('Content-Type','application/json');
                }
            }
        }
        else{
            session()->put('score_error', true);
            return response(json_encode([
                "result" => false,
                "reason" => [
                    "type" => "recaptcha",
                    "description" => __('recaptcha.warning'),
                    "score" => 0
                ]
            ]))->header('Content-Type','application/json');
        }

    }

    protected function verify($response, $ip){
        $settings = settings::getSiteSettings();
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/',
            'timeout' => 2.0
        ]);
        $resp = $client->request('POST', 'siteverify', [
            'query' => [
                'secret' => session()->get('score_error')?$settings->recaptcha_private_v2:$settings->recaptcha_private_v3,
                'remoteip' => $ip,
                'response' => $response
            ]
        ]);
        return json_decode($resp->getBody());
    }
}
