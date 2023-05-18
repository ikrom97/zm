<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminCheck
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    $user = User::find(session()->get('user'));

    if ($user->role == 'admin') {
      return $next($request);
    }

    return redirect(route('auth.login'))->with('fail', 'У Вас нет доступа!');
  }
}
