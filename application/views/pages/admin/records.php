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
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Records</h6>
              <div class="card-body pt-4 p-3">
               <div class="text-end">
                <a href="<?=base_url('admin/print_records')?>" class="btn btn-primary mb-3" target="blank"><i class="bi bi-printer"> Print</i> </a>
               </div>
            </div>
            <div class="card-body pt-4 p-3">

              <table class="table" id="table">
                  <thead>
                    <tr>
                      <th>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Control No.</h6>
                      </th>
                      <th>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Status</h6>
                      </th>
                      <th>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Particular</h6>
                      </th>
                      <th>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Sender</h6>
                      </th>
                      <th>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Remarks</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($records as $row){?>
                    <tr>
                      <td><?=$row['control_no']?></td>
                      <td>
                        <?php  if($row['status'] == 4) {?>
                          <p class="badge badge-pill bg-gradient-success">Approved</p><br>
                          <a href="javascript:;" class="btn btn-sm btn-default view" data-view='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-sm"></i>
                                      View File
                                  </a>
                          <a href="javascript:;" class="btn btn-sm btn-default tracked" data-view='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-sm"></i>
                                      Tracked File
                                  </a>
                        <?php }else{?>
                           <p class="badge badge-pill bg-gradient-primary">Pending</p><br>
                            <a href="javascript:;" class="btn btn-sm btn-default tracked" data-view='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-sm"></i>
                                      Tracked File
                                  </a>
                        <?php } ?>
                      </td>
                      <td><?=nl2br($row['particulars'])?></td>
                      <td><?=$row['sender']?></td>
                      <td><?=nl2br($row['remarks'])?></td>
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
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h5 class="">Official Records Document</h5>
              </div>
              <div class="card-body">
                <img style="width: 100%; height: 100%;" id="file">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="modal fade" id="tracked-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                 <h6>Records overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
              </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">login</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0"><p id="released_to_pres"></p></h6>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">arrow_right_alt</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0"><p id="received_by_records"></p></h6>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">menu_open</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0"><p id="date_returned"></p></h6>
                    <p class="text-secondary font-weight-bold mt-1 mb-0">
                      Remarks: <p class="" id="remarks"></p><br>
                      Concerned Office: <p id="concerned"></p><br>
                      Document from client:<p id="received_from_client"></p></p>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script>
  $('.view').click(function(){
      const row = JSON.parse($(this).attr('data-view'));
      $('#file').attr('src', "<?=base_url('assets/document/file/')?>" + row.file);
      $("#modal-form").modal("show");
    });
  $('.tracked').click(function(){
      const row = JSON.parse($(this).attr('data-view'));
      $('#released_to_pres').text(row.released_to_pres);
      $('#received_by_records').text(row.received_by_records);
      $('#remarks').text(row.remarks);
      $('#received_from_client').text(row.received_from_client);
      $('#concerned').text(row.concerned);
      $('#date_returned').text(row.date_returned);
      $("#tracked-form").modal("show");
    });
</script>