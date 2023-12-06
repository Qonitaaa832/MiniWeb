<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                        <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>

                            <h2 class="text-white" align="center">Profile</h2>
                        </div>

                    </div>
                </div>
</header>



<section style="background-color: #eee;">
  <div class="container py-5">
    

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            
            <h5 class="my-3"><?= $_SESSION['MEMBER']['fullname'] ?></h5>
            
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['MEMBER']['fullname'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['MEMBER']['usename'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Role</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['MEMBER']['role'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['MEMBER']['email'] ?></p>
              </div>
            </div>
            
            
            
          </div>
        </div>
       
      </div>
    </div>
  </div>
</section>