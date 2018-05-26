<?php

class CorsMiddleware{
	public function handle($request, Closure $next){
		$response = $next($request);

		$response->header('Access-Control-Allow-Origin', '*');
		$response->header('Access-Control-Allow-Methods', 'HEAD, GET, PUT, PATCH, POST');

	return $response;
	}
}