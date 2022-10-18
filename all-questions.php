<?php
$pageTitle = "All Questions";

require './classes/dbh.class.php';
include './classes/questionview.class.php';
require './templates/head.php';

$questionView = new QuestionView();
?>
<div class="container-fluid">
  <center>
    <br>
    <h2>Question List <a class="btn btn-primary" href="add-question.php">+</a> </h2>
    <div class="table-responsive-sm">
      <table class="table table-bordered table-sm">
        <?php
        $questionView->showQuestions();
        ?>
      </table>
    </div>
  </center>
</div>
<br>
<?php
require './templates/footer.php';
