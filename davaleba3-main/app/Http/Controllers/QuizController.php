<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class QuizController extends Controller
{
    public function addQuizzes()
    {
        for ($i = 1; $i <= 16; $i++) {
            $quiz = new Quiz();
            $quiz->სათაური = "quiz $i";
            
            $quiz->აღწერა = "რამე $i";
            $quiz->ფოტო = "https://png.pngtree.com/png-clipart/20210129/ourmid/pngtree-3d-letter-q-golden-luxury-png-image_2788900.jpg $i";
            $quiz->სტატუსი = "აქტიური $i";
            
            $quiz->save();
        }

        return "დაემატა 16 ქვიზი";
    }

    public function getActiveQuizzes()
    {
        $quizzes = Quiz::where('active', 1)->take(8)->get();

        foreach ($quizzes as $quiz) {
            echo $quiz->სათაური . '<br>';
        }
    }
}

public function getCustomQuizzes()
{
    // Retrieve quizzes based on specified criteria
    $quizzes = Quiz::where(function ($query) {
            $query->where('აღწერა', '=', '')
                ->whereNotNull('ფოტო')
                ->orWhere(function ($query) {
                    $query->where('active', '=', 0)
                        ->whereNotNull('ფოტო');
                })
                ->orWhere(function ($query) {
                    $query->where('active', '=', 1)
                        ->where('აღწერა', '=', '');
                });
        })
        ->take(3)
        ->get();

    foreach ($quizzes as $quiz) {
        echo $quiz->სათაური . '<br>';
    }
}

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

