<?php

use App\DocumentationPages;
use App\PodcastEpisode;
use App\Screencast;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


// Home Page.
Route::get('/', function () {
    return view('home', [
        'title' => 'Livewire Examples',
    ]);
});

Route::redirect('/docs', '/docs/multiselect');
Route::get('/docs/{page}', function ($slug) {
    if (! file_exists($path = resource_path('views/docs/'.$slug.'.blade.php'))) {
        abort(404);
    }
    $pages = new DocumentationPages($slug);
    $content = View::file($path)->render();

    return view('docs', [
        'title' => $pages->title(),
        'slug' => $slug,
        'pages' => $pages,
        'content' => $content,
    ]);
});

