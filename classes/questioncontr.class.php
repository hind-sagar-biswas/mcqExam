<?php
require '../classes/dbh.class.php';

class QuestionContr extends Dbh
{

  public function addTopic($topic, $type)
  {
    $addquery = "INSERT INTO topics(topic_name,	topic_type) VALUES('$topic', '$type')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      $query = mysqli_query($this->connect(), "SELECT id FROM topics ORDER BY id DESC LIMIT 1");
      $getId = mysqli_fetch_assoc($query);
      $id = $getId['id'];
      return $id;
    } else {
      return False;
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
