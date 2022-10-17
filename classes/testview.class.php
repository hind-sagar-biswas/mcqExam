<?php
require './classes/dbh.class.php';

class TestView extends Dbh
{
     private $getAllQuery = "SELECT * FROM tests";
     private $questionsAccesible = False;

     private $associatedQuestions = array();

     public $id;
     public $title;
     public $description;
     public $testClass;
     private $subId;
     private $topicId;
     public $uMark;
     public $cMark;
     public $wMark;
     public $notSure;
     public $questionRandomize;
     public $optionRandomize;

     public function __construct($id = 0)
     {
          $this->id = $id;
          if ($id != 0) {
               $this->getTest($this->id);
          }
     }

     private function getSubject($subjectId)
     {
          if (!$subjectId) return '';
          $getquery = "SELECT subject_name FROM subjects WHERE sub_id=$subjectId";
          $subj = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
          return $subj['subject_name'];
     }

     private function getTopic($topicId)
     {
          if (!$topicId) return '';
          $getquery = "SELECT topic_name FROM topics WHERE id=$topicId";
          $topic = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
          return $topic['topic_name'];
     }

     public function getTest()
     {
          if ($this->id != 0) {
               $getquery = "SELECT * FROM tests WHERE test_id=$this->id";
               $test = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
               if (!empty($test['test_id'])) {
                    $this->title = $test['test_title'];
                    $this->description = $test['test_description'];
                    $this->testClass = $test['test_class'];
                    $this->subId = $test['test_subject'];
                    $this->topicId = $test['test_topic'];
                    $this->uMark = $test['unattended_mark'];
                    $this->cMark = $test['correct_mark'];
                    $this->wMark = $test['wrong_mark'];
                    $this->notSure = $test['ns_enabled'];
                    $this->questionRandomize = $test['ques_randomize'];
                    $this->optionRandomize = $test['opt_randomize'];

                    $this->subjectName = $this->getSubject($this->subId);
                    $this->topic = $this->getTopic($this->topicId);

                    $this->questionsAccesible = True;
                    return False;
               } else return 'Unable to acccess test : No test found with id(' . $this->id . ')!';
          } else return 'Unable to acccess test : No test id provided';
     }

     public function getAllTests() {
          $query = (mysqli_query($this->connect(), $this->getAllQuery));
          while ($test =  mysqli_fetch_assoc($query)) {
              echo $test['test_id'];
          }
     }

     public function getQuestions()
     {
          if ($this->questionsAccesible) {
               $getquery = "SELECT * FROM test_questions WHERE test_id=$this->id ORDER BY create_time DESC";
               $query = (mysqli_query($this->connect(), $getquery));
               while ($question =  mysqli_fetch_assoc($query)) {
                    array_push($this->asssociatedQuestions, $question);
               }
          } else return 'Unable to acccess questions';
     }

     public function getAssociatedQuestions()
     {
          return $this->associatedQuestions;
     }
}
