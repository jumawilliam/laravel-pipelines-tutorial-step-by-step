<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Pipeline;

Route::get('/pipeline-test',function(){

    $mytext=Pipeline::send('hello world')
           ->through([

            function (string $greeting, Closure $next){
                $greeting=Str::title($greeting);

                return $next($greeting);
            },

            function (string $greeting, Closure $next){
                $greeting=$greeting."!";

                return $next($greeting);
            },

            function (string $greeting, Closure $next){
                $greeting=Str::replace('World','William',$greeting);

                return $next($greeting);
            }
            
           ])->then(fn (string $greeting)=>$greeting);

           dd($mytext);

});

Route::get('pipeline-test2',function(){

    $mytext=Pipeline::send('hello world')
          ->through([
            \App\Pipes\Title::class,
            \App\Pipes\Panctuate::class,
            \App\Pipes\Replace::class,
          ])->then(fn (string $greeting)=>$greeting);

          return $mytext;

});

Route::get('/', function () {
    return view('welcome');
});
