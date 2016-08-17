<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except_urls = [
        'surat-keputusan/peraturan/images/create',
        'surat-keputusan/tugas/images/create',
        'surat-keputusan/uu/images/create',
        'notulen/create-upload',
        'apl/create-upload',
        'dashboard/create-upload',
        'DPT/upload',
        'DPT/bio',
        'DPT/session'
    ];

    public function handle($request, Closure $next)
    {
        $regex = '#' . implode('|', $this->except_urls) . '#';

        if ($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path()))
        {
            return $this->addCookieToResponse($request, $next($request));
        }

        throw new TokenMismatchException;
    }
}
