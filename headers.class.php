<?php
namespace KC;

Class HTTPHeaders {
    
    // Allow origin
    static function allowOrigin($origin = '*') {
        @header("Access-Control-Allow-Origin: $origin");
    }
    
    // Set response JSON
    static function setHeaderJson($charset = 'utf-8') {
        @header("Content-Type: application/json; charset=$charset");
    }
    
    // Set response HTML
    static function setHeaderHtml($charset = 'utf-8') {
        @header("Content-Type: text/html; charset=$charset");
    }
    
    // Set response Text
    static function setHeaderText($charset = 'utf-8') {
        @header("Content-Type: text/plain; charset=$charset");
    }
    
    // No robots
    static function noRobots() {
        @header('X-Robots-Tag: noindex, nofollow');
    }
    
    // 404 Not found
    static function set404() {
        @header('HTTP/1.1 404 Not Found', true, 404);
    }
    
    // 403 Forbidden
    static function set403() {
        @header('HTTP/1.1 403 Forbidden', true, 403);
    }
    
    // 401 Unauthorized
    static function set401() {
        @header('HTTP/1.1 401 Unauthorized', true, 401);
    }
    
    // 400 Bad Request
    static function set400() {
        @header('HTTP/1.1 400 Bad Request', true, 400);
    }
    
    // 200 OK
    static function set200() {
        @header('HTTP/1.1 200 OK', true, 200);
    }
    
    // Redirect
    static function redirect($url, $is301 = false) {
        if($is301) @header('HTTP/1.1 301 Moved Permanently');
        @header("Location: $url");
    }
    
    // Download zip
    static function downloadZip($url) {
        $nm = basename($url);
        $fz = filesize($url);
        header("Content-Type: application/zip");
        header("Content-Disposition: attachment; filename=\"$nm\"");
        header("Content-Length: $fz");
        header("Location: $url");
    }
}