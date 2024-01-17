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
              <p class="text-dark">Documents here are received from Record's office and ready to release to the President's office</p>
            </div>
            <div class="card-body pt-4 p-3">
               <div class="text-end">
                <a href="<?=base_url('admin/print_release')?>" class="btn btn-outline-primary btn-sm mb-3" target="blank"><i class="bi bi-printer"> Print</i> </a>
               </div>
              <table class="table" id="table">
                  <thead>
                    <tr>
                      <th><h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($received as $row){?>
                    <tr>
                      <td>
                        <ul class="list-group">
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                              <button class="btn btn-rounded btn-outline-danger dropdown-toggle mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown"></button>
                              <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                <li>
                                  <a href="javascript:;" class="dropdown-item forReleased" data-forReleased='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-secondary text-sm"></i>
                                      Released
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
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Received Documents from President's office</h6>
                </div>
                
              </div>
            </div>  
            <div class="card-body pt-4 p-3">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0"></h6>
                  </div>
                 
                </div>
              </div>
              <div class="card-body p-3 pb-0">
                <?php foreach($released as $row){?>
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark font-weight-bold text-sm"><?=$row['control_no']?></h6>
                      <span class="text-xs">This Document is <?=$row['released_to_pres']?></span>
                    </div>
                  </li>
                </ul>
              <?php } ?>
              </div>

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
                <h5 class="">Released to President Office for Proper Action</h5>
                <p class="mb-0">Name and Date Today will reflect at the records log book</p>
              </div>
              <div class="card-body">
                <?=form_open('', ['id'=>'frmReleased'])?>
                <form role="form text-left">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Name</label>
                    <input type="hidden" name="records_id" id="records_id">
                    <input type="hidden" name="status" id="status" value="1">
                    <input type="text" name="released_to_pres" id="released_to_pres" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Released</button>
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

  $('.forReleased').click(function(){
      const row = JSON.parse($(this).attr('data-forReleased'));
      $('#frmReleased').attr('action', "<?=base_url('admin/recordReleased')?>");
      $('#records_id').val(row.records_id);
      $('#released_to_pres').val(row.released_to_pres);
      $("#modal-form").modal("show");
    });
  // function table()
  //   {
      
  //       var divToPrint=document.getElementById("table");
  //       newWin= window.open("");
  //       newWin.document.write(divToPrint.outerHTML);
  //       newWin.document.close();
  //       newWin.print();
  //       //newWin.close();
  //   }

  //   document.querySelector("#button").addEventListener("click", function(){
  //     table();
  //   });
</script>