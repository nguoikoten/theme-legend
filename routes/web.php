<?php

use Illuminate\Support\Facades\Route;
use Chilltv\ThemeLegend\Controllers\ThemeLegendController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
    ),
], function () {
    Route::get('/', [ThemeLegendController::class, 'index']);
    Route::get(sprintf('/%s/{category}', config('Chilltv.routes.category', 'the-loai')), [ThemeLegendController::class, 'getMovieOfCategory'])->name('categories.movies.index');
    Route::get(sprintf('/%s/{actor}', config('Chilltv.routes.actors', 'dien-vien')), [ThemeLegendController::class, 'getMovieOfActor'])->name('actors.movies.index');
    Route::get(sprintf('/%s/{director}', config('Chilltv.routes.directors', 'dao-dien')), [ThemeLegendController::class, 'getMovieOfDirector'])->name('directors.movies.index');
    Route::get(sprintf('/%s/{tag}', config('Chilltv.routes.tags', 'tu-khoa')), [ThemeLegendController::class, 'getMovieOfTag'])->name('tags.movies.index');
    Route::get(sprintf('/%s/{region}', config('Chilltv.routes.region', 'quoc-gia')), [ThemeLegendController::class, 'getMovieOfRegion'])->name('regions.movies.index');
    Route::get(sprintf('/%s/{type}', config('Chilltv.routes.types', 'danh-sach')), [ThemeLegendController::class, 'getMovieOfType'])->name('types.movies.index');
    Route::get(sprintf('/%s/{movie}', config('Chilltv.routes.movie', 'phim')), [ThemeLegendController::class, 'getMovieOverview'])->name('movies.show');
    Route::get(sprintf('/%s/{movie}/{episode}-{id}', config('Chilltv.routes.movie', 'phim')), [ThemeLegendController::class, 'getEpisode'])
        ->where(['movie' => '.+', 'episode' => '.+', 'id' => '[0-9]+'])->name('episodes.show');
    Route::post(sprintf('/%s/{movie}/{episode}-{id}/report', config('Chilltv.routes.movie', 'phim')), [ThemeLegendController::class, 'reportEpisode'])
        ->where(['movie' => '.+', 'episode' => '.+', 'id' => '[0-9]+'])->name('episodes.report');
    Route::post(sprintf('/%s/{movie}/rate', config('Chilltv.routes.movie', 'phim')), [ThemeLegendController::class, 'rateMovie'])->name('movie.rating');
});
