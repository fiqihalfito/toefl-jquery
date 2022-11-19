<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        $exampath = storage_path() . "/app/toefl/exam.json";
        $json = json_decode(file_get_contents($exampath), true);
        $collection = collect($json)->sortBy(function ($exam, $key) {
            if ($exam['type'] == 'listening') {
                return 1;
            }
            if ($exam['type'] == 'structure') {
                return 2;
            }
            if ($exam['type'] == 'reading') {
                return 3;
            }
        });
        // dd($json);
        $questions = $collection->values()->all();
        // dd($data);

        return view('exam/index', [
            'questions' => $questions
        ]);
    }

    public function submit(Request $request)
    {
        $exam = new Exam();
        $res = $exam->getScores($request);

        return $res;
        // return $results;
        // dd(json_encode($results));
    }

    public function finish(Request $request)
    {
        $examModel = new Exam();
        $res = $examModel->getScores($request);

        return view('exam.finish', [
            'result'  => $res
        ]);
    }

    public function welcome()
    {
        return view('exam.welcome');
    }
}
