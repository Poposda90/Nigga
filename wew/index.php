<?php
require('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Name: </label>
        <input type="text" name="name" value="" required id="name"> <br>

        <label for="file">File: </label>
        <input type="file" name="file" value="" id="file" accept=".docx, .pdf"> <br> <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
    <a href="data.php">Data</a>
</body>
</html>
