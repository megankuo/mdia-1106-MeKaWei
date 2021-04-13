<?php
require 'config.php';

function db_connect() {

  // try to open database connection
  try {

    $connectionString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;

    // MAKE CONNECTION AND SET UP ERROR STUFF
    $pdo = new PDO($connectionString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;

  }
  catch (PDOException $e)
  {
    die($e->getMessage());

  }
}

function submit_post() {

  global $pdo;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {

    // GO THROUGH AND BIND EACH VALUE

    if (isset( $_POST['email']) && isset($_POST['mood']) && isset($_POST['comment']))
    {

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

function get_posts() {

  global $pdo;
  global $posts;
  global $filter;
  // ACTUALLY GET THE COMMENTS

  // CREATE THE QUERY STRING
  $sql = "SELECT * FROM comments " . $filter . " ORDER BY ID DESC";
//  $sql = "SELECT * FROM comments ORDER BY ID";

  $result = $pdo->query($sql);

  while($row = $result->fetch())
  {
    //displayPost($row);
    $posts[] = $row;
  }

}// End get posts

function get_commenters() {
  global $pdo;
  global $commenters;

  // GET UNIQUE commenters
  // CREATE THE QUERY STRING
  $sql = "SELECT DISTINCT email FROM comments";

  $result = $pdo->query($sql);

  // LOOP FOR DISPLAYING COMMENTERS
  //echo "<div class='commenters'><h2>People Who have Commented:</h2><ul>";

  while($row = $result->fetch())
  {
    //displayCommenter($row);
    $commenters[] = $row;
  }


}

function apply_filter() {

  global $filter;

  if($_SERVER["REQUEST_METHOD"] == "GET")
  {
    if(isset($_GET['filter']))
    {
        $filter = "WHERE email='" . $_GET['filter'] . "' ";
    }

  }
}
