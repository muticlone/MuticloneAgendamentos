<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyOrRootAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && ($user->user_type === 'company' || $user->user_type === 'root')) {
            return $next($request);
        }

        return redirect()->route('home'); // Redirecionar para a página inicial ou outra rota apropriada
    }
}
