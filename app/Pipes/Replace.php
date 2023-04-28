<?php

namespace App\Pipes;
use Str;
class Replace{

    public function handle(string $greeting, \Closure $next){
        $greeting=Str::replace('World','William',$greeting);

        return $next($greeting);
    }
}