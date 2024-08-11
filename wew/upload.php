<?php
require('conn.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $authors = $_POST['authors'];
    $campus = $_POST['campus'];

    if ($_FILES['file']['error'] === 4) {
        echo "<script> alert('File Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $tmpName = $_FILES['file']["tmp_name"];

        $validFileExtension = ["docx", "pdf", "jpg"];
        $fileExtension = explode(".", $fileName);
        $fileExtension = strtolower(end($fileExtension));

        if (!in_array($fileExtension, $validFileExtension)) {
            echo "<script> alert('Invalid File Extension'); </script>";
        } else if ($fileSize > 1000000) {
            echo "<script> alert('File Size is Too Large'); </script>";
        } else {
            $newFileName = uniqid();
            $newFileName .= '.' . $fileExtension;

            move_uploaded_file($tmpName, 'img/' . $newFileName);

            $query = "INSERT INTO upload (name, file, authors, year, campus) VALUES ('$name', '$newFileName', '$authors', '$year', '$campus')";
            mysqli_query($conn, $query);

            echo "<script> 
                    alert('Successfully Added'); 
                    document.location.href = 'database.php';
                  </script>";
        }
    }
}
?>
