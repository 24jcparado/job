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
              <h6 class="mb-0">For Receive</h6>
              <p class="text-dark">Documents here are received from PRESIDENT'S OFFICE and ready to release to the CONCERNED OFFICE</p>
            </div>
            <div class="card-body pt-4 p-3">
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
                                  <a href="javascript:;" class="dropdown-item forReceived" data-forReceived='<?=json_encode($row)?>'>
                                    <i class="fas fa-eye text-secondary text-sm"></i>
                                      Received
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
                <h6 class="mb-0">Documents received from Presidents Office</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <ul class="list-group">
                   <?php foreach($for_release as $row){?>
                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h6 class="text-sm"><?=$row['control_no']?></h6>
                      <span class="mb-3 text-xs"><span class="text-dark font-weight-bold ms-sm-2">This document was <?=$row['received_by_records']?></span></span>
                      <span class="mb-2 text-xs">SENDER: <span class="text-dark ms-sm-2 font-weight-bold"><?=$row['sender']?></span></span>
                      <span class="text-xs">REMARKS <span class="text-dark ms-sm-2 font-weight-bold"><?=$row['remarks']?></span></span>
                       <span class="text-xs">CONCERNED <span class="text-dark ms-sm-2 font-weight-bold"><?=nl2br($row['concerned'])?></span></span>
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
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-body">
                <?=form_open('', ['id'=>'frmReceived'])?>
                 <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="approved" id="approved" value="1">
                    <label class="custom-control-label" for="customRadio1">Approved</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="approved" id="approved" value="2">
                    <label class="custom-control-label" for="customRadio2">For Appropriate concerned</label>
                  </div>
                <table class="table">
                      <input type=hidden name="records_id" id="records_id">
                      <input type="hidden" name="status" id="status" value="2">
                      <input type="hidden" name="received_by_records" id="received_by_records" value="received by <?=$profile->name?> at <?=date('F j, Y, g:i a')?>">
                    <tr style="text-align: center;">
                      <td colspan=2><h5 class="">Action Slip</h5></td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="VP-AA" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">VP-AA</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, External Affairs" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, External Affairs</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="VP-AF" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">VP-AF</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]"  value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, IPDO</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">VP-RDE</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Research & Development</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">VP-IEA</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Extension Services</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Dean, CAAD</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, ICT</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Dean, CAS</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Head, HRMDO</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Dean, COBE</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Head, PMEAO</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Dean, COED</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">University/Board Secretary</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Dean, COE</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Technical Staff/ EA</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Dean, COT</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">BAC Secretariat</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Burauen Campus</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Accountant IV</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Carigara Campus</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Legal Counsel </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Dulag Campus</label>
                        </div>
                      </td>
                       <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Ormoc Campus</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Tanauan Campus</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">CAO, Admin Services</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">CAO, Finance Services</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, SASO</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, Sports and Devt" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Sports and Devt</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, Culture and the Arts" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Culture and the Arts</label>
                        </div>
                      </td>
                      <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, IGP" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, IGP</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, NSTP" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, NSTP</label>
                        </div>
                      </td>
                    </tr>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, IMASO & UQAAC" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, IMASO & UQAAC</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, GAD" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, GAD</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, Internalization of H.Ed." id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, Internalization of H.Ed.</label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input text-right" type="checkbox" name="concerned[]" value="Director, ARAO" id="fcustomCheck1">
                          <label class="custom-control-label" for="customCheck1">Director, ARAO</label>
                        </div>
                      </td>
                    </tr>
                  </table>
                  <hr class="text-dark">
                  <div class="input-group input-group-outline my-3">
                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Please write your remarks here!"></textarea>
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
      $('#frmReceived').attr('action', "<?=base_url('admin/recordReceived')?>");
      $('#records_id').val(row.records_id);
      $("#modal-form").modal("show");
    });
</script>