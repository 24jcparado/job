
<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url(<?=base_url()?>assets/img/logos/evsu.png);">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <form method="POST" action="<?php echo base_url(); ?>welcome/login" role="form">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
              <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-danger shadow-danger border-radius-lg py-3 pe-1">
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Records Office</h4>
                    <div class="row">
                        
                    </div>
                  </div>
                </div>
                <div class="card-body">
                   <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                      <span class="text-sm">Congratulations! You have successfully logged in.</span>
                      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php }elseif($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                      <span class="text-sm">Sorry, the login attempt was unsuccessful. Please check your credentials and try again.</span>
                      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                  <form method="POST" action="<?php echo base_url(); ?>welcome/login" role="form">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-check form-switch d-flex align-items-center mb-3">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                      <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-danger w-100 my-4 mb-2 text-white">Login</button>
                    </div>
                    <p class="mt-4 text-sm text-center">
                      Don't have an account?
                      <a href="<?=base_url('welcome/sign_up')?>" class="text-danger text-gradient font-weight-bold">Sign up</a>
                    </p>
                  </form>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
 