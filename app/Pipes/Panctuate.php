<?php

namespace App\Pipes;

class Panctuate{

    public function handle(string $greeting, \Closure $next){
        $greeting=$greeting."!";

        return $next($greeting);
    }
}