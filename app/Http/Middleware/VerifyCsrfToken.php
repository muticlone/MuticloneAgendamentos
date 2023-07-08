<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
    public function handle($request, Closure $next){
    // Defina os cabeçalhos CORS permitidos
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');

    // Verifique se a requisição é um OPTIONS (pré-voo CORS)
    if ($request->getMethod() === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Max-Age: 86400'); // cache de pré-voo CORS por 1 dia
        return response()->json([], 200);
    }

    return $next($request);
}

    
}
