<?php
require '../classes/dbh.class.php';

class TestContr extends Dbh
{
  private $title;
  private $description;
  private $testClass;
  private $sub;
  private $subId;
  private $topic;
  private $topicId;
  private $uMark;
  private $cMark;
  private $wMark;
  private $notSure;
  private $questionRandomize;
  private $optionRandomize;

  public function __construct($title, $description, $testClass, $sub, $topic, $uMark, $cMark, $wMark, $notSure, $questionRandomize, $optionRandomize)
  {
    $this->title = $title;
    $this->description = $description;
    $this->testClass = $testClass;
    $this->sub = $sub;
    $this->topic = $topic;
    $this->uMark = $uMark;
    $this->cMark = $cMark;
    $this->wMark = $wMark;
    $this->notSure = $notSure;
    $this->questionRandomize = $questionRandomize;
    $this->optionRandomize = $optionRandomize;
  }

  public function getSubjectId($subjectName)
  {
    $getquery = "SELECT sub_id FROM subjects WHERE subject_name='$subjectName'";
    $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
    if (empty($id['sub_id'])) {
      return $this->addSubject($subjectName);
    } else {
      return $id['sub_id'];
    }
  }

  public function addSubject($subjectName)
  {
    $addquery = "INSERT INTO subjects(subject_name) VALUES('$subjectName')";
    if (mysqli_query($this->connect(), $addquery)) {
      return $this->getSubjectId($this->subj);
    } else {
      return 0;
    }
  }

  private function addTopic($topic)
  {
    $addquery = "INSERT INTO topics(topic_name,	topic_type) VALUES('$topic', 'main')";
    if (mysqli_query($this->connect(), $addquery)) {
      return $this->getTopicId($topic);
    } else {
      return 0;
    }
  }

  private function getTopicId($topic)
  {
    $getquery = "SELECT id FROM topics WHERE topic_name='$topic' AND topic_type='main'";
    $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
    if (empty($id['id'])) {
      return $this->addTopic($topic);
    } else {
      return $id['id'];
    }
  }

  public function addTest()
  {
    // CHECK FOR TOPIC AND FETCH TOPIC ID
    if (!empty($this->sub)) {
      $this->subId = $this->getSubjectId($this->sub);
    } else {
      $this->subId = 'NULL';
    }
    // CHECK FOR TOPIC AND FETCH TOPIC ID
    if (!empty($this->topic)) {
      $this->topicId = $this->getTopicId($this->topic);
    } else {
      $this->topicId = 'NULL';
    }

    $addquery = "INSERT INTO tests(test_title, test_description, test_class, test_subject, test_topic, unattended_mark, correct_mark, wrong_mark, ns_enabled, ques_randomize,	opt_randomize) VALUES('$this->title', '$this->description', '$this->testClass', $this->subId, $this->topicId, '$this->uMark', '$this->cMark', '$this->wMark', '$this->notSure', '$this->questionRandomize', '$this->optionRandomize')";
    if (mysqli_query($this->connect(), $addquery)) {
      $query = mysqli_query($this->connect(), "SELECT test_id FROM tests ORDER BY test_id DESC LIMIT 1");
      $getId = mysqli_fetch_assoc($query);
      $id = $getId['test_id'];
      return $id;
    } else {
      return false;
    }
  }
}
