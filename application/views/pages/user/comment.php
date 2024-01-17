<body class="g-sidenav-show  bg-gray-200">
  <?php $this->load->view('pages/components/sidebar.php')?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php $this->load->view('pages/components/topnav.php')?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <div class="card mt-4">
            <div class="card-header p-3">
              <h5 class="mb-0">Write Your Comment here!</h5>
              <?php if($this->session->flashdata('success')){?>
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                  <span class="text-sm"><?=$this->session->flashdata('success')?></span>
                  <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php }elseif($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                  <span class="text-sm"><?=$this->session->flashdata('error')?></span>
                  <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
            </div>

             
            <div class="card-body p-3 pb-0">
                <?=form_open('user/addComment', ['id'=>'frmComment'])?>
                <div class="input-group input-group-outline mb-4">
                  <textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Write here your COMMENT" spellcheck="false" required></textarea>
                  <input type="hidden" name="comment_id" id="comment_id" required>
                  <input type="hidden" name="user_id" value="<?=$_SESSION['user']['user_id']?>">
                  
                </div>
                <hr>

                <button type="submit" id="trn_submit" class="btn btn-icon btn-2 btn-info">
                    Add
                </button>
                <?=form_close()?>
                <hr>
                
                <?php $i=0;  foreach($comment as $row): $i++;?>
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0"><?=$row['name']?></h6>
                      </div>
                      <?php if ($profile->user_type == 'Admin') {?>
                      <div class="col-md-4 text-end">
                        <a href="javascript:;" class="editComment" data-editComment='<?=json_encode($row)?>'>
                          <i class="fas fa-user-edit text-info text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Comment"></i>
                        </a>
                        <a href="<?=base_url('user/deleteComment/'.$row['comment_id'])?>" class="delete">
                          <i class="fas fa-trash text-danger text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Comment"></i>
                        </a>
                      </div>
                      <?php }else{} ?>
                    </div>
                  </div>
                  <div class="card-body p-3">
                      <p class="text-sm">
                        <?=nl2br($row['comment'])?>
                      </p>
                  </div>
                </div>
                <?php endforeach?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
<script>
  $('.editComment').click(function(){
      const row = JSON.parse($(this).attr('data-editComment'));
      $('#frmComment').attr('action', "<?=base_url('user/editComment')?>");
      $('#comment_id').val(row.comment_id);
      $('#comment').val(row.comment);
      $('#trn_submit').removeAttr('disabled');
      $("#trn_submit").text("Update");
    });
  $('.delete').on('click', function(e){
          e.preventDefault();
           Swal.fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = $(this).attr('href');
                Swal.fire({
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  icon: "success"
                });
              }
            });
        });
</script>