<?php

class QuestionSetContr extends Dbh
{
    private $questionId;
    private $testId;

    public function setupQuestionSet($testId, $questionId = 0, $constructType = 'new')
    {
        $this->questionId = $questionId;
        $this->testId = $testId;
        if (!$this->checkSetExists()) {
            if ($constructType = 'new') $this->addSet();
        }
    }

    private function checkSetExists()
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


    // METHODS FOR DELETIONS

    public function deleteSetByTest($testId)
    {
        $setDeleteQuery = "DELETE FROM $this->testQuestionsTable WHERE test_id=$testId";
        if (mysqli_query($this->connect(), $setDeleteQuery)) return True;
        return False;
    }

    public function deleteSetByQuestion($questionId)
    {
        $setDeleteQuery = "DELETE FROM $this->testQuestionsTable WHERE question_id=$questionId";
        if (mysqli_query($this->connect(), $setDeleteQuery)) return True;
        return False;
    }
}