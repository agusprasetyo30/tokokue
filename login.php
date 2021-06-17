<?php
  $title = "Login";
?>


<?php include_once('./layouts/header.php') ?>

<div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <form name="registration" action="loginproses.php" method="post">
            <div class="form-group text-left">
              <label for="" class="text-left">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />
            </div>
            
            <div class="form-group text-left">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
            </div>

            <div class="form-group text-right">
              <input type="submit" name="submit" value="Login" class="btn btn-success"/>
            </div>

            <p>Belum Terdaftar ? <a class="text-primary" href='daftar.php'>Daftar</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>

<?php include_once('./layouts/footer.php') ?>