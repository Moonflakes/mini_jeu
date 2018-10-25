<?php
include_once 'install.php';
//print_r($_SESSION);
include_once 'vaisseaux.class.php';
session_start();
//style="backgound-color:green;"
$x = 0;
$y = 0;
?>

<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: repeat(20,55px);
}

.grid-container > div {
  border: 1px solid black;
  height: 55px;
  width: 55px;
  text-align: center;
}
</style>
</head>
<body>
<form action="game.php" method="post">
  <button type="submit" name="submit" value="start">start</button>
  <?php
  if ($_POST['submit'] == "start")
  {
    header("Location: game.php");
  }
  ?>
</body>
</html>


<?php
