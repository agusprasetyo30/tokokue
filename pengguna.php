<?php
  include('./data/function.php');

  $title = "Pengguna";

  $data_pengguna = pagination(5, "SELECT * FROM users");
?>


<?php include_once('./layouts/header.php') ?>

<div class="row justify-content-center">
    <div class="col-md-12">
      <!-- <div class="card"> -->
        <!-- <div class="card-body"> -->
          <a href="tambah-pengguna.php" class="btn btn-sm btn-success float-right mb-2"><i class="fa fa-plus"></i> Tambah Pengguna</a>
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th width=5%>#</th>
                <th width=40%>Nama</th>
                <th width=25%>Username</th>
                <th width=15%>Status</th>
                <th width=20%>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                // foreach ($data_pengguna as $pengguna) {
    						while ($pengguna = mysqli_fetch_array($data_pengguna)) {

              ?>
              <tr>
                <td><?= getNomer() ?>. </td>
                <td><?= $pengguna['nama'] ?></td>
                <td><?= $pengguna['username'] ?></td>
                <td>
                  <?php 
                    if ($pengguna['status'] == 'AKTIF') {
                      echo '<span class="badge badge-primary">AKTIF</span>';

                    } else {
                      echo '<span class="badge badge-danger">NONAKTIF</span>';
                    }                    
                  ?>
                </td>
                <td>
                  <a href="edit-pengguna.php?user=<?= $pengguna['username'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="hapus-pengguna.php?user=<?= $pengguna['username'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              
              <?php } ?>

            </tbody>
          </table>
          <!-- Pagination -->
				<?= paginationNumber() ?>
        <!-- </div>
      </div> -->
    </div>
  </div>

<?php include_once('./layouts/footer.php') ?>