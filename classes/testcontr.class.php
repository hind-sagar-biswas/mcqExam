<?php
require '../classes/dbh.class.php';

class TestContr extends Dbh
{
  private $title;
  private $description;
  private $testClass;
  private $sub;
  private $topic;
  private $topicId;
  private $uMark;
  private $cMark;
  private $wMark;
  private $ns;

  public function __construct($title, $description, $testClass, $sub, $topic, $uMark, $cMark, $wMark, $ns)
  {
    $this->title = $title;
    $this->description = $description;
    $this->testClass = $testClass;
    $this->sub = $sub;
    $this->topic = $topic;
    $this->uMark = $uMark;
    $this->cMark = $cMark;
    $this->wMark = $wMark;
    $this->ns = $ns;
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
    if (!empty($this->topic)) {
      $this->topicId = $this->getTopicId($this->topic);
    } else {
      $this->topicId = 'NULL';
    }

    $addquery = "INSERT INTO tests(test_title, test_description, test_class, test_subject, test_topic, unattended_mark, correct_mark, wrong_mark, ns_enabled) VALUES('$this->title', '$this->description', '$this->testClass', '$this->sub', '$this->topicId', '$this->uMark', '$this->cMark', '$this->wMark', '$this->ns')";
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
