<?php

if (!function_exists('str_random')) {
    /**
     *  Generate a more truly "random" alpha-numeric string.
     *
     * @param int $length
     * @return string
     */
    function str_random($length = 16)
    {
        $string = '';

        while (($len = mb_strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= mb_substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}
