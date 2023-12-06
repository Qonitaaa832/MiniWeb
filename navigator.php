<nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        
                        <span>NF Computer</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav  ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?hal=header">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="index.php?hal=peserta_msib5">Peserta MSIB 5</a>
                            </li>
    
                            <?php
                            $model = new Mentor();
                            $rs = $model -> index();
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Grup Mentor
                                </a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <?php
                                    foreach($rs as $mentor){
                                    ?>
                                    
                                    <li><a class="dropdown-item" href="index.php?hal=peserta_msib5&id=<?= $mentor['id'] ?>"><?= $mentor['nama'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <?php
                if($_SESSION['MEMBER']['role'] == 'admin'){
                ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Form Input
                                </a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="index.php?hal=instansi_list">INPUT UNIVERSITAS</a></li>

                                    <li><a class="dropdown-item" href="index.php?hal=mentor_list">INPUT MENTOR</a></li>
                                </ul>
                            </li>
                <?php } ?>
                        </ul>

                        <?php
                        if(!isset($_SESSION['MEMBER'])){ //----belum login------
                        ?>
                        <div class="d-none d-lg-block">
                            <a href="login.php" class="navbar-icon bi-person smoothscroll"></a>
                        </div>

                        <?php
                        }
                            else{ //---------user sudah login dan terotentikasi---------------
                        ?>

                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i><?= ' ( '.$_SESSION['MEMBER']['role'].' ) '; ?>
                        </a>
                        <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?hal=profile">Profile</a></li>
                <?php
                if($_SESSION['MEMBER']['role'] == 'admin'){
                ?>
                    <li><a class="dropdown-item disabled" href="#" >Kelola User</a></li>
                <?php } ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a></li>
                     </ul>
                     </li>

                        <?php } ?>

                    </div>
                </div>
            </nav>