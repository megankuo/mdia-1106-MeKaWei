<?php
require 'config.php';

function db_connect()
{

  // try to open database connection
  try {

    $connectionString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;

    // MAKE CONNECTION AND SET UP ERROR STUFF
    $pdo = new PDO($connectionString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

$valid;

function validate()
{
  global $valid;
  global $val_messages;

  // Initialize result
  $result = true;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through POST
    foreach ($_POST as $type => $value) {

      if ($type == 'email') {

        $submitted = $_POST["email"];
        $pattern = '#^(.+)@([^\.].*)\.([a-z]{2,})$#';

        $this_result = preg_match($pattern, $submitted);

        $result = $result && $this_result;

        //Update message
        if ($this_result == true) {
          $val_messages[$type] = "";
        } else {
          $val_messages[$type] = "email is not correct format";
        }
      } else if ($type == "comment") {

        $submitted = $_POST["comment"];

        $condition = strlen($submitted) > 7;

        $this_result = $condition;

        $result = $result && $this_result;

        //Update message
        if ($this_result == true) {
          $val_messages[$type] = "";
        } else {
          $val_messages[$type] = "please enter more than 8 characters";
        }
      }
    } // end of loop through POST
    $result = $result && $this_result;
    $valid = $result;
  } // end of check for form format
  else {
    echo "<strong>Something has gone wrong with the form!</strong>";
  }
}

// Display error message if field not valid. Displays nothing if the field is valid.
function the_validation_message($type)
{

  global $val_messages;

  // Start bu checking if the re
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if the $val_messages[  ] array has a message set for a type
    if ($val_messages[$type] != "") {
      echo "<strong>" . $val_messages[$type] . "</strong>";
    }
  }
}

function submit_post()
{
  global $valid;
  global $pdo;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // GO THROUGH AND BIND EACH VALUE

    if (isset($_POST['email']) && isset($_POST['mood']) && isset($_POST['comment']) && $valid == true) {

      //PREPARED statement
      $sql = 'INSERT INTO comments (email, mood, date, commentText) VALUES (:email, :mood, :date, :commentText)';

      $statement = $pdo->prepare($sql);

      $statement->bindValue(':email', $_POST['email']);
      $statement->bindValue(':mood', $_POST['mood']);
      $statement->bindValue(':date', date('Y-m-d'));
      $statement->bindValue(':commentText', $_POST['comment']);
      $statement->execute();
    }
  }
}// end submit post

function get_posts()
{

  global $pdo;
  global $posts;
  global $filter;
  // ACTUALLY GET THE COMMENTS

  // CREATE THE QUERY STRING
  $sql = "SELECT * FROM comments " . $filter . " ORDER BY ID DESC";
  //  $sql = "SELECT * FROM comments ORDER BY ID";

  $result = $pdo->query($sql);

  while ($row = $result->fetch()) {
    //displayPost($row);
    $posts[] = $row;
  }
} // End get posts

function get_commenters()
{
  global $pdo;
  global $commenters;

  // GET UNIQUE commenters
  // CREATE THE QUERY STRING
  $sql = "SELECT DISTINCT email FROM comments";

  $result = $pdo->query($sql);

  // LOOP FOR DISPLAYING COMMENTERS
  //echo "<div class='commenters'><h2>People Who have Commented:</h2><ul>";

  while ($row = $result->fetch()) {
    //displayCommenter($row);
    $commenters[] = $row;
  }
}

function apply_filter()
{

  global $filter;

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['filter'])) {
      $filter = "WHERE email='" . $_GET['filter'] . "' ";
    }
  }
}