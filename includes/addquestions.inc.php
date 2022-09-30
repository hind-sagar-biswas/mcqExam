<?php
require '../classes/questioncontr.class.php';

$question = new QuestionContr();
if (isset($_POST['add_question'])) {

  $img_folder_path = '../assets/images/';
  $back_path = '../add-question.php';
  $dateTime = date('Ymdhis') . '_';

  $opId;
  $topId;
  $sTopId;

  $cl = $_POST['class'];
  $sub = $_POST['subject'];
  $cha = $_POST['chapter'];
  $top = $_POST['topic'];
  $sTop = $_POST['sub-topic'];
  $q = $_POST['question'];
  $a = $_POST['answer'];
  $ref = $_POST['ref'];
  $refLink = $_POST['ref-link'];

  //options
  $o1 = $_POST['option-a'];
  $o2 = $_POST['option-b'];
  $o3 = $_POST['option-c'];
  $o4 = $_POST['option-d'];
  $oNs = $_POST['not-sure'];
  //images
  $o1_i = $dateTime . $_FILES['a-image']['name'];
  $o2_i = $dateTime . $_FILES['b-image']['name'];
  $o3_i = $dateTime . $_FILES['c-image']['name'];
  $o4_i = $dateTime . $_FILES['d-image']['name'];

  $o1_i_u = $_FILES['a-image']['tmp_name'];
  $o2_i_u = $_FILES['b-image']['tmp_name'];
  $o3_i_u = $_FILES['c-image']['tmp_name'];
  $o4_i_u = $_FILES['d-image']['tmp_name'];



  $topId = $question->getTopicId($top, 'main');
  if (!empty($sTop)) {
    $sTopId = $question->getTopicId($sTop, 'sub');
  } else {
    $sTopId = 0;
  }

  $add_option = $question->addOpt($o1, $o1_i, $o2, $o2_i, $o3, $o3_i, $o4, $o4_i, $oNs);
  if ($add_option != False) {
    move_uploaded_file($o1_i_u, $img_folder_path . $o1_i);
    move_uploaded_file($o2_i_u, $img_folder_path . $o2_i);
    move_uploaded_file($o3_i_u, $img_folder_path . $o3_i);
    move_uploaded_file($o4_i_u, $img_folder_path . $o4_i);
    $opId = $add_option;
  } else {
    $opId = 0;
  }

  $img = $dateTime . $_FILES['q-image']['name'];
  $img_upload = $_FILES['q-image']['tmp_name'];
  $rImg = $dateTime . $_FILES['ref-image']['name'];
  $rImg_upload = $_FILES['ref-image']['tmp_name'];

  $add_question = $question->addQues($cl, $sub, $cha, $topId, $sTopId, $img, $q, $a, $opId, $rImg, $ref, $refLink);

  if ($add_question) {
    move_uploaded_file($img_upload, $img_folder_path . $img);
    move_uploaded_file($rImg_upload, $img_folder_path . $rImg);
    header('Location: ' . $back_path . '');
  } else {
    header('Location: ' . $back_path . '');
  }
}
