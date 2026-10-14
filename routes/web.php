<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return ['foo' => "bar"];
});

Route::get('test', function () {
    $name = request('name');
    return view('test', [
        'name' => $name
    ]);
});
Route::get('posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => "this is my first post",
        'my-second-post' => "now i am getting into this blogging thing"
    ];

    if (!array_key_exists($post, $posts)) {
        abort(404, "sorry this page does not exist!");
    }
    
    return view('post', [
        'post' => $posts[$post] ?? "this page isn't available!"
    ]);
});
