<?php
$pageTitle = "Homepage";
require './templates/head.php';
include './classes/questionview.class.php';
$questionView = new QuestionView();
?>
<div class="container-fluid p-5">
  <ul type="square">
    <li class="pb-1"><a class="btn btn-dark" href="add-question.php" target="_blank">Add Questions</a></li>
    <li class="pb-1"><a class="btn btn-dark" href="all-questions.php" target="_blank">All Questions</a></li>
    <li class="pb-1"><a class="btn btn-dark" href="add-test.php" target="_blank">Add Test</a></li>
  </ul>
</div>
<br>
<?php
require './templates/footer.php';
