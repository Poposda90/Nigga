<?php
    require('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dbstyle.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="topnav">
        <section style="background-color: maroon; height: 100%; display: flex; align-items: center;">
            <div class="images" style="display: flex; justify-content: center; align-items: center;">
                <img src="Polytechnic_University_of_the_Philippines_Parañaque_Logo.svg (1).png" alt="" style="height: 10vh;">
                <img src="saliksik.png" alt="" style="height: 5vh;">
            </div>
            <div class="search" style="display: flex; justify-content: center; width: 75vw; height: 6vh; border-radius: 20px; border-style: none; ">
                <input type="text" style="width: 60vw;" placeholder="Type Here...">
                <button type="submit" style="background-color: yellow; border-style: none; border-radius: 0px 10px 10px 0px; width: 5vw;"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </section>
    </div>
    <div class="content" style="display: flex; flex-direction: row;">
        <div class="sidenav">
            <h2>Refine Results</h2>
            <div class="filter-container" id="programs">
                <label for="fromYear"><strong>Program</strong></label>
                <a href="#" class="buts">Computer Engineering</a> <br>
                <a href="#" class="buts">Office Administration</a> <br>
                <a href="#" class="buts">Information Technology</a> <br>
                <a href="#" class="buts">Hospitality Management</a> <br>
            </div>
            <div class="filter-container">
                <label for="fromYear"><strong>From Year</strong></label>
                <input type="number" id="fromYear" placeholder="e.g., 2000">
                
                <label for="toYear"><strong>To Year</strong></label>
                <input type="number" id="toYear" placeholder="e.g., 2020">
                
                <button onclick="setFilter()">Set</button>
            </div>
            <div class="results" id="results"></div>
        </div>
        <div class="main" style="display: flex;  flex-direction: column;">
            <section style="background-color: #E1E1E1; width: 100%; height: 100%;">
                <div class="wew" style="display: flex; flex-direction: row; align-items: center justify-content: center">
                    <p style="width: 100%;">Showing <strong>1 - 10 </strong>results of <strong>34</strong> for search <strong>'arduino'</strong>, query time: 0.02s</p>
                    <p><strong>Sort </strong></p>
                    <select name="campus" id="campus" class="inputt">
                        <option value="Paranaque">Paranaque</option>
                        <option value="Taguig">Taguig</option>
                        <option value="Main">Main</option>
                        <option value="Bulacan">Bulacan</option>
                    </select> <br>
                </div>
                <div class="functions">
                    <input type="checkbox">
                    <p>Select Page</p>
                    <button> <i class="fa-solid fa-envelope"></i>Email</button>
                    <button> <i class="fa-solid fa-print"></i>Print</button>
                    <button> <i class="fa-solid fa-download"></i>Download</button>
                </div>
                <div class="results" onclick="showElement()">
                <?php
                $i = 1;
                $rows = mysqli_query($conn, "SELECT * FROM upload ORDER BY id DESC")
                ?>

                <?php foreach ($rows as $row) : ?>
                    <div class="card">
                                    <input type="checkbox" class="checkbox">
                                    <div class="details">
                                        <p style="font-size: 20px"><u><strong><?php echo $row["name"]?></strong></u></p>
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
            </section>
        </div>
        <div class="nig" id="nigga">
            <section class="niggers"><img src="prev.jpg" alt="" style="width: 30vw;"></section>
        </div>
        <button class="floating-button" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i>
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload a New Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="niggas" action="upload.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <label for="name" class="labels">Name: </label>
                    <input type="text" name="name" value="" required id="name" class="inputs"> <br>

                    <label for="authors" class="labels">Authors: </label>
                    <input type="text" name="authors" value="" required id="authors" class="inputs"> <br>

                    <label for="year" class="labels">Year Published: </label>
                    <input type="text" name="year" value="" required id="year" class="inputs"> <br>

                    <label for="program" class="labels">Program: </label>
                    <input type="text" name="program" value="" required id="program" class="inputs"> <br>

                    <label for="campus" class="labels">Campus: </label>
                    <select name="campus" id="campus" class="inputs">
                        <option value="Paranaque">Paranaque</option>
                        <option value="Taguig">Taguig</option>
                        <option value="Main">Main</option>
                        <option value="Bulacan">Bulacan</option>
                    </select> <br>

                    <label for="file" class="labels">File: </label>
                    <input type="file" name="file" value="" id="file" accept=".docx, .pdf, .jpg" class="inputs"> <br> <br>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn" style="background-color: maroon; color: white;">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/5289ffb745.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
