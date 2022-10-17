<?php
require '../classes/questioncontr.class.php';

if (isset($_POST['add_question'])) {
  $back_path = '../add-question.php';
  $next_path = '../add-question.php';
  $dateTime = date('Ymdhis') . '_';

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
  $oNs = ($_POST['not-sure']) ? $_POST['not-sure'] : 'off' ;

  //images
  $o1_i = $dateTime . $_FILES['a-image']['name'];
  $o2_i = $dateTime . $_FILES['b-image']['name'];
  $o3_i = $dateTime . $_FILES['c-image']['name'];
  $o4_i = $dateTime . $_FILES['d-image']['name'];

  $o1_i_u = $_FILES['a-image']['tmp_name'];
  $o2_i_u = $_FILES['b-image']['tmp_name'];
  $o3_i_u = $_FILES['c-image']['tmp_name'];
  $o4_i_u = $_FILES['d-image']['tmp_name'];

  $img = $dateTime . $_FILES['q-image']['name'];
  $img_upload = $_FILES['q-image']['tmp_name'];
  $rImg = $dateTime . $_FILES['ref-image']['name'];
  $rImg_upload = $_FILES['ref-image']['tmp_name'];

  // Question setup and creation
  $question = new QuestionContr();
  $question->questionSetup($cl, $sub, $cha, $top, $sTop, $img, $q, $a, $o1, $o1_i, $o2, $o2_i, $o3, $o3_i, $o4, $o4_i, $oNs, $rImg, $ref, $refLink);
  $add_question = $question->create();
  $img_folder_path = $question->img_upload_path;

  // If successful only then upload files else don't
  if ($add_question) {
    // file upload
    move_uploaded_file($o1_i_u, $img_folder_path . $o1_i);
    move_uploaded_file($o2_i_u, $img_folder_path . $o2_i);
    move_uploaded_file($o3_i_u, $img_folder_path . $o3_i);
    move_uploaded_file($o4_i_u, $img_folder_path . $o4_i);
    move_uploaded_file($img_upload, $img_folder_path . $img);
    move_uploaded_file($rImg_upload, $img_folder_path . $rImg);

    header('Location: ' . $next_path . '?m=Successful&q-id='. $add_question);
  } else header('Location: ' . $next_path . '?m=Failed to add question');

}
