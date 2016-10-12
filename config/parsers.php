<?php

return [

    'paragraph' => [
        'pattern' => '/\[p\](.*?)\[\/p\]/s',
        'replace' => '<p>$1</p>'
    ],

    'bold' => [
        'pattern' => '/\[b\](.*?)\[\/b\]/s',
        'replace' => '<strong>$1</strong>'
    ],

    'italic' => [
        'pattern' => '/\[i\](.*?)\[\/i\]/s',
        'replace' => '<em>$1</em>'
    ],

    'underline' => [
        'pattern' => '/\[u\](.*?)\[\/u\]/s',
        'replace' => '<u>$1</u>'
    ],

    'header' => [
        'pattern' => '/\[h1\](.*?)\[\/h1\]/s',
        'replace' => '<h1>$1</h1>'
    ],

    'quote' => [
        'pattern' => '/\[quote\](.*?)\[\/quote\]/s',
        'replace' => '<blockquote>$1</blockquote>'
    ],

    'pre' => [
        'pattern' => '/\[pre\](.*?)\[\/pre\]/s'
    ],

    'code' => [
        'pattern' => '/\[code\](.*?)\[\/code\]/s'
    ],

    'monospace' => [
        'pattern' => '/\[monospace\](.*?)\[\/monospace\]/s',
        'replace' => '<samp>$1</samp>'
    ],

    'small' => [
        'pattern' => '/\[small\](.*?)\[\/small\]/s',
        'replace' => '<small>$1</small>'
    ],

    'img' => [
        'pattern' => '/\[img\](.*?)\[\/img\]/s',
        'replace' => '<a target="_blank" href="$1"><img src="$1"></a>'
    ],

    'img-alt' => [
        'pattern' => '/\[img\=(.*?)\](.*?)\[\/img\]/s',
        'replace' => '<a target="_blank" title="$1" href="$2"><img alt="$1" src="$2"></a>'
    ],

    'img-noborder' => [
        'pattern' => '/\[img-noborder\](.*?)\[\/img-noborder\]/s',
        'replace' => '<a target="_blank" href="$1"><img class="noborder" src="$1"></a>'
    ],

    'div' => [
        'pattern' => '/\[div\=(.*?)\](.*?)\[\/div\]/s',
        'replace' => '<div class="$1">$2</div>'
    ],

    'cite' => [
        'pattern' => '/\[cite\](.*?)\[\/cite\]/s',
        'replace' => '<div class="cite">&mdash; $1</div>'
    ],

    'link' => [
        'pattern' => '/\[url\=(.*?)\](.*?)\[\/url\]/s',
        'replace' => '<a target="_blank" href="$1">$2</a>'
    ],

    'video' => [
        'pattern' => '/\[video\](.*?)\[\/video\]/s',
        'replace' => '<div class="video embed-responsive embed-responsive-16by9">'.
                        '<video class="video-js vjs-16-9" controls preload="auto" data-setup="{}">'.
                        '$1</video></div>'
    ],

    'source' => [
        'pattern' => '/\[source\=(.*?)\](.*?)\[\/source\]/s',
        'replace' => '<source src="$2" type="$1">'
    ]
    
];

?>