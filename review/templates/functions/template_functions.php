<?php
require "format_comment_text.php";
// Output comments to HTML
function the_comments() {
  global $comments;

  // TODO
  /**
   * 1. Output HTML (see sampleoutput.html) for markup
   * 2. Remember to iterate through each row in the comments array
   */

  echo "<div class='comments'><h2>Comments</h2>";

  foreach($comments as $row) {
    ?>
    <div class="comment">

      <div class="ID">
        Post ID: <?php echo $row['ID'] ?>
      </div>

      <div class="date">
        Posted on: <?php echo $row['date'] ?>
      </div>

      <h3>New comment by: <?php echo $row['email'] ?></h3>

      <div class="mood">
        Current mood: <?php echo $row['mood'] ?>
      </div>

      <div class="comment-text">
        <p>
        <?php echo formatCommentText($row['commentText']) ?>
        </p>
      </div>

    </div>
    <?php
  }
if (isset($_GET['filter'])) {
  
  echo "<a rel='noopener' href='index.php'> Show All Comments</a>";
}


  echo "</div>";
}

// Output unique email addresses to HTML
function the_commenters() {

  global $commenters;

  //TODO
  echo "<div class='commenters'><h2>People Who have Commented:</h2>";
  echo "<ul>";

    foreach($commenters as $row) {
      ?>

        <li>
          <a rel="noopener" href="index.php?filter=<?php echo $row['email'] ?>"> <?php echo $row['email'] ?></a>
        </li>

      <?php

  }

  echo "</ul>";
  echo "</div>";
}
?>