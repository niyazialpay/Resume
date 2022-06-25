<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Models\settings;

class Github extends Model
{
    public static function GithubRepos()
    {
        $settings = settings::getSiteSettings();
        $username = $settings->github_username;
        $cache_key = config('settings.cache_prefix').'github_repos_' . $username;
        if (Cache::has($cache_key)){
            $repos = Cache::get($cache_key);
        }
        else{
            $repos = Cache::remember($cache_key,1440, function () use ($settings) {
                $client = new Client();
                $response = $client->request('GET', 'https://api.github.com/users/' . $settings->github_username . '/repos', [
                    'headers' => [
                        'Accept' => 'application/vnd.github.v3+json',
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36',
                        'Authorization: token ' . $settings->github_token,
                    ]
                ]);
                return json_decode($response->getBody()->getContents());
            });
        }
        return $repos;
    }
}
