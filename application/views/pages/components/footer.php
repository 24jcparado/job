 <!--   Core JS Files   -->
  <script src="<?=base_url()?>assets/js/jquery.cropit.js"></script>
  <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/chartjs.min.js"></script>

  
  <script src="<?=base_url()?>assets/datatable/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/datatable/dataTables.semanticui.min.js"></script>
  <script src="<?=base_url()?>assets/datatable/semantic.min.js"></script>
  
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
  <script>
    $('#table').DataTable();
    $('.logout').on('click', function(e){
          e.preventDefault();
           Swal.fire({
              title: "Are you sure you want logout?",
              text: "You won't be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes!"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = $(this).attr('href');
                Swal.fire({
                  title: "Logged Out!",
                  text: "Your session has been destroy",
                  icon: "success"
                });
              }
            });
        });
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="<?=base_url()?>assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>