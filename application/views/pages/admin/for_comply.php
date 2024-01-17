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
              <p class="text-dark">Documents below are for compliance</p>
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
                    <?php foreach($comply as $row){?>
                    <tr>
                      <td>
                        <ul class="list-group">
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                              <button class="btn btn-rounded btn-outline-danger dropdown-toggle mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown"></button>
                              <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                <li>
                                  <a href="javascript:;" class="dropdown-item forReceived" data-forReceived='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-secondary text-sm"></i>
                                      Received
                                  </a>
                                </li>
                              </ul>
                              <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm"><?=$row['control_no']?></h6>
                                <span class="text-xs"><?=nl2br($row['remarks'])?></span>
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
                <h5 class="">Returned to Records Office</h5>
              </div>
              <div class="card-body">
                <?=form_open('', ['id'=>'frmReceived'])?>
                   <input type=hidden name="records_id" id="records_id">
                   <input type="hidden" name="return" id="return" value="1">
                   <input type="hidden" name="received_from_client" id="received_from_client" value="received by <?=$profile->name?> at <?=date('F j, Y, g:i a')?>">
                  REMARKS: <p style="font-style: italic; color: red;"> Please do not delete previous remarks, for tracking pusposes</p>
                  <div class="input-group input-group-outline my-3">
                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Add Remarks Here!"></textarea>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Receive</button>
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
  $('.forReceived').click(function(){
      const row = JSON.parse($(this).attr('data-forReceived'));
      $('#frmReceived').attr('action', "<?=base_url('admin/recordComplied')?>");
      $('#records_id').val(row.records_id);
      $('#remarks').text(row.remarks);
      $("#modal-form").modal("show");
    });
</script>