<?php
include_once 'vaisseaux.class.php';
session_start();
$v1 = unserialize($_SESSION['vaisseaux']['v1']);
$v2 = unserialize($_SESSION['vaisseaux']['v2']);
?>
<html>
<body>
  <?php if($v1->getTurn())
  echo '<h1>Player 1 lose</h1>';
    else if($v2->getTurn())
  echo '<h1>Player 2 lose</h1>';
  ?>
    <form action="index.php">
    <button>Restart</button>
  </form>
</body>
</html>
<?php

 ?>
