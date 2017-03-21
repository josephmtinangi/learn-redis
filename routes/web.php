<?php

use Illuminate\Support\Facades\Redis;

Route::get('articles/trending', function () {

    $trending = Redis::zrevrange('trending_articles', 0, 5);

    return $trending;
});

Route::get('articles/{article}', function (App\Article $article) {

    Redis::zincrby('trending_articles', 1, $article->id);

    return $article;
});

