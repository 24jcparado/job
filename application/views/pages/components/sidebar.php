  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        
        <span class="ms-1 font-weight-bold text-white"><?=$profile->user_type?> | <?=$profile->name?> </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
        <li class="nav-item">
          <a class="nav-link text-white <?=$page=='Dashboard'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
      <?php } ?>
         <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Records</h6>
        </li>
          <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='Add Form'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/addForm">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='Add Form'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">add_circle</i>
              </div>
              <span class="nav-link-text ms-1">Add Form</span>
            </a>
          </li>
          <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='For Released'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/forReleased">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='For Released'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">login</i>
              </div>
              <span class="nav-link-text ms-1">For Released</span>
            </a>
          </li>
          <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='For Received'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/forReceived">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='For Received'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">arrow_right_alt</i>
              </div>
              <span class="nav-link-text ms-1">For Received</span>
            </a>
          </li>
          <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='For Concerned'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/forConcerned">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='For Concerned'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">menu_open</i>
              </div>
              <span class="nav-link-text ms-1">For Concerned</span>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='For Compliance'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/forCompliance">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='For Compliance'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">sync_alt</i>
              </div>
              <span class="nav-link-text ms-1">For Compliance</span>
            </a>
          </li>
          <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='For Scanned'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/forScanned">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='For Scanned'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">document_scanner</i>
              </div>
              <span class="nav-link-text ms-1">For Scanned</span>
            </a>
          </li>
           <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='Records'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/Records">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='Records'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">inventory</i>
              </div>
              <span class="nav-link-text ms-1">Records</span>
            </a>
          </li>
           <li class="nav-item">
            <?php if ($_SESSION['user']['user_type'] == 'Admin') {?>
              <a class="nav-link text-white <?=$page=='Users'?'active bg-gradient-primary':''?> " href="<?=base_url()?>admin/Users">
            <?php }else{?>
            <a class="nav-link text-white <?=$page=='Users'?'active bg-gradient-primary':''?> " href="<?=base_url()?>user">
            <?php } ?>
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Users</span>
            </a>
          </li>

      </ul>
    </div>
  </aside>