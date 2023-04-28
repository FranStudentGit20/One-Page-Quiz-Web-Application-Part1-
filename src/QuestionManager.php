<?php

namespace App;

use App\Question;

class QuestionManager
{
    protected $question_bank;
    protected $answers;

    public function __construct()
    {
        $this->question_bank = [];
        $this->answers = [
            null,
            'a. ',
            'b. ',
            'c. ',
            'b. ',
            'a. ',
            'b. ',
            'c. ',
            'd. ',
            'a. ',
            'a. '
        ];
    }

    public function initialize()
    {
        try {
            $questions_file = 'questions.json';
            $questions = file_get_contents($questions_file);
            $questions = json_decode($questions);

            foreach ($questions as $item) {
                $question = new Question(
                    $item->number,
                    $item->question,
                    $item->choices
                );
                array_push($this->question_bank, $question);
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function retrieveQuestion($number)
    {
        if ($number > count($this->question_bank)) {
            return null;
        }

        if ($number < 0) {
            return null;
        }

        return $this->question_bank[$number - 1];
    }

    public function getQuestionSize()
    {
        return count($this->question_bank);
    }

    public function computeScore($answers)
    {
        $score = 0;

        foreach ($answers as $number => $answer) {
            if ($answer == $this->answers[$number]) {
                $score++;
            }
        }

        return $score;
    }
    
    public function correctIncorrect($answers)
    {
        $quest = array();
        foreach ($answers as $number => $answer) {
            if ($answer == $this->answers[$number]) {
                $quest[$number] = array($answer, 1);
            }else{
                $quest[$number] = array($answer, 0);
            }
        }

        return $quest;
    }
}