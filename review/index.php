<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// array of posts, fetched from database
$posts = [];
// array of unique commenter email addresses
$commenters = [];

 require_once 'database/database.php';
 require_once 'templates/functions/template_functions.php';

// Validate form submission
validate();
//connect to database: PHP Data object representing Database connection
$pdo = db_connect();
// submit comment to database
submit_post();
// Filter only posts from chosen commenter email
apply_filter();
// Get posts from database
get_posts();
// Get commenters from database
get_commenters();

// include the template to display the page
include 'templates/index.php';

 ?>