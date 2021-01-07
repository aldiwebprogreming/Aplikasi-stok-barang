<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Angsuran</h1>

      <hr>
      <h5>Form edit angsuran</h5>
      <hr>
          

    <div class="row">


      <?php 

        $id = $_GET['id_bayar'];

        $result = mysql_query("SELECT * FROM bayar WHERE id_bayar ='$id'");
        $data = mysql_fetch_assoc($result);

       ?>
      <div class="col-8">

          <form method="post" action="edit_angsuran_act.php">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id" required="" value="<?php echo $data['id']; ?>">
            <input type="hidden" class="form-control" name="id_bayar" required="" value="<?php echo $data['id_bayar']; ?>">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required="" value="<?php echo $data['tanggal']; ?>">
          </div>
          <div class="form-group">
            <label>Bayar</label>
            <input type="text" class="form-control" name="bayar" min="1" max="<?php echo $data['sisa_pembayaran'] ?>" placeholder="" required="" value="<?php echo $data['sisa_pembayaran']; ?>">
          </div>
          
          
          <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
          <a href="detail_angsuran.php?id=<?php echo $data['id']; ?>" class="btn btn-warning"> Kembali  </a>
        </form>
      </div>

      </div>

    </div>

        




    

    
     
<?php 

  include "footer.php";
 ?>
