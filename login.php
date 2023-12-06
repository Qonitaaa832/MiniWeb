<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <title>Form</title>
  </head>
  <body>
    <section class="_form_05">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_form-05-box">
              <div class="row">
                <div class="col-sm-5 _lk_nb">
                  <div class="form-05-box-a">
                    <div class="_form_05_logo">
                      <h2>WELCOME TO MY WEBSITE</h2>
                    </div>
                   
                  </div>
                </div>

          
                <form class="col-sm-7 _nb-pl" method="POST" action="auth_controller.php">
                  <div class="_mn_df">
                    <div class="main-head">
                      <h2>Login to your account</h2>
                    </div>

                    <div class="form-group">
                      <input type="text" name="usename" class="form-control" type="text" placeholder="Enter Username" required="" aria-required="true">
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control" type="text" placeholder="Enter Password" required="" aria-required="true">
                    </div>

                    <div class="checkbox form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                          Remember me
                        </label>
                      </div>
                      <a href="#">Forgot Password</a>
                    </div>

                    <div class="form-group">
                        <button class="btn _btn_04 btn-lg btn-block" name="proses" value="login" type="submit">Login</button>
                      
                    </div>
                  </div>
                </form>
             

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>