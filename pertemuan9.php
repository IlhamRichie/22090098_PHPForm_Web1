<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $nimErr = $emailErr = $alamatErr = "";
$name = $nim = $email = $alamat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nama harus diisi";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Hanya huruf dan spasi";
    }
  }
  
  if (empty($_POST["nim"])) {
    $nimErr = "NIM harus diisi";
  } else {
    $nim = test_input($_POST["nim"]);
    if (!is_numeric($nim)) {
      $nimErr = "Hanya angka";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email harus diisi";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email tidak valid";
    }
  }

  if (empty($_POST["alamat"])) {
    $alamatErr = "Alamat harus diisi";
  } else {
    $alamat = test_input($_POST["alamat"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="container">
  <h2>FORM SEDERHANA DENGAN PHP</h2>
  <p><span class="error">* Field tidak boleh kosong</span></p>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

    <label for="nim">NIM:</label>
    <input type="text" name="nim" value="<?php echo $nim;?>">
    <span class="error">* <?php echo $nimErr;?></span>
    <br><br>

    <label for="email">E-mail:</label>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" rows="5" cols="40"><?php echo $alamat;?></textarea>
    <span class="error">* <?php echo $alamatErr;?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">  
  </form>

  <?php
  echo "<h2>Data anda:</h2>";
  echo "Name: " . $name;
  echo "<br>";
  echo "NIM: " . $nim;
  echo "<br>";
  echo "Email: " . $email;
  echo "<br>";
  echo "Alamat: " . $alamat;
  ?>

  <h3>Nilai Default:</h3>
  <p>NIM: 22090098<br>
  Nama: M.Ilham Rigan Agachi<br>
  Email: ilhamrigan22@gmail.com<br>
  Alamat: Tegal</p>
</div>

</body>
</html>
