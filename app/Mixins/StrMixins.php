<?php

namespace App\Mixins;

class StrMixins
{
    public function partNumber ($value='')
    {
        return function ($part)
        {
            return 'AB-'.substr($part, 0, 3).'-'.substr($part, 3);
        };
    }
}
