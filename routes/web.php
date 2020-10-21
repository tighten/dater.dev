<?php

use App\Translator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('translate', function () {
    $translator = new Translator(request('query'));

    if ($translator->valid()) {
        return response()->json([
            'help' => $translator->helpMessage(),
            'translation' => $translator->translation(),
        ]);
    }

    abort(500);
});
