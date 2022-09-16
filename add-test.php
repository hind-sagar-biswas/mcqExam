<?php
$pageTitle = "Add Test";

require './templates/head.php';
?>

<div class="container-fluid">
  <center>
    <?php
    //Loads form template for add question from .\templates\forms\addQuestion.php
    require './templates/forms/addTest.php';
    ?>
  </center>
</div>
<br>
<?php
require './templates/footer.php';
