<?php
require "format_comment_text.php";

function the_comments() {

  global $posts;

  echo "<div class='comments'><h2>Comments</h2>";

  foreach($posts as $row) {
    ?>

      <div class="comment">

        <div class="ID">
          Post ID: <?php echo $row['ID']; ?>
        </div>

        <div class="date">
            Posted on: <?php echo $row['date']; ?>
        </div>

        <h3>New comment by: <?php echo $row['email']; ?></h3>

        <div class="mood">
          Current mood: <?php echo $row['mood']; ?>
        </div>

        <div class="comment-text">
          <?php echo formatCommentText($row['commentText']); ?>
        </div>

      </div>

    <?php
  }

  echo "</div>";
}

function the_commenters() {
  global $filter;
  global $commenters;
  echo "<div class='commenters'><h2>People Who have Commented:</h2><ul>";


  foreach($commenters as $row)
  {

    echo "<li><a href='index.php?filter=" . $row["email"]  . "'>" . $row["email"] . "</a></li>";

  }

  echo "</ul>";

  //DISPLAY BUTTON TO REFRESH ALL POSTS IF FILTER HAS BEEN APPLIED
  if ($filter != ""){

    echo "<a href='index.php'>Show All Posts</a>";

  }

  echo "</div>";
}

 ?>
