<?php
require './classes/dbh.class.php';

class QuestionView extends Dbh
{
  private $questions;
  private $questionViewQuery = "SELECT
    q.class,
    sub.subject_name as subjectName,
    q.chapter,
    t.topic_name AS topic,
    st.topic_name AS sub_topic,
    q.q_image AS image,
    q.q_text AS question,
    q.q_answer AS answer,
    q.ref_image,
    q.ref_text AS ref,
    q.ref_link,
    op.option_a_img AS a_img,
    op.option_a AS a,
    op.option_b_img AS b_img,
    op.option_b AS b,
    op.option_c_img AS c_img,
    op.option_c AS c,
    op.option_d_img AS d_img,
    op.option_d AS d,
    op.option_ns AS ns
  FROM questions as q
  LEFT JOIN subjects AS sub
    ON q.subject= sub.sub_id
  LEFT JOIN topics AS t
    ON q.topic_id = t.id
  LEFT JOIN topics AS st
    ON q.sub_topic_id = st.id
  LEFT JOIN options AS op
    ON q.option_id = op.option_id
  ORDER BY q_id DESC;";


  public function showQuestions()
  {
    $query = mysqli_query($this->connect(), $this->questionViewQuery);
    $id = 1;
    $sub = '<span class="badge badge-warning>none</span>';

    while ($this->questions =  mysqli_fetch_assoc($query)) {
      $a = '';
      $b = '';
      $c = '';
      $d = '';
      $ns = '';

      if ($this->questions['sub_topic'] != null || !empty($this->questions['sub_topic'])) {
        $sub = $this->questions['sub_topic'];
      } else {
        $sub = '<span class="badge bg-warning">none</span>';
      }

      if (empty($this->questions['ns']) || $this->questions['ns'] == 'off') {
        $this->questions['ns'] = '<span class="badge rounded-pill bg-danger">off</span>';
      } else {
        $this->questions['ns'] = '<span class="badge rounded-pill bg-success">on</span>';
      }
      

      switch ($this->questions['answer']) {
        case "a":
          $a = 'bg-success text-white';
          break;
        case "b":
          $b = 'bg-success text-white';
          break;
        case "c":
          $c = 'bg-success text-white';
          break;
        case "d":
          $d = 'bg-success text-white';
          break;
        default:
          $ns = 'bg-success text-white';
      }

      echo '<tr>';
      echo "<td>" . $id . "</td>
            <td>" . $this->questions['class'] . "</td>
            <td>" . $this->questions['subjectName'] . "</td>
            <td>" . $this->questions['chapter'] . "</td>
            <td>" . $this->questions['topic'] . "</td>
            <td>" . $sub . "</td>
            <td align='center' class='" . $a . "' width='200px'>" . $this->questions['a'] . "</td>
            <td align='center' class='" . $b . "' width='200px'>" . $this->questions['b'] . "</td>
            <td align='center' class='" . $c . "' width='200px'>" . $this->questions['c'] . "</td>
            <td align='center' class='" . $d . "' width='200px'>" . $this->questions['d'] . "</td>
            <td align='center' class='" . $ns . "'>" . $this->questions['ns'] . "</td>
            <td>" . $this->questions['ref'] . "</td>
            <td> <a href='" . $this->questions['ref_link'] . "' target='_blank'>" . $this->questions['ref_link'] . "</a></td>
            <!--td>" . $this->questions['d'] . "</td-->";
      echo '</tr>';
      $id++;
    }
  }
}
