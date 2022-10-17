<?php
require '../classes/dbh.class.php';

class QuestionSetContr extends Dbh
{
    private $questionId;
    private $testId;

    public function __construct($questionId, $testId)
    {
        $this->questionId = $questionId;
        $this->testId = $testId;
        if (!$this->checkExists()) $this->addSet();
    }

    private function checkExists()
    {
        $getquery = "SELECT sub_id FROM test_questions WHERE test_id=$this->testId AND question_id = $this->questionId";
        $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
        if (!empty($id['sub_id'])) return True;
        return False;
    }

    private function addSet()
    {
        $addquery = "INSERT INTO test_questions(test_id, question_id) VALUES($this->testId, $this->questionId)";
        if (mysqli_query($this->connect(), $addquery)) return True;
        return False;
    }
}