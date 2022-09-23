<?php include "header.php"; ?>

<style>
  #jak_pstrength {
    transition: all 1s ease-in-out;
  }
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><?php echo JAK_TITLE; ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link">Front End</a>
        </li>
        <li class="nav-item active">
          <a href="<?php echo BASE_URL; ?>" class="nav-link">Operator Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page ">

  <div class="full-page login-page section-image" filter-color="green" style="background: url('img/login.jpg') no-repeat center center fixed;background-size: cover;height: 100%;overflow: hidden;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
           
            <div class="loginF">
              <form class="form" id="login_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <div class="card-header text-center">
                  <h3><?php echo $jkl['l3']; ?></h3>
                </div>
                <div class="card-body">
                  <?php if (isset($ErrLogin)) { ?>
                    <div class="alert alert-danger">
                      <?php echo $jkl["l"]; ?>
                    </div>
                  <?php } ?>
                  <div class="input-group no-border form-control-lg">
                    <span class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-user"></i>
                      </div>
                    </span>
                    <input type="text" class="form-control<?php if (isset($ErrLogin)) echo " is-invalid"; ?>" name="username" id="username" placeholder="<?php echo $jkl["l5"]; ?>">
                  </div>
                  <div class="input-group no-border form-control-lg">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-key"></i>
                      </div>
                    </div>
                    <input type="password" name="password" class="form-control<?php if (isset($ErrLogin)) echo " is-invalid"; ?>" id="password" placeholder="<?php echo $jkl["l2"]; ?>">
                  </div>
                  <div class="form-check text-left mt-4">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="lcookies">
                      <span class="form-check-sign"></span>
                      <?php echo $jkl["l4"]; ?>
                    </label>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="logID" class="btn btn-primary btn-round btn-lg btn-block mb-3"><?php echo $jkl["l3"]; ?></button>
                  <input type="hidden" name="action" value="login">
                  <div class="pull-right">
                    <h6>
                      <a href="javascript:void(0)" class="link footer-link lost-pwd"><?php echo $jkl["f"]; ?></a>
                    </h6>
                  </div>

                  <div class="pull-right" style="margin-right: 30px;">
                    <h6>
                      <a href="javascript:void(0)" class="link footer-link sign-up"><?php echo $jkl["su"]; ?></a>
                    </h6>
                  </div>
                </div>
              </form>
            </div>
            

            <div class="signupF">
              <?php if ($errors) { ?>
                <div class="alert alert-danger"><?php if (isset($errors["e"])) echo $errors["e"];
                                                if (isset($errors["e1"])) echo $errors["e1"];
                                                if (isset($errors["e2"])) echo $errors["e2"];
                                                if (isset($errors["e3"])) echo $errors["e3"];
                                                if (isset($errors["e4"])) echo $errors["e4"];
                                                if (isset($errors["e5"])) echo $errors["e5"];
                                                if (isset($errors["e6"])) echo $errors["e6"]; ?></div>
              <?php } ?>
              <form class="jak_form" id="signUp_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <div class="card-header text-center">
                  <h3><?php echo $jkl['s0']; ?></h3>
                </div>
                <div class="card-body">
                  <?php if (isset($ErrLogin)) { ?>
                    <div class="alert alert-danger">
                      <?php echo $jkl["l"]; ?>
                    </div>
                  <?php } ?>
                  <div class="form-group" style="display: flex;">
                    <div>
                      <label for="signup_firstname"><?php echo $jkl["uf"]; ?></label>
                      <input type="text" name="jak_signup_firstname" id="signup_firstname" class="form-control<?php if (isset($errors["e1"])) echo " is-invalid"; ?>" value="<?php if (isset($_REQUEST["jak_signup_firstname"])) echo $_REQUEST["jak_signup_firstname"]; ?>">
                    </div>
                    <div>
                      <label for="signup_secondname"><?php echo $jkl["us"]; ?></label>
                      <input type="text" name="jak_signup_secondname" id="signup_secondname" class="form-control<?php if (isset($errors["e1"])) echo " is-invalid"; ?>" value="<?php if (isset($_REQUEST["jak_signup_secondname"])) echo $_REQUEST["jak_signup_secondname"]; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="signup_email"><?php echo $jkl["u1"]; ?></label>
                    <input type="text" name="jak_signup_email" id="signup_email" class="form-control<?php if (isset($errors["e2"])) echo " is-invalid"; ?>" value="<?php if (isset($_REQUEST["jak_signup_email"])) echo $_REQUEST["jak_signup_email"]; ?>">
                  </div>

                  

                  <div class="form-group">
                    <label for="signup_pass"><?php echo $jkl["u4"]; ?></label>
                    <input type="password" name="jak_signup_password" id="signup_pass" class="form-control<?php if (isset($errors["e5"]) || isset($errors["e6"])) echo " is-invalid"; ?>" onkeydown="passwordStrength(this.value)">
                  </div>
                  <div class="form-group">
                    <label for="signup_passwc"><?php echo $jkl["u5"]; ?></label>
                    <input type="password" name="jak_signup_confirm_password" id="signup_passwc" class="form-control<?php if (isset($errors["e5"]) || isset($errors["e6"])) echo " is-invalid"; ?>">
                  </div>

                  <div class="progress" style="height: 5px;">
                    <div id="jak_pstrength" style="width:0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="200"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="signupID" class="btn btn-primary btn-round btn-lg btn-block mb-3"><?php echo $jkl["s0"]; ?></button>
                  <input type="hidden" name="action" value="signup">
                  <div class="pull-right">
                    <h6>
                      <a href="javascript:void(0)" class="link footer-link log-in"><?php echo $jkl["login"]; ?></a>
                    </h6>
                  </div>
                </div>
              </form>
            </div>
            <div class="forgotP">
              <form class="form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <div class="card-header text-center">
                  <h3><?php echo $jkl['l13']; ?></h3>
                </div>
                <div class="card-body">
                  <?php if (isset($errorfp)) { ?><div class="alert alert-danger"><?php echo $errorfp["e"]; ?></div><?php } ?>
                  <div class="input-group no-border form-control-lg">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-envelope"></i>
                      </div>
                    </div>
                    <input type="text" name="lsE" class="form-control<?php if (isset($errorfp)) echo " is-invalid"; ?>" id="email" placeholder="<?php echo $jkl["l5"]; ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="forgotP" class="btn btn-primary btn-round btn-lg btn-block mb-3"><?php echo $jkl["g4"]; ?></button>
                  <div class="pull-right">
                    <h6>
                      <a href="javascript:void(0)" class="link footer-link lost-pwd"><?php echo $jkl["g3"]; ?></a>
                    </h6>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <footer class="footer">
      <div class=" container-fluid ">
        <nav>
          <ul>
            <li>
              <a href="javascript:void(0)">
                About Us
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <?php if (isset($jakhs['copyright']) && !empty($jakhs['copyright'])) { ?>
          <div class="copyright" id="copyright">
            <i class="fa fa-copyright"></i>
            <?php echo date("Y"); ?>, Designed with <i class="fa fa-heart"></i>. Coded by
            <a href="https://www.jakweb.ch" target="_blank">JAKWEB</a>.
          </div>
        <?php } ?>
      </div>
    </footer>

  </div>

</div>

<?php include "footer.php"; ?>