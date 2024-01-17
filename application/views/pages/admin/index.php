 <style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }

      button {
        margin-top: 10px;
      }
    </style>
<body class="g-sidenav-show  bg-gray-200">
  <?php $this->load->view('pages/components/sidebar.php')?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php $this->load->view('pages/components/topnav.php')?>
        <?php if (empty($profile->photo)) {?>
       <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card mt-4">
            <div class="card-header p-3">
              <h5 class="mb-0">Profile Picture</h5>
               <p style="font-style: italic; color:red">**If you are first time here please add your profile picture.</p>
            </div>
            <div class="card-body p-3 pb-0">
              <div class="col-md-6">
                <form action="<?=base_url()?>welcome/UpdateProfile" method="post" id="updateimg" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="image-editor">
                <div class="cropit-preview"></div>
                <div class="image-size-label">
                  Resize image
                </div>
                <input type="range" class="cropit-image-zoom-input form-range">
                <input type="hidden" id="hidden_base64" name="img" value="">
                <input type="file" class="cropit-image-input form-control" name="avatars" id="avatars" accept="image/jpeg">
                <button class="rotate-ccw btn btn-primary">Rotate counterclockwise</button>
                <button class="rotate-cw btn btn-primary">Rotate clockwise</button>
                <button type="submit" class="btn btn-success export">Update</button>
               </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div> 
    <?php }else{?>
      <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Records</p>
                <h4 class="mb-0"><?=count($records)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">arrow_right_alt</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">For Receive</p>
                <h4 class="mb-0"><?=count($received)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">login</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">For Release</p>
                <h4 class="mb-0"><?=count($released)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">menu_open</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">For Concerned</p>
                <h4 class="mb-0"><?=count($concerned)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">sync_alt</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">For Compliance</p>
                <h4 class="mb-0"><?=count($comply)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
         <div class="col-xl-4 col-sm-6 mt-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">document_scanner</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">For Scanned</p>
                <h4 class="mb-0"><?=count($scanned)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </main>
  <script>
      $(function() {
        $('.image-editor').cropit();

        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });

        //Assign Export Function
        $('.export').click(function() {
            var imageData = $('.image-editor').cropit('export', {
                type: 'image/jpeg',
                quality: 0.33,
                originalSize: true,
            });
            $("#hidden_base64").val(imageData);
        });
      });
    </script>