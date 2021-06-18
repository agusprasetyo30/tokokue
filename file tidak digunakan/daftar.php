<?php
  include './data/function.php';

  // $title untuk mengisi title data pada layout
  $title = "Register";

  // $breadcrumb = true;
?>

<?php include_once('./layouts/header.php') ?>
  
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <form name="registration" action="tambahProses.php" method="post">
            <div class="form-group text-left">
              <label for="" class="text-left">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />
            </div>
            
            <div class="form-group text-left">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
            </div>

            <div class="form-group text-right">
              <input type="submit" name="submit" value="Daftar" class="btn btn-success"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php 
  include_once('./layouts/footer.php') 


?>