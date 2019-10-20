<?php session_start(); ?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php'); ?>


<!doctype html>
<html lang="en">
  <head>

    <link rel="stylesheet" href="../asserts/css/ans.css">

    <title>15APC2406-Questions</title>

  </head>

  <body>

  	<div>

  		<div>

    		<div >
      				<h1 align="center"> <p > Let's Start </p> </h1>
              <h3 align="center"> <p > Choose the most appropriate answere. </p> </h3>
  			</div>

  		</div>

      <div class="card" align="center">
          
          <h5 ><?php echo $_SESSION['user_id']; ?>  Logged</h5>
          
      </div><br>

      <div class="mid" align="center">
        <form >
          <?php
            $query = "SELECT * FROM q_and_a ORDER BY RAND() LIMIT 5";
            $result_set = mysqli_query($connection,$query);
            verify_query($result_set);
            $questions_num = 1;


            while ($came_questions = mysqli_fetch_assoc($result_set)) {
            
              echo "<div class=\"que\" align = \"left\">
          
                    <h6 >"."0". $questions_num. ")&nbsp;&nbsp;&nbsp;" . $came_questions['question'] . "</h6>";

              $came_id = $came_questions['question_id'];

              $queries = "SELECT * FROM answer WHERE q_id = '$came_id' ORDER BY RAND() LIMIT 4";
              $result = mysqli_query($connection,$queries);
              verify_query($result);

              while ($answer = mysqli_fetch_assoc($result)) {
                 echo " <h6 > <input type=\"radio\" value=\"" . $answer['answers'] . "\" name = \"" .$came_questions['question'] . "\"> &nbsp;&nbsp;&nbsp;". $answer['answers'] . "</h6>";
              }

                echo "</div>"; 

            $questions_num +=1;
              
            }
            
          ?>
          
        </form>
      </div>
  </body>

</html>