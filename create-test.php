<?php
$pageTitle = "Create Test";

require './templates/head.php';
include './classes/testview.class.php';

if (isset($_GET['i'])) {
     $testObject = new TestView($_GET['i']);
} else header('Location: ./add-test.php');
?>

<div class="card p-3">
     <h3><?php echo $testObject->title; ?></h3>
     <p><?php echo $testObject->description; ?></p>
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

<?php
require './templates/footer.php';
