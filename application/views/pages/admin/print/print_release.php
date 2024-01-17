<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$page?></title>
         <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
      <link href="<?=base_url()?>assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/css/nucleo-svg.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
      <link id="pagestyle" href="<?=base_url()?>assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
      <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
      <script src="<?=base_url()?>assets/js/sweetalert2@11.js"></script>

      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/datatable/semantic.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/datatable/dataTables.semanticui.min.css">
      <script src="<?=base_url()?>assets/datatable/jquery-3.7.0.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
      <style>
    table.dataTable td{
        padding: 15px 8px;
    }
    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
    th, td, tr {

        border: 1px solid black;
    }
    input {
        border: none;
    }
    .body {
        color: black;
    }
</style>
    </head>
    <body class="g-sidenav-show  bg-gray-200">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="container-fluid py-4">
                <div id="file">
                    <div class="text-center">
                       <img src="<?=base_url()?>assets/img/logos/favicon.png" class="img-fluid" alt="Responsive image" style="width: 80px; height: 80px;">
                       <p>
                           <p>Republic of the Philippines <br>
                            EASTERN VISAYAS STATE UNIVERSITY <br>
                            Tacloban City
                           </p> 
                            <h6> RECORDS MANAGEMENT OFFICE</h6>
                       </p>
                    </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>CONTROL NO.</th>
                                <th>PARTICULAR</th>
                                <th>SENDER</th>
                                <th>RECEIVE BY / DATE / SIGNATURE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($received as $row){?>
                            <tr>
                                <td><?=$row['control_no']?></td>
                                <td><?=nl2br($row['control_no'])?></td>
                                <td><?=$row['sender']?></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
           </div>
        </main>




      <script src="<?=base_url()?>assets/js/jquery.cropit.js"></script>
      <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
      <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
      <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
      <script src="<?=base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
      <script src="<?=base_url()?>assets/js/plugins/chartjs.min.js"></script>

      
      <script src="<?=base_url()?>assets/datatable/jquery.dataTables.min.js"></script>
      <script src="<?=base_url()?>assets/datatable/dataTables.semanticui.min.js"></script>
      <script src="<?=base_url()?>assets/datatable/semantic.min.js"></script>
    </body>
</html>