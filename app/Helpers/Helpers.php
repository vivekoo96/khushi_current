<?php

use Illuminate\Support\Str;

if (!function_exists('uniqueSlug')) {
    function uniqueSlug($string, $model, $column = 'slug')
    {
        $slug = Str::slug($string);
        $count = $model::where($column, 'like', $slug.'%')->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        return $slug;
    }
}

if (!function_exists('limit_words')) {

    function limit_words($string, $limit = 20, $ellipsis = '...') {
        $words = explode(' ', $string, $limit + 1);
        if (count($words) > $limit) {
            array_pop($words);
            $string = implode(' ', $words) . $ellipsis;
        }
        return $string;
    }
}
