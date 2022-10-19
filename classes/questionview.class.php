<?php

class QuestionView extends Dbh
{
  private $questionList = array();

  protected $questionViewQuery =
  "SELECT
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
    ON q.option_id = op.option_id";
  protected $orderQuery = "
  ORDER BY q_id DESC;";


  public function showQuestions()
  {
    $query = mysqli_query($this->connect(), $this->questionViewQuery . $this->orderQuery);
    $id = 1;
    $sub = '<span class="badge badge-warning>none</span>';

    while ($question =  mysqli_fetch_assoc($query)) {

      $a = '';
      $b = '';
      $c = '';
      $d = '';
      $ns = '';

      if ($question['sub_topic'] != null || !empty($question['sub_topic'])) {
        $sub = $question['sub_topic'];
      } else {
        $sub = '<span class="badge bg-warning">none</span>';
      }

      if (empty($question['ns']) || $question['ns'] == 'off') {
        $question['ns'] = '<span class="badge rounded-pill bg-danger">off</span>';
      } else {
        $question['ns'] = '<span class="badge rounded-pill bg-success">on</span>';
      }
      

      switch ($question['answer']) {
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
            <td>" . $question['class'] . "</td>
            <td>" . $question['subjectName'] . "</td>
            <td>" . $question['chapter'] . "</td>
            <td>" . $question['topic'] . "</td>
            <td>" . $sub . "</td>
            <td align='center' class='" . $a . "' width='200px'>" . $question['a'] . "</td>
            <td align='center' class='" . $b . "' width='200px'>" . $question['b'] . "</td>
            <td align='center' class='" . $c . "' width='200px'>" . $question['c'] . "</td>
            <td align='center' class='" . $d . "' width='200px'>" . $question['d'] . "</td>
            <td align='center' class='" . $ns . "'>" . $question['ns'] . "</td>
            <td>" . $question['ref'] . "</td>
            <td> <a href='" . $question['ref_link'] . "' target='_blank'>" . $question['ref_link'] . "</a></td>
            <!--td>" . $question['d'] . "</td-->";
      echo '</tr>';
      $id++;
    }
  }

  public function getQuestionsList()
  {
    $query = mysqli_query($this->connect(), $this->questionViewQuery . $this->orderQuery);

    while ($question =  mysqli_fetch_assoc($query)) {
      array_push($this->questionList, $question);
    }
    return $this->questionList;
  }

  public function getQuestion($questionId)
  {
    $whereQuery = " WHERE q.q_id = $questionId ";
    $query = mysqli_query($this->connect(), $this->questionViewQuery  . $whereQuery . $this->orderQuery);
    return mysqli_fetch_assoc($query);
  }
}
