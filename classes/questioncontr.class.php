<?php
require '../classes/dbh.class.php';

class QuestionContr extends Dbh
{
  private $cls;
  private $subject;
  private $chapter;
  private $topic;
  private $subTopic;
  private $topicId;
  private $subTopicId;
  private $image;
  private $question;
  private $answer;
  private $op1;
  private $op1Img;
  private $op2;
  private $op2Img;
  private $op3;
  private $op3Img;
  private $op4;
  private $op4Img;
  private $opNs;
  private $optionId;
  private $refImg;
  private $ref ;
  private $refLink; 

  public function __construct($cls, $subject, $chapter, $topic, $subTopic, $image, $question, $answer, $op1, $op1Img, $op2, $op2Img, $op3, $op3Img, $op4, $op4Img, $opNs, $refImg, $ref , $refLink)
  {
    $this->cls = $cls;
    $this->subject = $subject;
    $this->chapter = $chapter;
    $this->topic = $topic;
    $this->subTopic = $subTopic;
    $this->image = $image;
    $this->question = $question;
    $this->answer = $answer;
    $this->op1 = $op1;
    $this->op1Img = $op1Img;
    $this->op2 = $op2;
    $this->op2Img = $op2Img;
    $this->op3 = $op3;
    $this->op3Img = $op3Img;
    $this->op4 = $op4;
    $this->op4Img = $op4Img;
    $this->opNs = $opNs;
    $this->refImg = $refImg;
    $this->ref = $ref;
    $this->refLink = $refLink; 

    $this->topicId = $this->getTopicId($this->topic, "main");
    $this->subTopicId = (!empty($this->subTopic)) ? $this->getTopicId($this->subTopic, "sub", $this->topicId); : 'NULL'; ;

  }

  public function getTopicId($topic, $type, $parent = 'NULL')
  {
    $getquery = "SELECT id FROM topics WHERE topic_name='$topic' AND topic_type='$type'";
    $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
    if (empty($id['id'])) {
      return $this->addTopic($topic, $type);
    } else {
      return $id['id'];
    }
  }

  public function addTopic($topic, $type)
  {
    $addquery = "INSERT INTO topics(topic_name,	topic_type) VALUES('$topic', '$type')";
    if (mysqli_query($this->connect(), $addquery)) {
      return $this->getTopicId($topic, $type);
    } else {
      return 0;
    }
  }

  public function addOpt($op1, $op1Img, $op2, $op2Img, $op3, $op3Img, $op4, $op4Img, $opNs)
  {
    $addquery = "INSERT INTO options(option_a_img,	option_b_img,	option_c_img,	option_d_img,	option_a,	option_b,	option_c,	option_d,	option_ns) VALUES('$op1Img', '$op2Img', '$op3Img', '$op4Img', '$op1', '$op2', '$op3', '$op4','$opNs')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      $query = mysqli_query($this->connect(), "SELECT option_id FROM options ORDER BY option_id DESC LIMIT 1");
      $getId = mysqli_fetch_assoc($query);
      $id = $getId['option_id'];
      return $id;
    } else {
      return False;
    }
  }

  public function addQues($cl, $sub, $cha, $top, $stop, $img, $q, $a, $op, $rImg, $ref, $refLink)
  {
    $addquery = "INSERT INTO questions(class,	subject,	chapter,	topic_id,	sub_topic_id,	q_image,	q_text,	q_answer,	option_id,	ref_image,	ref_text, ref_link) VALUES('$cl', '$sub', '$cha', '$top', '$stop', '$img', '$q', '$a',' $op', '$rImg', '$ref', '$refLink')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      return True;
    } else {
      return False;
    }
  }
}
