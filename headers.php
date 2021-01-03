<?php

// Allow origin
function allowOrigin($origin = '*') {
    @header("Access-Control-Allow-Origin: $origin");
}

// Set response JSON
function setHeaderJson($charset = 'utf-8') {
    @header("Content-Type: application/json; charset=$charset");
}

// Set response HTML
function setHeaderHtml($charset = 'utf-8') {
    @header("Content-Type: text/html; charset=$charset");
}

// Set response Text
function setHeaderText($charset = 'utf-8') {
    @header("Content-Type: text/plain; charset=$charset");
}

// No robots
function noRobots() {
    @header('X-Robots-Tag: noindex, nofollow');
}

// 404 Not found
function set404() {
    @header('HTTP/1.1 404 Not Found', true, 404);
}

// 403 Forbidden
function set403() {
    @header('HTTP/1.1 403 Forbidden', true, 403);
}

// 401 Unauthorized
function set401() {
    @header('HTTP/1.1 401 Unauthorized', true, 401);
}

// 400 Bad Request
function set400() {
    @header('HTTP/1.1 400 Bad Request', true, 400);
}

// 200 OK
function set200() {
    @header('HTTP/1.1 200 OK', true, 200);
}

// Redirect
function redirect($url, $is301 = false) {
    if($is301) @header('HTTP/1.1 301 Moved Permanently');
    @header("Location: $url");
}

// Download zip
function downloadZip($url) {
    $nm = basename($url);
    $fz = filesize($url);
    header("Content-Type: application/zip");
    header("Content-Disposition: attachment; filename=\"$nm\"");
    header("Content-Length: $fz");
    header("Location: $url");
}