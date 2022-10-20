<?php
require '../classes/dbh.class.php';
require '../classes/questionsetcontr.class.php';
require '../classes/questioncontr.class.php';

if (isset($_GET['del']) && isset($_GET['i'])) {
    $deleteTarget = $_GET['del'];
    $targetId = $_GET['i'];
    $success = False;

    if ($deleteTarget == 'test') {
        require '../classes/testcontr.class.php';
        $testObject = new TestContr();
        $success = $testObject->deleteTest($targetId);
    } else if ($deleteTarget == 'ques') {
        require '../classes/questioncontr.class.php';
        $questionObject = new QuestionContr();
        $success = $questionObject->deleteQuestion($targetId);
    }
    echo ($success) ? 'Succeded' : 'Failed' ;
}