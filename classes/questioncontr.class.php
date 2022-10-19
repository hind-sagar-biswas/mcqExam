<?php

class QuestionContr extends QuestionSetContr
{
  public $img_upload_path = '../assets/images/uploads/';

  private $cls;
  private $subj;
  private $subjId;
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

  public function questionSetup($cls, $subj, $chapter, $topic, $subTopic, $image, $question, $answer, $op1, $op1Img, $op2, $op2Img, $op3, $op3Img, $op4, $op4Img, $opNs, $refImg, $ref , $refLink)
  {
    $this->cls = $cls;
    $this->subj = $subj;
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

    $this->subjId = $this->getSubjectId($this->subj);
    $this->topicId = $this->getTopicId($this->topic, "main");
    $this->subTopicId = (!empty($this->subTopic)) ? $this->getTopicId($this->subTopic, "sub", $this->topicId) : 'NULL';
    $this->optionId = $this->getOptionId();
  }

  public function getSubjectId($subjectName)
  {
    $getquery = "SELECT sub_id FROM $this->subjectsTable WHERE subject_name='$subjectName'";
    $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
    if (empty($id['sub_id'])) {
      return $this->addSubject($subjectName);
    } else {
      return $id['sub_id'];
    }
  }

  public function addSubject($subjectName)
  {
    $addquery = "INSERT INTO $this->subjectsTable (subject_name) VALUES('$subjectName')";
    if (mysqli_query($this->connect(), $addquery)) {
      return $this->getSubjectId($this->subj);
    } else {
      return 0;
    }
  }

  public function getTopicId($topic, $type, $parent = null)
  {
    $getquery = "SELECT id FROM $this->topicsTable WHERE topic_name='$topic' AND topic_type='$type'";
    if ($type == 'sub') $getquery = $getquery . " AND parent_topic_id='$parent'" ;
    
    $id = mysqli_fetch_assoc(mysqli_query($this->connect(), $getquery));
    if (empty($id['id'])) {
      return $this->addTopic($topic, $type, $parent);
    } else {
      return $id['id'];
    }
  }

  public function addTopic($topic, $type, $parent)
  {
    $addquery = "INSERT INTO $this->topicsTable (topic_name,	topic_type, parent_topic_id) VALUES('$topic', '$type'";
    if($parent == null) $addquery = $addquery . ", NULL";
    else $addquery = $addquery . ", '$parent'";
    $addquery = $addquery . ")";
    
    if (mysqli_query($this->connect(), $addquery)) {
      return $this->getTopicId($topic, $type, $parent);
    } else {
      return 0;
    }
  }

  public function getOptionId()
  {
    $addquery = "INSERT INTO $this->optionsTable (option_a_img,	option_b_img,	option_c_img,	option_d_img,	option_a,	option_b,	option_c,	option_d,	option_ns) VALUES('$this->op1Img', '$this->op2Img', '$this->op3Img', '$this->op4Img', '$this->op1', '$this->op2', '$this->op3', '$this->op4', '$this->opNs')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      $query = mysqli_query($this->connect(), "SELECT option_id FROM $this->optionsTable ORDER BY option_id DESC LIMIT 1");
      $getId = mysqli_fetch_assoc($query);
      $id = $getId['option_id'];
      return $id;
    } else {
      return False;
    }
  }

  public function addQues()
  {
    $addquery = "INSERT INTO $this->questionsTable (class,	subject,	chapter,	topic_id,	sub_topic_id,	q_image,	q_text,	q_answer,	option_id,	ref_image,	ref_text, ref_link) VALUES('$this->cls', '$this->subjId', '$this->chapter', '$this->topicId', '$this->subTopicId', '$this->image', '$this->question', '$this->answer',' $this->optionId', '$this->refImg', '$this->ref', '$this->refLink')";
    if ($insertQuery = mysqli_query($this->connect(), $addquery)) {
      return True;
    } else {
      return False;
    }
  }

  public function create()
  {
    if ($this->addQues()) {
      $query = mysqli_query($this->connect(), "SELECT q_id FROM $this->questionsTable ORDER BY q_id DESC LIMIT 1");
      $getId = mysqli_fetch_assoc($query);
      $id = $getId['q_id'];
      return $id;
    }
    return 0;
  }

  
  // METHODS FOR DELETIONS

  public function deleteQuestion($questionId)
  {
    $optionId = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT option_id FROM $this->questionsTable WHERE id=$questionId"));

    $questionDeleteQuery = "DELETE FROM $this->questionsTable WHERE q_id=$questionId";
    $optionDeleteQuery = "DELETE FROM $this->optionsTable WHERE option_id=$optionId";

    if(mysqli_query($this->connect(), $questionDeleteQuery)) {
      $this->deleteSetByQuestion($questionId); // deleting all question-test sets for this question
      if (mysqli_query($this->connect(), $optionDeleteQuery)) return True;  // deleting option set for this question
      return False;
    }
    return False;
  }
}
