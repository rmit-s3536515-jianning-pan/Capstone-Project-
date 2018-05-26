<?php

use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CorsMiddlewareTest extends TestCase{
/** @test */
	public function cors_headers_are_set(){
		$response = \Mockery::Mock(Response::class)
			->shouldReceive('header')
			->with('Access-Control-Allow-Origin', '*')
			->shouldReceive('header')
			->with('Access-Control-Allow-Methods', 'HEAD, GET, PUT, PATCH, POST')
			->getMock();


		$request = Request::create('/', 'GET');

		$middleware = new CorsMiddleware;

		$middleware->handle ($request, function () use ($response)){} 
		
		return $response;

	}
}