<br>
<h2><?php echo $pageTitle; ?></h2>
<form id="q-form" method="POST" action="includes/add.inc.php" enctype="multipart/form-data">
  <div>
    <label class="form-label" for="title">Title <span class="text-danger">*</span> </label>
    <input class="form-control" type="text" name="title" id="title" placeholder="Test Title" required>
  </div>

  <div>
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Write a short test description...."></textarea>
  </div>
  <div class="row">
    <div class="col">
      <div>
        <label class="form-label" for="class">Class</label>
        <input class="form-control" type="text" name="class" id="class" placeholder="Targeted class">
      </div>
    </div>
    <div class="col">
      <div>
        <label class="form-label" for="subject">Subject</label>
        <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject of the test">
      </div>
    </div>
    <div class="col">
      <div>
        <label class="form-label" for="topic">Topic</label>
        <input class="form-control" type="text" name="topic" id="topic" placeholder="Topic of the test">
      </div>
    </div>
  </div>
  <div class="pt-1">
    <label class="form-label" for="Marks">Marks</label>
    <div class="">
      <div class="input-group mb-1 mr-sm-1">

        <button class="btn btn-dark" type="button" disabled>Correct:</button>
        <input class="form-control" type="number" name="correct-mark" id="correct-mark" value="1">

        <button class="btn btn-dark" type="button" disabled>Unattended:</button>
        <input class="form-control" type="number" name="nattended-mark" id="unattended-mark" value="0">

        <button class="btn btn-dark" type="button" disabled>Wrong:</button>
        <input class="form-control" type="number" name="wrong-mark" id="wrong-mark" value="0">

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="form-check mb-3">
        <label for="not-sure" class="form-check-label">
          <input type="checkbox" name="not-sure" id="not-sure" class="form-check-input"> Enable 'Not Sure' option?</label>
      </div>
    </div>
    <div class="col">
      <div class="form-check mb-3">
        <label for="question-randomize" class="form-check-label">
          <input type="checkbox" name="question-randomize" id="question-randomize" class="form-check-input"> Enable question randomization?</label>
      </div>
    </div>
    <div class="col">
      <div class="form-check mb-3">
        <label for="option-randomize" class="form-check-label">
          <input type="checkbox" name="option-randomize" id="option-randomize" class="form-check-input"> Enable option randomization?</label>
      </div>
    </div>
  </div>

  <hr>
  <div align="right">
    <button type="submit" class="btn btn-primary" name="add_test">CREATE</button>
    <button type="reset" class="btn btn-danger">RESET</button>
  </div>

</form>