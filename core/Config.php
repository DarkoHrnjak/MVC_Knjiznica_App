<?php

namespace Core;

class Config{
    public static function get(string $key,$default = null){
        return $_ENV[$key] ?? $default;
    }
}