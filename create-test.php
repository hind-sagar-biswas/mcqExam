<?php
$pageTitle = "Create Test";

require './classes/dbh.class.php';
include './classes/questionview.class.php';
include './classes/testview.class.php';
require './templates/head.php';

if (isset($_GET['i'])) {
     $testObject = new TestView($_GET['i']);
} else header('Location: ./add-test.php');
?>
<div class="container-fluid">
     <!-- TEST INFORMATIONS -->
     <div class="p-3">
          <h3><?php echo $testObject->title; ?></h3>
          <p><?php echo $testObject->description; ?></p>
          <p>
               <a href="#">[Edit]</a>
               <a href="./includes/deletes.inc.php?del=test&i=<?php echo $testObject->id; ?>" class="text-danger">[Delete]</a>
          </p> 
          <ul class="listgroup">
               <li class="list-group-item">
                    <strong>Class :</strong>
                    <?php echo $testObject->testClass; ?>
               </li>
               <li class="list-group-item">
                    <strong>Subject :</strong>
                    <?php echo $testObject->subjectName; ?>
               </li>
               <li class="list-group-item">
                    <strong>Topic :</strong>
                    <?php echo $testObject->topic; ?>
               </li>
               <li class="list-group-item">
                    <strong>Marks Setting [correct|wrong|unattended] :</strong>
                    <?php echo '+' . $testObject->cMark . ' | -' . $testObject->wMark . ' | -' . $testObject->uMark; ?>
               </li>
               <li class="list-group-item">
                    <strong>'Not sure' option :</strong>
                    <?php echo $testObject->notSure; ?>
               </li>
               <li class="list-group-item">
                    <strong>Randomization [questions|options] :</strong>
                    <?php echo $testObject->questionRandomize . ' | ' . $testObject->optionRandomize; ?>
               </li>
          </ul>
     </div>
</div>

<div class="container mb-2 card">
     <div class="row">
          <div class="col-5">
               <!-- QUERYING ALL QUESTIONS -->
               <?php require './templates/questionsForTestCreate.php'; ?>
          </div>
          <div class="col">
               <!-- FORM FOR ADDING QUESTIONS -->
               <?php require './templates/forms/addQuestionMini.php'; ?>
          </div>
     </div>
</div>

<?php
require './templates/footer.php';
