<table style="padding-top: 75px;">
    <th>id_users</th>
    <th>username</th>
    <?php
    include "createBD.php";
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
          <td> <?php echo $row["id_users"] ?> </td>
          <td> <?php echo $row["username"] ?> </td>
          <td>
            <a href="editForm.php?id=<?php echo $row['id_users']; ?>">Edit</a>
            <a href="hapus.php?id=<?php echo $row['id_users']; ?>">Hapus</a>
          </td>
        </tr>
    <?php
      }
    } else {
      echo "0 results";
    }
    ?>
  </table>