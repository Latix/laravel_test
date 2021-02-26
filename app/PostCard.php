<?php

namespace App;

class PostCard
{
    // public static function any() {
    //     dump('inside');
    // }

    protected static function resolveFacade($name) {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments) {
        return self::resolveFacade('PostCard')
            ->$method(...$arguments);
    }
}
