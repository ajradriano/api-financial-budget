<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils\Constants;
use Illuminate\Http\Request;

class UserTypeValidate
{
    public function handle(Request $request, Closure $next)
    {
        /**
         *  Se o atributo user_type do usuario logado for igual a 1, então pode prosseguir com a request.
         *  Senão, abortar com codigo 403.
         */
        $user = auth()->user();

        if ($user && $user->user_type === 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized', ['Not-Allowed' => Constants::NOT_ALLOWED['message']]);
    }
}