<?php

class QuestionSetContr extends Dbh
{
    public function deleteTopic($topicId)
    {
        $deleteQuery = "DELETE FROM $this->topicsTable WHERE topic_id=$topicId";
        if (mysqli_query($this->connect(), $deleteQuery)) {
            $this->deleteSetByTest($topicId);
            return True;
        }
        return False;
    }
}