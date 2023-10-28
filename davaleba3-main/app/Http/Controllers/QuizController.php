<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

public function create(Request $request)
{
    $quiz = new Quiz();
    $quiz->title = $request->input('title');
    $quiz->description = $request->input('description');

    $quiz->save();

    return redirect()->route('quiz.edit', ['id' => $quiz->id])->with('success', 'ქვიზი შექმნილია!');
}

public function update(Request $request, $id)
{
    $quiz = Quiz::findOrFail($id);
    $quiz->title = $request->input('title');
    $quiz->description = $request->input('description');

    $quiz->save();

    return redirect()->route('quiz.edit', ['id' => $quiz->id])->with('success', 'ქვიზი განახლებულია!');
}

