<?php
require '../classes/testcontr.class.php';

$target_path = '../create-test.php';
$back_path = '../add-test.php';

if (isset($_POST['add_test'])) {
     $title = $_POST['title'];
     $description = $_POST['description'];
     $testClass = $_POST['class'];
     $sub = $_POST['subject'];
     $topic = $_POST['topic'];
     $uMark = $_POST['correct-mark'];
     $cMark = $_POST['unattended-mark'];
     $wMark = $_POST['wrong-mark'];
     $ns = $_POST['ns_enabled'];

     $test = new TestContr($title, $description, $testClass, $sub, $topic, $uMark, $cMark, $wMark, $ns);

     $id = $test->addTest();
     if ($id) {
          header('Location: ' . $target_path . '?i=' . $id);
     } else {
          header('Location: ' . $back_path . '?m=Something went wrong');
     }
}
