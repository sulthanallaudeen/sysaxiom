<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
	$checkAuth =  $request->gcmId;
	#return parent::handle($request, $next);
		if(isset($checkAuth))
		{
			
			if(1==1)
			{
				return $next($request);
			}
			else
			{
				return parent::handle($request, $next);
			}
			
		}	
		else
		{
			return parent::handle($request, $next);
		}
		
	}

}
