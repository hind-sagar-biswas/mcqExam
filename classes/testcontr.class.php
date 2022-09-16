<?php
require '../classes/dbh.class.php';

class QuestionContr extends Dbh
{
  private function addTopic($topic)
  {
    $addquery = "INSERT INTO topics(topic_name,	topic_type) VALUES('$topic', 'main')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      // $query = mysqli_query($this->connect(), "SELECT id FROM topics ORDER BY id DESC LIMIT 1");
      // $getId = mysqli_fetch_assoc($query);
      // $id = $getId['id'];
      // return $id;
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

  public function addTest($title, $description, $class, $sub, $topic, $uMark, $cMark, $wMark, $ns)
  {
    if (!empty($topic)) {
      $topicId = $this->getTopicId($topic);
    } else {
      $topicId = 'NULL';
    }

    $addquery = "INSERT INTO topics(test_title, test_description, test_class, test_subject, test_topic, unattended_mark, correct_mark, wrong_mark, ns_enabled) VALUES('$title', '$description', '$class', '$sub', '$topic', '$uMark', '$cMark', '$wMark', '$ns')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      $query = mysqli_query($this->connect(), "SELECT id FROM tests ORDER BY id DESC LIMIT 1");
      $getId = mysqli_fetch_assoc($query);
      $id = $getId['id'];
      return $id;
    } else {
      return 0;
    }
  }
}
