<?php
require './classes/dbh.class.php';

class TestView extends Dbh
{
     private $id;
     private $title;
     private $description;
     private $testClass;
     private $sub;
     private $topicId;
     private $uMark;
     private $cMark;
     private $wMark;
     private $ns;

     public function __construct($type = 'a', $id = 0)
     {
          if ($type == 'i' && $id != 0) {
               $this->id = $id;
               $this->getTest($this->id);
          }
     }

     public function getTest($id)
     {
          $getquery = "SELECT * FROM tests WHERE test_id=$id";
          $test = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
          if (empty($test['test_id'])) {
               $this->title = $test['test_title'];
               $this->description = $test['test_description'];
               $this->testClass = $test['test_class'];
               $this->sub = $test['test_subject'];
               $this->topicId = $test['test_topic'];
               $this->uMark = $test['unattended_mark'];
               $this->cMark = $test['correct_mark'];
               $this->wMark = $test['wrong_mark'];
               $this->ns = $test['ns_enabled'];
          }
     }
}
