<body class="g-sidenav-show  bg-gray-200">
  <?php $this->load->view('pages/components/sidebar.php')?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php $this->load->view('pages/components/topnav.php')?>
    <div class="container-fluid py-4">
      <div class="row">
          <?php if($this->session->flashdata('success')){?>
         <script>
            Swal.fire({
              title: "Success!",
              text: "<?=$this->session->flashdata('success')?>",
              icon: "success"
            });
         </script>
        <?php }elseif($this->session->flashdata('error')){ ?>
          <script>
            Swal.fire({
              title: "Warning!",
              text: "<?=$this->session->flashdata('error')?>",
              icon: "warning"
            });
         </script>
        <?php } ?>
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">For Released</h6>
            </div>  
            <div class="card-body pt-4 p-3">
               <div class="text-end">
                    <button class="btn btn-outline-primary btn-sm mb-3" id="button">Print</button>
                  </div>
              <table class="table" id="table">
                  <thead>
                    <tr>
                      <th><h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($concerned as $row){?>
                    <tr>
                      <td>
                        <ul class="list-group">
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                              <button class="btn btn-rounded btn-outline-danger dropdown-toggle mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown"></button>
                              <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                <li>
                                  <a href="javascript:;" class="dropdown-item forScanned" data-forScanned='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-info text-sm"></i>
                                      Scan file
                                  </a>
                                </li>
                              </ul>
                              <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm"><?=$row['control_no']?></h6>
                                <span class="text-xs"><?=date("F j, Y, g:i a" , strtotime($row['date_received']))?></span>
                              </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                              - <?=$row['sender']?>
                            </div>
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
          <div class="col-md-5 mt-4">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Released to Concerned office</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <ul class="list-group">
                   <?php foreach($scanned as $row){?>
                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h6 class="text-sm"><?=$row['control_no']?></h6>
                      <span class="mb-3 text-xs"><span class="text-dark font-weight-bold ms-sm-2">This document was <?=$row['date_returned']?></span></span>
                      <span class="mb-2 text-xs">SENDER: <span class="text-dark ms-sm-2 font-weight-bold"><?=$row['sender']?></span></span>
                      <span class="text-xs">REMARKS <span class="text-dark ms-sm-2 font-weight-bold"><?=$row['remarks']?></span></span>
                    </div>
                  </li>
                <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h5 class="">Document for Scan</h5>
                <p class="mb-0">Attached here the scanned copy of the document</p>
              </div>
              <div class="card-body">
                <?=form_open_multipart('', ['id'=>'forScanned'])?>
                <form role="form text-left">
                   <div class="input-group input-group-outline my-3">
                    <label class="form-label text-muted" id="info"></label>
                    <input type="hidden" name="records_id" id="records_id">
                    <input type="file" name="file" id="file" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0 submit">Submit</button>
                  </div>
                <?=form_close()?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  $('.forScanned').click(function(){
      const row = JSON.parse($(this).attr('data-forScanned'));
      $('#forScanned').attr('action', "<?=base_url('admin/recordScanned')?>");
      $('#records_id').val(row.records_id);
      $("#modal-form").modal("show");
    });
  $("#file").change(function() {
    var allowed = ['jpeg','jpg','png'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), allowed) == -1) {
      $("#file").addClass("is-invalid text-danger");
      $("#info").text("Invalid File");
      $("#info").addClass("text-danger");
      $("#info").removeClass("text-muted");
      $(".submit").attr("disabled", true);
      $(".submit").text("Only img file are accepted");
    } else {
      $("#file").removeClass("is-invalid text-danger");
      $("#info").text("Good File");
      $("#info").addClass("text-muted");
      $("#info").addClass("text-success");
      $(".submit").attr("disabled", false);
      $(".submit").text("Submit");
    }
  });
</script>