
<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url(<?=base_url()?>assets/img/logos/evsu.png);">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-danger shadow-danger border-radius-lg py-3 pe-1">
                  <div class="row">
                      <img src="<?=base_url()?>assets/img/logos/evsu_main_logo_2.png" style="width: 70%; height: 70%; margin-left: auto; margin-right: auto;">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                      <span class="text-sm">Congratulations! You have successfully registered.</span>
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
                <form action="<?=base_url()?>welcome/addUser" method="post" id="frmAddUser" class="form-horizontal" role="form" enctype="multipart/form-data">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Name </label>
                    <input type="text" name="name" id="name" class="form-control">
                    <input type="hidden" name="user_type" id="user_type" value="Applicant" class="form-control" required>
                  </div>
                   <div class="input-group input-group-outline my-3">
                    <label class="form-label">User Name </label>
                    <input type="text" name="username" id="username" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                  </div>
                  <hr>
                  
                  <div class="text-center">
                    <button type="submit" class="btn bg-danger text-white w-100 my-4 mb-2">Register</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                   Have an account?
                    <a href="<?=base_url()?>welcome" class="text-danger text-gradient font-weight-bold">Sign in</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
 