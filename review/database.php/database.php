<?php
require 'config.php';

// Should return a PDO
function db_connect() {

  try {
    // TODO
    // try to open database connection using constants set in config.php
    // return $pdo;
    $connString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;

    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
}

// Handle form submission
function handle_form_submission() {
  global $pdo;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // TODO
    if(isset($_POST['email']) && isset($_POST['mood']) && isset($_POST['comment'])) {
      
      $sql = "INSERT INTO comments (email, mood, date, commentText) VALUES (:email, :mood, :date, :commentText)";

      $statement = $pdo->prepare($sql);

      $statement->bindValue(":email", $_POST["email"]);
      $statement->bindValue(":mood", $_POST["mood"]);
      $statement->bindValue(":commentText", $_POST["comment"]);
      $statement->bindValue(":date", date('Y-m-d'));
      $statement->execute();

    }
  }
}

// Get all comments from database and store in $comments
function get_comments() {
  global $pdo;
  global $comments;

  //TODO
  if (isset($_GET['filter'])) {
    $sql = "SELECT * FROM comments WHERE email='" . $_GET['filter'] . "' ORDER BY ID DESC";
  } else {
    $sql = "SELECT * FROM comments ORDER BY ID DESC"; // getting comments out of db
  }

  $result = $pdo->query($sql);
  while($row = $result->fetch()) {
    $comments[] = $row; // add new comment object to array
  }
}

// Get unique email addresses and store in $commenters
function get_commenters() {
  global $pdo;
  global $commenters;

  //TODO
  $sql = "SELECT DISTINCT email FROM comments"; // getting comments out of db

  $result = $pdo->query($sql);
  while($row = $result->fetch()) {
    $commenters[] = $row; // add unique email object to array
  }
}
