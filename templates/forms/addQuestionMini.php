 <br>
 <div class="row">
     <div class="col-md">
         <h3>Add Questions</h3>
     </div>
     <div class="col-md">
         <form id="test-xl-form" method="POST" action="includes/addquestions.inc.php" enctype="multipart/form-data">
             <div class="input-group mb-1 mr-sm-1">

                 <button class="btn btn-light" type="button" disabled>Upload XL: </button>
                 <input class="form-control" type="file" name="xl-sheet" placeholder="" reqired>

                 <input type="hidden" name="test-id" placeholder="" value="<?php echo $_GET['i']; ?>" required>
                 <input type="hidden" name="class" placeholder="" value="<?php echo $testObject->testClass; ?>" required>
                 <input type="hidden" name="not-sure" id="not-sure" class="form-check-input" value="<?php echo $testObject->notSure; ?>">
                 <input class="form-control" type="hidden" name="subject" placeholder="" value="<?php echo $testObject->subjectName; ?>" >

                 <button type="submit" class="btn btn-primary" name="add_question_from_xl">SUBMIT</button>

             </div>
         </form>
     </div>
 </div>

 <form id="q-form" method="POST" action="includes/addquestions.inc.php" enctype="multipart/form-data">
     <input type="hidden" name="class" placeholder="" value="<?php echo $testObject->testClass; ?>" required>
     <input type="hidden" name="test-id" placeholder="" value="<?php echo $_GET['i']; ?>" required>
     <input type="hidden" name="not-sure" id="not-sure" class="form-check-input" value="<?php echo $testObject->notSure; ?>">
     <div class="row">
         <div class="col">
             <div class="row">
                 <div class="col">
                     <label class="form-label" for="subject">Subject <span class="text-danger">*</span></label>
                     <input class="form-control" type="text" name="subject" placeholder="" value="<?php echo $testObject->subjectName; ?>" required>
                 </div>
                 <div class="col">
                     <label class="form-label" for="subject">Chapter <span class="text-danger">*</span></label>
                     <input class="form-control" type="text" name="chapter" placeholder="" required>
                 </div>
             </div>
             <div class="row">
                 <div class="col">
                     <label class="form-label" for="topic">Topic <span class="text-danger">*</span></label>
                     <input class="form-control" type="text" name="topic" placeholder="" value="<?php echo $testObject->topic; ?>" required>
                 </div>
                 <div class="col">
                     <label class="form-label" for="sub-topic">Sub Topic</label>
                     <input class="form-control" type="text" name="sub-topic" placeholder="">
                 </div>
             </div>

             <div>
                 <label class="form-label" for="q-image">Question Image</label>
                 <input class="form-control" type="file" name="q-image" placeholder="">
             </div>

             <div>
                 <label class="form-label" for="question">Question <span class="text-danger">*</span></label>
                 <textarea class="form-control" rows="6" name="question" placeholder="" required></textarea>
             </div>

             <hr>

             <div align="right">
                 <button type="submit" class="btn btn-primary" name="add_question_from_test">SUBMIT</button>
                 <button type="reset" class="btn btn-danger">RESET</button>
             </div>
         </div>
         <div class="col">

             <div class="row">
                 <div class="col">
                     <div>
                         <label class="form-label" for="option-a">A:</label>
                         <input class="form-control" type="text" name="option-a" placeholder="">
                     </div>
                     <div>
                         <label class="form-label" for="a-image">A Image:</label>
                         <input class="form-control" type="file" name="a-image" placeholder="">
                     </div>


                     <div>
                         <label class="form-label" for="option-b">B:</label>
                         <input class="form-control" type="text" name="option-b" placeholder="">
                     </div>
                     <div>
                         <label class="form-label" for="b-image">B Image:</label>
                         <input class="form-control" type="file" name="b-image" placeholder="">
                     </div>

                 </div>
                 <div class="col">

                     <div>
                         <label class="form-label" for="option-c">C:</label>
                         <input class="form-control" type="text" name="option-c" placeholder="">
                     </div>
                     <div>
                         <label class="form-label" for="c-image">C Image:</label>
                         <input class="form-control" type="file" name="c-image" placeholder="">
                     </div>


                     <div>
                         <label class="form-label" for="option-d">D:</label>
                         <input class="form-control" type="text" name="option-d" placeholder="">
                     </div>
                     <div>
                         <label class="form-label" for="d-image">D Image:</label>
                         <input class="form-control" type="file" name="d-image" placeholder="">
                     </div>

                 </div>
             </div>

             <hr>

             <div class="row">
                 <label class="form-label" for="answer">Answer:</label>
                 <select class="form-select" name="answer" placeholder="Correct Answer">
                     <option value="a">A</option>
                     <option value="b">B</option>
                     <option value="c">C</option>
                     <option value="d">D</option>
                 </select>
             </div>

             <br>

             <div class="row">
                 <div class="col">
                     <label class="form-label" for="ref">Reference:</label>
                     <input class="form-control" type="text" name="ref" placeholder="">
                 </div>
                 <div class="col">
                     <label class="form-label" for="ref-image">Reference Image:</label>
                     <input class="form-control" type="file" name="ref-image" placeholder="">
                 </div>
                 <div class="col">
                     <label class="form-label" for="ref-link">Reference Link</label>
                     <input class="form-control" type="url" name="ref-link" placeholder="">
                 </div>
             </div>
         </div>
     </div>
 </form>