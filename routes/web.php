<?php

use Illuminate\Support\Facades\Redis;

Route::get('videos/{id}', function ($id) {
    $downloads = Redis::get("videos.{$id}.downloads");

   	return view('welcome', compact('downloads'));
});

Route::get('videos/{id}/download', function ($id) {
	Redis::incr("videos.{$id}.downloads");

	return back();
});
