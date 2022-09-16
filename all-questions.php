<?php
$pageTitle = "All Questions";

require './templates/head.php';
include './classes/questionview.class.php';
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
