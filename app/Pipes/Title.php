<?php

namespace App\Pipes;
use Str;
class Title{

    public function handle(string $greeting, \Closure $next){
        $greeting=Str::title($greeting);

        return $next($greeting);
    }
}