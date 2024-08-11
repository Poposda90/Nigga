<?php
require 'conn.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
    <link rel="stylesheet" href="dbstyle.css">
  </head>
  <body>
  <div class="results">
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM upload ORDER BY id DESC")
      ?>

      <?php foreach ($rows as $row) : ?>
        <div class="card">
                        <input type="checkbox" class="checkbox">
                        <div class="details">
                            <p><strong><?php echo $row["name"]?></strong></p>
                            <p>by: <strong><?php echo $row["authors"] ?></strong></p>
                            <p>Published <strong><?php echo $row["year"]?></strong></p>
                        </div>
                        <div class="preview">
                            <img src="1611746028.webp" alt="Preview Image">
                        </div>
                    </div>
      <?php endforeach; ?>
    </table>
    </div>
    <br>
    <a href="index.php">Upload Image File</a>
  </body>
</html>