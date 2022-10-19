<?php

class QuestionSetContr extends Dbh
{
    private $questionId;
    private $testId;

    public function __construct($testId, $questionId = 0, $constructType = 'new')
    {
        $this->questionId = $questionId;
        $this->testId = $testId;
        if (!$this->checkExists()) {
            if ($constructType = 'new') $this->addSet();
        }
    }

    private function checkExists()
    {
        $getquery = "SELECT * FROM $this->testQuestionsTable WHERE test_id=$this->testId AND question_id = $this->questionId";
        $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
        if (!empty($id['test_id'])) return True;
        return False;
    }

    private function addSet()
    {
        $addquery = "INSERT INTO $this->testQuestionsTable (test_id, question_id) VALUES($this->testId, $this->questionId)";
        if (mysqli_query($this->connect(), $addquery)) return True;
        return False;
    }
}