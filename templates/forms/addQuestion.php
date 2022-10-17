<br>
<h2><?php echo $pageTitle; ?></h2>
<form id="q-form" method="POST" action="includes/addquestions.inc.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <div>
        <label class="form-label" for="class">Class <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="class" placeholder="" required>
      </div>

      <div>
        <label class="form-label" for="subject">Subject <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="subject" placeholder="" required>
      </div>

      <div>
        <label class="form-label" for="subject">Chapter <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="chapter" placeholder="" required>
      </div>

      <div>
        <label class="form-label" for="topic">Topic <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="topic" placeholder="" required>
      </div>

      <div>
        <label class="form-label" for="sub-topic">Sub Topic</label>
        <input class="form-control" type="text" name="sub-topic" placeholder="">
      </div>

      <hr>

      <div>
        <label class="form-label" for="q-image">Question Image</label>
        <input class="form-control" type="file" name="q-image" placeholder="">
      </div>

      <div>
        <label class="form-label" for="question">Question <span class="text-danger">*</span></label>
        <textarea class="form-control" rows="6" name="question" placeholder="" required></textarea>
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

      <div class="input-group">
        <div class="form-check mb-3 mx-1">
          <p>Add 'Not Sure' option?</p>
        </div>
        <div class="form-check mb-3 mx-1">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="not-sure" value="off" checked> No</label>
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="not-sure" value="on"> Yes</label>
        </div>
      </div>

      <hr>

      <div>
        <label class="form-label" for="answer">Answer:</label>
        <select class="form-select" name="answer" placeholder="Correct Answer">
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
          <option value="d">D</option>
        </select>
      </div>

      <br>

      <div>
        <label class="form-label" for="ref">Reference:</label>
        <input class="form-control" type="text" name="ref" placeholder="">
      </div>
      <div>
        <label class="form-label" for="ref-image">Reference Image:</label>
        <input class="form-control" type="file" name="ref-image" placeholder="">
      </div>
      <div>
        <label class="form-label" for="ref-link">Reference Link</label>
        <input class="form-control" type="url" name="ref-link" placeholder="">
      </div>

    </div>
    <hr>
    <div align="right">
      <button type="submit" class="btn btn-primary" name="add_question">SUBMIT</button>
      <button type="reset" class="btn btn-danger">RESET</button>
    </div>
</form>