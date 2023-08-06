<?php
// File: app/Helpers/breadcrumb_helper.php

if (!function_exists('generate_breadcrumbs')) {
    function generate_breadcrumbs($breadcrumbs, $separator = '/')
    {
        if (empty($breadcrumbs)) {
            return '';
        }

        $html = '<div class="breadcrumb">';
        $lastKey = array_key_last($breadcrumbs);

        foreach ($breadcrumbs as $key => $url) {
            if ($key === $lastKey) {
                $html .= $key;
            } else {
                $html .= '<a href="' . $url . '">' . $key . '</a>' . $separator;
            }
        }

        $html .= '</div>';

        return $html;
    }
}
