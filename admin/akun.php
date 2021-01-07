

<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data akun</h1>
      
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    <i class="fas fa-fw fa-plus"></i> Tambah akun baru
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Fomr tambah akun </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="tambah_akun.php">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required="">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password" placeholder="" required="">
          </div>
          <div class="form-group">
            <label>Role</label>
           <select class="form-control" id="exampleFormControlSelect1" name="role">
            <option>admin</option>
            <option>kasir</option>
            
          </select>
          </div>

          <button type="submit" class="btn btn-primary" name="tambah"> Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<hr>

<?php 

if (isset($_GET['tambah'])){


  
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> akun berhasil di input.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';


} else if (isset($_GET['edit'])) {


  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> akun berhasil di edit.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  
}

 ?>



  

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar data akun</h6>
               
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                
            </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include "../koneksi.php";
                    $result = mysql_query("SELECT * FROM tb_login") or die(mysql_error());
                    $no = 1;
                    while ($data = mysql_fetch_array($result)) {

                      

                   ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['username'] ?></td>
                      <td><?php echo $data['password'];?></td>
                        <td><?php echo $data['role'] ?></td>
                      <td>
                        <a href="hapus_akun.php?id=<?=$data['id'];?>" onclick="return confirm('Apakah kamu yakin ingin menghapus?')" class="btn btn-outline-danger"> Hapus </a>

                        <a href="edit_akun.php?id=<?=$data['id'];?>"class="btn btn-outline-warning"> Edit </a>
                      </td>
                      
                    </tr>
                        <?php } ?>
                  </tbody>

            
                </table>
                
                <hr>
              </div>
            </div>
          </div>

        </div>



</div>


   

<?php 

  include "footer.php";
 ?>
