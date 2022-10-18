<?php
$questionList = $testObject->getAssociatedQuestions();
$questionNumber = 0;
?>

<br>
<h3>Test Questions</h3>

<?php
    if (!empty($questionList)) {
        foreach ($questionList as $question) {
            $questionNumber += 1;
    ?>
        <div class="mb-1">
            <div>
                <p>
                    <strong><?php echo $questionNumber; ?></strong>
                    <em><?php echo $question['question']; ?></em>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-secondary">
                    <tbody>
                        <tr class="">
                            <td>a. <?php echo $question['a']; ?></td>
                            <td>b. <?php echo $question['b']; ?></td>
                        </tr>
                        <tr class="">
                            <td>c. <?php echo $question['c']; ?></td>
                            <td>d. <?php echo $question['d']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <p><strong>Correct Answer:</strong> <?php echo $question['answer'] . '.' . $question[$question['answer']]; ?></p>
            </div>
            <hr>
        </div>
<?php  }
    } else { ?>
    <h4 class="text-warning">No questions added yet!</h4>
<?php } ?>