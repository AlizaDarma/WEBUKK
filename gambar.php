<?php
include 'config/koneksi.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cssku.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/gambar.css">
    <title>GAMBAR</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <!-- As a heading -->
                <nav class="nav">
                    <div class="container-fluid">
                        <a href="index.php" class="text-decoration-none"><span class="nav-brand mb-0 h1">Glitz</span></a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-7 ms-5">
                <form class="d-flex-justify-content-start">
                    <input class="search" type="search" aria-label="Search">
                    <button class="button" type="submit"><i class="bi bi-search" style="color:#8f8989"></i></button>
                </form>
            </div>
            <div class="col-lg-2 ms-auto">
                <div class="col-lg-2 d-flex align-items-baseline">
                    
                    <div class="dropdown me-2">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https:/source.unsplash.com/1920x1080/?green mountain" alt="profil"
                                class="profile">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu"
                            aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="profileuser.php">Profil Anda</a></li>
                            <li><a class="dropdown-item" href="album.php">Album Anda</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="image">
            <div class="container">
                <?php 
             //memeriksa apakah parameter FotoID ada dalam URL
                if(isset($_GET['FotoID'])) {
                $FotoID = $_GET['FotoID'];
                }

                //Query
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'");
                while($data = mysqli_fetch_array($sql)){
                //memeriksa apakah data ditemukan
                ?>
                <div class="row">
                    <div class="col-md-6 p-5">
                        <img src="assets/img/<?php echo $data['LokasiFile']?>" class="img" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body ms-4">

                            <div class="d-flex">
                                <div class="d-flex p-1">
                                    
                                    <a href ="profile.php" class="text-decoration-none"><small class="text-profile">Aliza Darma</small></a>
                                </div>  
                                <div class="d-flex mt-1">
                                    <div class="me-3">
                                        <i class="bi bi-heart icon"></i><small> 1k</small>
                                    </div>

                                </div>
                            </div>

                            <h3 class="card-title"><?php echo $data['JudulFoto']?></h3>
                            <p class="card-text"><?php echo $data['DeskripsiFoto']?></p>
                            <p class="card-text"><small class="text-body-secondary"><?php echo $data['TanggalUnggah']?></small>
                            </p>

                            <div class="d-flex align-items-center mt-3">
                                <h4>Komentar</h4>
                                <i class="ms-auto toggle-icon" data-bs-toggle="collapse"
                                    data-bs-target="#comments" aria-expanded="false" aria-controls="comments"></i>
                            </div>
                            
                            <div>
                                <input class="form-control" type="text" value="" aria-label="readonly input example">
                                <div class="input"><i class="bi bi-arrow-up-circle"></i></div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <?php
                }
            ?>
            </div>

        </div> 
    </div>

<div class="komentar">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, cupiditate laudantium, aliquid quis perferendis ipsam rem dolore necessitatibus velit, obcaecati cumque dolorum illum! Natus maxime distinctio iusto laboriosam obcaecati quos esse magnam similique, possimus nulla optio accusamus quo ipsum harum, quibusdam consequatur, tenetur eveniet? Facere maxime nihil natus possimus ipsa pariatur nobis. Id nisi dicta pariatur animi natus nulla quibusdam possimus at, voluptas labore reprehenderit est tempora qui sunt libero eveniet, ipsam assumenda consequuntur excepturi cupiditate, expedita quis deleniti asperiores soluta? Non dolorem dicta laudantium illo quibusdam, praesentium deserunt quos maxime ipsam perferendis tempora, assumenda sit fuga consectetur provident necessitatibus.</p>
    </div>
</div>


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#comments').on('show.bs.collapse', function() {
            $('.toggle-icon').removeClass('bi-caret-down-fill').addClass('bi-caret-up-fill');
        })
        $('#comments').on('hide.bs.collapse', function() {
            $('.toggle-icon').removeClass('bi-caret-up-fill').addClass('bi-caret-down-fill');
        })
    });
    </script>
</body>

</html>