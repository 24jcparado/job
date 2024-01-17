<body class="g-sidenav-show  bg-gray-200">
  <?php $this->load->view('pages/components/sidebar.php')?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php $this->load->view('pages/components/topnav.php')?>
        <div class="container-fluid px-2 px-md-4">
      <div class="row">
        <div class="col-12 mt-4">
          <div class="row">
            <div class="col-7 mt-3">
              <div class="card mt-4">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-info shadow text-center border-radius-xl mt-n4 float-start">
                  <i class="material-icons opacity-10">people</i>
                  </div>

                  <div class="row">
                    <div class="col-8">
                      <h3 class="mb-0">List of Users</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pt-4">
                  <table id="table" class="table">
                    <thead>
                      <tr>
                        <th>Users</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $row){?>
                    <tr>
                      <td>
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                          <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                            <div class="checklist-item checklist-item-primary ps-2 ms-3">
                              <div class="d-flex align-items-center">
                                <h2 class="mb-0 text-dark"><i class="material-icons me-2" >work</i><?=$row['name']?></h2> <span class="badge bg-gradient-warning"><?=$row['user_type']?></span> 
                                <div class="dropstart  float-lg-end ms-auto">
                                  <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="material-icons text-secondary text-sm">
                                  settings
                                  </i>
                                  </a>
                                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style>
                                    <li>
                                        <a href="<?=base_url('admin/viewDetails/'.$row['user_id'])?>" class="dropdown-item">
                                          <i class="fas fa-eye text-secondary text-sm"></i>
                                           Details
                                        </a>
                                      </li>
                                      <li>
                                        <a href="javascript:;" class="dropdown-item editUsers" data-editUsers='<?=json_encode($row)?>'>
                                          <i class="fas fa-user-edit text-info text-sm"></i>
                                           Edit
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="dropdown-item delete">
                                          <i class="fas fa-trash text-danger text-sm"></i>
                                           Deactivate
                                        </a>
                                      </li>
                                      
                                  </ul>
                                </div>
                              </div>
                            <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                              <div>
                                <p class="mb-0 text-secondary">Email</p>
                                <span class="text-xs"><?=$row['email']?></span>
                              </div>
                              <div class="mx-auto">
                                <p class="mb-0 text-secondary">Last Login</p>
                                <span class="text-xs"><?=$row['last_login']?></span>
                              </div>
                              </div>
                            </div>
                          <hr class="horizontal dark mt-4 mb-0">
                          </li>
                        
                        </ul>
                      </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
              <div class="col-5">
                <div class="card mt-5">
                  <div class="card-body">
                    <?=form_open('welcome/addUser', ['id'=>'frmAddUser'])?>
                      <p style="color: red; font-style: italic;" id="lbl_info"><i class="material-icons" >people</i> User Information</p>
                      <div class="row">
                        <div class="col-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Name</label>
                            <input type="hidden" name=" user_type" id="user_type" value="Admin">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                          </div>
                        </div>
                      </div>
                      <hr class="horizontal text-dark">
                      <p style="color:red; font-style: italic;" id="lbl_sec"><i class="material-icons" >search</i>User Security</p>
                      <div class="row">
                        <div class="col-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group input-group-static mb-4">
                            <label id="lbl_password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                          </div>
                        </div>
                      </div>
                      <hr class="horizontal text-dark">
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 mt-3 mb-0 submit">Submit</button>
                      </div>
                    <?=form_close()?>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
  </main>
</body>
<script>
  $('.editUsers').click(function(){
      const row = JSON.parse($(this).attr('data-editUsers'));
      $('#frmAddUser').attr('action', "<?=base_url('welcome/editUsers')?>");
      $('#user_id').val(row.user_id);
      $('#name').val(row.name);
      $('#email').val(row.email);
      $('#password').prop('disabled', true)
      $('#username').val(row.username);
      $('#lbl_password').text('Password is encrypted!');
      $(".submit").text("Update");
    });
</script>