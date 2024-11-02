<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    public function home()
    {
        $languages = [
            ['code' => 'jp', 'name' => 'Japanese', 'image' => 'path/to/japanese_image.jpg'],
            ['code' => 'cn', 'name' => 'Chinese', 'image' => 'path/to/chinese_image.jpg']
        ];

        return view('home', compact('languages'));
    }

    public function selectMode($language)
    {
        return view('select_mode', compact('language'));
    }

    public function showQuiz($language, $mode)
    {
        $filePath = "app/{$language}.json";

        if (!Storage::exists($filePath)) {
            abort(404, "Quiz for the selected language not found.");
        }

        // Fetch and shuffle questions, then take the first 50
        $questions = json_decode(Storage::get($filePath), true);
        shuffle($questions);
        $questions = array_slice($questions, 0, 50);

        return view('quiz', compact('questions', 'language', 'mode'));
    }

}
