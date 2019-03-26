<?php

namespace App\Freezium;

use App\User;

class Freezium
{
    public static function render($component, $props)
    {
        $data = [
            'data' => [ 
                'shop' => shop(),
                'component' => $component,
                'props' => $props
            ]
        ];

        if (request()->wantsJson()) 
        {
            return response()->json($data, 200);
        }

        return view('app', $data);
    }
}
