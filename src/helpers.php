<?php

if (!function_exists('workflow_status_color_brihtness')) {

    function workflow_status_color_brihtness($color)
    {
        $red = hexdec(substr($color, 1, 2));
        $green = hexdec(substr($color, 3, 2));
        $blue = hexdec(substr($color, 5, 2));
        return (($red * 299) + ($green * 587) + ($blue * 114)) / 1000;
    }

}

if (!function_exists('workflow_status_color_styles')) {

    function workflow_status_color_styles($color)
    {
        $background_color = $color ?? '#cecece';
        $text_color = '#444444';
        if ($color && workflow_status_color_brihtness($color) < 200) {
            $text_color = '#ffffff';
        }
        return 'background-color: ' . $background_color . '; color: ' . $text_color . ';';
    }

}
