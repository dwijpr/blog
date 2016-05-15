<?php

if (!function_exists('remove_line')) {
    function remove_line($text, $count) {
        return implode("\n", array_slice(explode("\n", $text), $count));
    }
}

if (!function_exists('x')) {
    function x($pattern, $count = 80) {
        $return = '';
        while ($count > 0) {
            $return .= $pattern;
            $count--;
        }
        return $return;
    }
}

if (!function_exists('to_ascii')) {
    function to_ascii($str, $replace=array(), $delimiter='-') {
        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }
}

if (!function_exists('to_path')) {
    function to_path($segments, $absolute = true) {
        $segments = array_filter($segments, function($value) {
            return $value;
        });
        return ($absolute?"/":"").implode('/', $segments);
    }
}

if (!function_exists('to_segments')) {
    function to_segments($path) {
        $segments = explode('/', $path);
        return array_filter($segments, function($value) {
            return $value;
        });
    }
}

if (!function_exists('replace_ext')) {
    function replace_ext($value, $ext) {
        return preg_replace('/\..+$/', '.'.$ext, $value);
    }
}

if (!function_exists('strip_ext')) {
    function strip_ext($value) {
        return preg_replace('/\\.[^.\\s]{2,4}$/', '', $value);
    }
}

if (!function_exists('bool_val')) {
    function bool_val($bool) {
        $text = $bool?'true':'false';
        return $text;
    }
}

if (!function_exists('root_url')) {
    function root_url($path = false) {
        $url = $_SERVER['SERVER_NAME'].($path?"/".$path:"");
        return "//".preg_replace('~/+~', '/', $url);
    }
}

if (!function_exists('to_words')) {
    function to_words($string) {
        $words = explode('_', $string);
        return implode(' ', $words);
    }
}

if (!function_exists('activity_log')) {
    function activity_log($key, $object = []) {
        $stringObject = json_encode($object);
        \App\Activity::create([
            'user_id' => @auth()->user()->id,
            'key' => $key,
            'uri' => request()->getRequestUri(),
            'method' => request()->getMethod(),
            'user_agent' => request()->header('User-Agent'),
            'ip_address' => request()->ip(),
            'app_name' => config('app.name'),
            'data' => $stringObject,
        ]);
    }
}

if (!function_exists('objectsToArray')) {
    function objectsToArray($objects, $key = 'id') {
        $return = [];
        if (count($objects) > 0) {
            foreach ($objects as $o) {
                $return[] = $o->$key;
            }
        }
        return $return;
    }
}

if (!function_exists('objects_to_array_key_value')) {
    function objectsToArrayKeyValue($objects, $idKey, $valueKey) {
        $return = [];
        if (count($objects) > 0) {
            foreach ($objects as $o) {
                $return[$o->$idKey] = $o->$valueKey;
            }
        }
        return $return;
    }
}