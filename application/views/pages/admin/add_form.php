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
              <h6 class="mb-0">Add Form</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <?=form_open('admin/addRecords', ['id'=>'frmAdd'])?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-static my-3">
                      <label>CONTROL NO.</label>
                      <input type="text" name="control_no" id="control_no" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                      <input type="hidden" name="user_id" id="user_id" value="<?=$profile->user_id?>">
                       <input type="hidden" name="records_id" id="records_id">
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6">
                    <div class="input-group input-group-static my-3">
                      <label>DATE AND TIME RECEIVED</label>
                      <input type="datetime-local" name="date_received" id="date_received" class="form-control">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="input-group input-group-static my-3">
                      <label>DATE OF COMMUNICATION</label>
                      <input type="date" name="date_comm" id="date_comm" class="form-control">
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-static my-3">
                      <textarea class="form-control" rows="5" name="particulars" id="particulars" placeholder="PARTICULARS" spellcheck="false" onkeyup="this.value = this.value.toUpperCase();" required></textarea>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-static my-3">
                      <label>SENDER / SOURCE</label>
                      <input type="text" name="sender" id="sender" onkeyup="this.value = this.value.toUpperCase();" class="form-control">
                    </div>
                  </div>
                </div>
                 <button type="submit" id="trn_submit" class="btn btn-icon btn-2 btn-info">
                    Add
                </button>
              <?=form_close()?>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Received Documents</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small><?=date('l jS \of F Y')?></small>
                </div>
              </div>
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
                                  <a href="<?=base_url('admin/viewDetails/'.$row['records_id'])?>" class="dropdown-item">
                                    <i class="fas fa-eye text-secondary text-sm"></i>
                                      Details
                                  </a>
                                </li>
                                <li>
                                  <a href="javascript:;" class="dropdown-item editRecords" data-editRecords='<?=json_encode($row)?>'>
                                    <i class="fas fa-user-edit text-info text-sm"></i>
                                      Edit
                                  </a>
                                </li>
                                <li>
                                  <a href="<?=base_url('admin/deleteRecords/'.$row['records_id'])?>" class="dropdown-item delete">
                                    <i class="fas fa-trash text-danger text-sm"></i>
                                      Delete
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
      </div>
    </div>
  </main>
</body>
<script>

  $('.editRecords').click(function(){
      const row = JSON.parse($(this).attr('data-editRecords'));
      $('#frmAdd').attr('action', "<?=base_url('admin/editRecords')?>");
      $('#records_id').val(row.records_id);
      $('#control_no').val(row.control_no);
      $('#date_received').val(row.date_received);
      $('#date_comm').val(row.date_comm);
      $('#particulars').val(row.particulars);
      $('#sender').val(row.sender);
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