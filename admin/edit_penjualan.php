<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid mt-4">

<h1 class="h3 mb-4 text-gray-800">Edit Penjualan</h1>

          

    <div class="row">


      <?php 

        $id = $_GET['id'];

        $result = mysql_query("SELECT * FROM tb_beli WHERE id='$id'");
        $data = mysql_fetch_assoc($result);

       ?>
      <div class="col-8">

          <form method="post" action="edit_penjualan_act.php">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id" required="" value="<?php echo $data['id']; ?>">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" required="" value="<?php echo $data['kode_barang']; ?>">
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" placeholder="" required="" value="<?php echo $data['nama_barang']; ?>">
          </div>
          <div class="form-group">
            <label>Merek</label>
            <input type="text" class="form-control" name="merek" placeholder="" required="" value="<?php echo $data['merek']; ?>">
          </div>
          <div class="form-group">
            <label>Harga barang</label>
            <input type="number" class="form-control" name="harga_barang" placeholder="" required="" value="<?php echo $data['harga_barang']; ?>">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" placeholder="" required="" value="<?php echo $data['jumlah_stok']; ?>">
          </div>
          <div class="form-group">
            <label>Total harga</label>
            <input type="number" class="form-control" name="total_harga" placeholder="" required="" value="<?php echo $data['total_harga']; ?>">
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" placeholder="" required="" value="<?php echo $data['tanggal'] ?>">
          </div>
           <div class="form-group">
            <label>Jam</label>
            <input type="time" class="form-control" name="jam" placeholder="" required="" value="<?php echo $data['jam'] ?>">
          </div>
          
          <button type="submit" class="btn btn-primary" name="tambah">Edit Penjualan</button>
        </form>
      </div>

      </div>

    </div>

    <br>
        



    

    
     
<?php 

  include "footer.php";
 ?>
