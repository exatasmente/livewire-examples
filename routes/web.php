<?php

use App\DocumentationPages;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::redirect('/', '/docs/multiselect');
Route::get('/docs/{page}', function ($slug) {
    $path = resource_path('views/docs/'.$slug.'.blade.php');
    if (! file_exists($path)) {
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

