<?php
$pageTitle = "Add Question";

require './templates/head.php';
?>

<div class="container-fluid">
  <center>
    <?php
    //Loads form template for add question from .\templates\forms\addQuestion.php
    require './templates/forms/addQuestion.php';
    ?>
  </center>
</div>
<br>
<?php
require './templates/footer.php';
