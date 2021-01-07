<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Akun</h1>

      <hr>
      <h5>Form edit akun</h5>
      <hr>
          

    <div class="row">


      <?php 

        $id = $_GET['id'];

        $result = mysql_query("SELECT * FROM tb_login WHERE id='$id'");
        $data = mysql_fetch_assoc($result);

       ?>
      <div class="col-8">

          <form method="post" action="edtitakun_act.php">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id" required="" value="<?php echo $data['id']; ?>">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required="" value="<?php echo $data['username']; ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password" placeholder="" required="" value="<?php echo $data['password']; ?>">
          </div>
          <div class="form-group">
            <label>Role</label>
            <select class="form-control" id="exampleFormControlSelect1" name="role">
              <option><?php echo $data['role'] ?></option>
            <option>admin</option>
            <option>kasir</option>
            
          </select>
          </div>
          
          
          <button type="submit" class="btn btn-primary" name="tambah">Edit Akun</button>
          <a href="akun.php" class="btn btn-warning"> Kembali  </a>
        </form>
      </div>

      </div>

    </div>

        



    

    
     
<?php 

  include "footer.php";
 ?>
