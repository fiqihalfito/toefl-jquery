<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function getScores($userAnswers)
    {
        $userExamData = $this->checkUserAnswers($userAnswers);
        $convertedScores = $this->convertScores($userExamData);

        $sumConverted = $convertedScores->sum();
        $finalScore = ceil(($sumConverted * 10) / 3);

        return [
            'user' => $userExamData,
            'converted' => $convertedScores,
            'final' => $finalScore,
        ];
    }

    public function checkUserAnswers($userAnswers)
    {
        $exampath = storage_path() . "/app/toefl/exam.json";
        $json = json_decode(file_get_contents($exampath), true);
        $examdata = collect($json);

        $userAnswers = $userAnswers->collect();
        $userExamData = [];

        foreach ($userAnswers['answer'] as $userAnswer) {
            $userAnswer = collect($userAnswer);
            $realAnswer = $examdata->where('id', $userAnswer['questionId'])->first();

            $isCorrect = false;
            if ($userAnswer->has('answer')) {
                if ($userAnswer['answer'] == $realAnswer['answer']) {
                    $isCorrect = true;
                }
            }

            $userExamData[] = [
                'questionId' => $userAnswer['questionId'],
                'type' => $realAnswer['type'],
                'userAnswer' => $userAnswer['answer'] ?? false,
                'isCorrect' => $isCorrect
            ];
        }

        return $userExamData;
    }

    public function convertScores($userExamData)
    {
        $listening_conversion_scores = array_reverse([68, 67, 66, 65, 63, 62, 61, 60, 59, 58, 57, 57, 56, 55, 54, 54, 53, 52, 52, 51, 51, 50, 49, 49, 48, 48, 47, 47, 46, 45, 45, 44, 43, 42, 41, 41, 39, 38, 37, 35, 33, 32, 32, 31, 30, 29, 28, 27, 26, 25, 24]);
        $structure_conversion_scores = array_reverse([68, 67, 65, 63, 61, 60, 58, 57, 56, 55, 54, 53, 52, 51, 50, 49, 48, 47, 46, 45, 44, 43, 43, 41, 40, 40, 38, 37, 36, 35, 33, 31, 29, 27, 26, 25, 23, 22, 21, 20, 20]);
        $reading_conversion_scores = array_reverse([67, 66, 65, 63, 61, 60, 59, 58, 57, 56, 55, 54, 54, 53, 52, 52, 51, 50, 49, 48, 48, 47, 46, 46, 45, 44, 43, 43, 42, 41, 40, 39, 38, 37, 36, 35, 34, 32, 31, 30, 29, 28, 28, 27, 26, 25, 24, 23, 23, 22, 21]);

        $totalCorrect = $this->getTotalCorrect($userExamData);
        $converted = [
            'listening' => $listening_conversion_scores[$totalCorrect['listening']],
            'structure' => $structure_conversion_scores[$totalCorrect['structure']],
            'reading' => $reading_conversion_scores[$totalCorrect['reading']],
        ];

        return collect($converted);
    }


    public function getTotalCorrect($userExamData)
    {
        $total_listening = 0;
        $total_structure = 0;
        $total_reading = 0;

        foreach ($userExamData as $item) {

            if ($item['type'] == 'listening' && $item['isCorrect'] == true) {
                $total_listening++;
            }
            if ($item['type'] == 'structure' && $item['isCorrect'] == true) {
                $total_structure++;
            }
            if ($item['type'] == 'reading' && $item['isCorrect'] == true) {
                $total_reading++;
            }
        }

        $total_correct = [
            'listening' => $total_listening,
            'structure' => $total_structure,
            'reading' => $total_reading,
        ];

        return $total_correct;
    }
}
