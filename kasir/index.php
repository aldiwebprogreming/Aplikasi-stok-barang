<?php 

  include "sidebar.php";
  include "header.php";


//Memformat tanggal jam
// $date1 = "2017-06-1";
// $date = new DateTime($date1);
// $date_plus = $date->modify("+1 days");
// echo $date_plus->format("Y-m-d");

 ?>
   
        <div class="container-fluid">


<?php 
include "../koneksi.php";
$tgl_h = date("Y-m-d");
  $hutang = mysql_query("SELECT * FROM tb_hutang WHERE tanggal_pelunasan = '$tgl_h' ") or die(mysql_error());

  while ($cari = mysql_fetch_assoc($hutang)) {

// $date1 = $cari['tanggal_pelunasan'];
// $date = new DateTime($date1);
// $date_plus = $date->modify("+1 days");
// $tgl =  $date_plus->format("Y-m-d");




    if ($cari == NULL) {
      echo "Tidak ada pemberitahuan";

         

    } 
     elseif ($cari['tanggal_pelunasan'] == $tgl_h) {

?>


<div class="alert alert-primary" role="alert">
<b><?php  echo $cari['nama']; ?></b>, saatnya bayar hutang.
</div>



<?php
    }
 }

 ?>


        
          <h1 class="h3 mb-4 text-gray-800">Dashbord</h1>
          <!-- Earnings (Monthly) Card Example -->
            <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tanggal (h/b/t)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo date("d/M/Y") ;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                   <a href="" class="badge badge-primary" style="float: right; ">Lihat</a>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"></div>
                       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penjulan Hari ini</div>

                       <?php 

                        include "../koneksi.php";

                        $tgl  = date("Y-m-d");
                        $result = mysql_query("SELECT * FROM tb_beli Where tanggal = '$tgl' ") or die(mysql_error());
                        $data = mysql_num_rows($result);

                       

                        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">  <?php echo $data; ?> orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>

                  </div>
                  <!-- <a href="data_penjualan.php" class="badge badge-success" style="float: right; ">Lihat</a> -->
                </div>

              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data barang</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col">

                          <?php 

                            $result = mysql_query("SELECT * FROM tb_barang") or die(mysql_error());
                            $barang = mysql_num_rows($result);



                           ?>


                          
                        </div>
                      </div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">  <?php echo $barang; ?> barang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                   <!-- <a href="data_barang.php" class="badge badge-info" style="float: right; ">Lihat</a> -->
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data hutang</div>
                      

                         <?php 

                            $result = mysql_query("SELECT * FROM tb_hutang") or die(mysql_error());
                            $ht = mysql_num_rows($result);


                           ?>

                      
                     <!--  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ht; ?> hutang</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  <a href="data_hutang.php" class="badge badge-warning" style="float: right; ">Lihat</a>
                </div>

              </div>

            </div>
          </div>


          <div class="col-lg-8 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tokoku</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Selamat datang disistem pengelolahan data barang tokoku</p>
                 
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>Alamat Jl. Mawar Kecatamatan Stabat Kabupaten Langkat.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>

        </div>


    

    
     
<?php 

  include "footer.php";
 ?>
