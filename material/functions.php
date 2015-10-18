<?php

function pluralise($amount, $str, $alt = '') {
    return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function relative_time($date) {
    if(is_numeric($date)) $date = '@' . $date;

    $user_timezone = new DateTimeZone(Config::app('timezone'));
    $date = new DateTime($date, $user_timezone);

    // get current date in user timezone
    $now = new DateTime('now', $user_timezone);

    $elapsed = $now->format('U') - $date->format('U');

    if($elapsed <= 1) {
        return 'Just now';
    }

    $times = array(
        31104000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach($times as $seconds => $title) {
        $rounded = $elapsed / $seconds;

        if($rounded > 1) {
            $rounded = round($rounded);
            return $rounded . ' ' . pluralise($rounded, $title) . ' ago';
        }
    }
}

function color_value($color) {
    switch($color)
    {
        default:
            return null;
        case 'red':
            return '#f44336';
        case 'pink':
            return '#e91e63';
        case 'purple':
            return '#9c27b0';
        case 'deep_purple':
            return '#673ab7';
        case 'indigo':
            return '#3f51b5';
        case 'blue':
            return '#2196f3';
        case 'light_blue':
            return '#03a9f4';
        case 'cyan':
            return '#00bcd4';
        case 'teal':
            return '#009688';
        case 'green':
            return '#4caf50';
        case 'light_green':
            return '#8bc34a';
        case 'lime':
            return '#cddc39';
        case 'yellow':
            return '#ffeb3b';
        case 'amber':
            return '#ffc107';
        case 'orange':
            return '#ff9800';
        case 'deep_orange':
            return '#ff5722';
        case 'brown':
            return '#795548';
        case 'grey':
            return '#9e9e9e';
        case 'blue_grey':
            return '#607d8b';
    }
}

function color($title) {
    $colors = array('red', 'pink', 'purple', 'deep-purple', 'indigo', 'blue', 'light-blue', 'cyan', 'teal',
        'light-green', 'green', 'lime', 'yellow', 'amber', 'orange', 'brown', 'blue-grey');
    $sum = 0;

    for($i = 0; $i < strlen($title); $i++)
        $sum += ord($title[$i]);

    return $colors[$sum % count($colors)];
}

function accent($title) {
    $color = color($title);
    $accents = array(
        'indigo' => 'pink',
        'blue' => 'red',
        'red' => 'orange',
        'pink' => 'blue',
        'purple' => 'pink',
        'deep-purple' => 'red',
        'light-blue' => 'amber',
        'cyan' => 'pink',
        'teal' => 'green',
        'light-green' => 'red',
        'green' => 'light-blue',
        'lime' => 'purple',
        'yellow' => 'blue',
        'amber' => 'indigo',
        'orange' => 'indigo',
        'brown' => 'orange',
        'blue-grey' => 'pink',
        'grey' => 'orange'
    );

    return $accents[$color];
}

function href($anchor) {
    // Find the starting position
    $attr = 'href="';
    $start = strpos($anchor, $attr);
    $start += strlen($attr);
    // Find the ending position
    $end = strrpos($anchor, '"');

    return substr($anchor, $start, $end - $start);
}

function social_account($network) {
    return site_meta($network, null);
}

function social_url($network) {
    // Construct base url
    switch($network)
    {
        case 'twitter':
            $url = 'https://twitter.com/';
            break;
        case 'facebook':
            $url = 'https://www.facebook.com/';
            break;
        case 'github':
            $url = 'https://github.com/';
            break;
    }
    // Add social network handle
    return $url . social_account($network);
}