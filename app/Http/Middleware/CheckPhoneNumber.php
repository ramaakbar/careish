<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPhoneNumber {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next) {
    if (auth()->user()->phone_number == '') {
      return redirect('/user/profile-setting')->with('error', 'You need to add your phone number');
    }
    return $next($request);
  }
}
