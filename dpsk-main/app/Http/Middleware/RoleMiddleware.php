<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
public function handle($request, Closure $next, $role)
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    $user = Auth::user();

    if ($user->jabatan !== $role && $user->level != $this->roleToLevel($role)) {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    return $next($request);
}

private function roleToLevel($role)
{
    return match($role) {
        'Administrator' => -1,
        'Operator1' => 1,
        'Operator2' => 1,
        'Kepala' => 0,
        default => null
    };
}

}
