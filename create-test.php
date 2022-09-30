<?php
$pageTitle = "Create Test";

require './templates/head.php';
include './classes/testview.class.php';

if (isset($_POST['i'])) {
     $questionView = new TestView(isset($_POST['i']));
}

?>

<?php
require './templates/footer.php';
