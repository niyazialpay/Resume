<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompressHTML
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $response = $next($request);
        if(!$request->is('panel','panel/*')){

            if(config('settings.html_compress')){
                $buffer = $response->getContent();
                $buffer = $this->sanitize_output($buffer);
                $response->setContent($buffer);
                ini_set('zlib.output_compression', 'On'); // If you like to enable GZip, too!
            }
        }
        return $response;
    }

    private function sanitize_output($buffer): array|string|null
    {

        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );

        $replace = array(
            '>',
            '<',
            ' ',
            ''
        );

        return preg_replace($search, $replace, $buffer);
    }
}
