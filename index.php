<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mini Proyek AFWD</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">             
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/templatemo-topic-listing.css" rel="stylesheet"> 
        <link href="css/styleku.css" rel="stylesheet">
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">  -->
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">  
          
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
    </head>
    
    <body>

        <main>

        <?php
        include_once 'koneksi.php';
        include_once 'model/Peserta.php';
        include_once 'model/Agama.php';
        include_once 'model/Mentor.php';
        include_once 'model/Instansi.php';
        include_once 'model/Member.php';
        include_once 'navigator.php';
        //tangkap req d url
        $hal = $_REQUEST['hal'];
        //tempatkan halaman sesuai request di URL 
        if(!empty($hal)){
             include_once $hal.'.php';
        }
        else{
             include_once 'header.php';
        }
        ?>   
            
        </main>

        <!-- FOOTER -->
        <?php include_once 'footer.php'; ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/javascript.js"></script>


        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <script>new DataTable('#example');</script>

    </body>
</html>
