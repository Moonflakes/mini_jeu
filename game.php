<?php
include_once 'vaisseaux.class.php';
include_once 'Dice.class.php';
session_start();
$v1 = unserialize($_SESSION['vaisseaux']['v1']);
$v2 = unserialize($_SESSION['vaisseaux']['v2']);
$des = unserialize($_SESSION['des']);

$x = 0;
$y = 0;
if ($_POST['fin'] == "v2")
{
  $v1->setTurn(0);
  $v2->setTurn(1);
  $v2->nbmv = 5;
  $v2->nbtir = 1;
  $_SESSION['vaisseaux']['v2'] = serialize($v2);
  $_SESSION['vaisseaux']['v1'] = serialize($v1);
}
if ($_POST['fin'] == "v1")
{
  $v1->setTurn(1);
  $v2->setTurn(0);
  $v1->nbmv = 5;
  $v1->nbtir = 1;
  $_SESSION['vaisseaux']['v2'] = serialize($v2);
  $_SESSION['vaisseaux']['v1'] = serialize($v1);
}
if (isset($_POST['tir']))
{
  ?>
  <audio autoplay>
      <source src="pew.mp3" type="audio/mpeg">
  </audio>
  <?php
  echo $_POST['tir'];
  $res = $des->lancer();
  if ($_POST['tir'] < 4 && $res > 3)
  {
    if($v1->getTurn())
    {
      $v1->setTurn(0);
      $v2->setTurn(1);
    }
    else
    {
      $v2->setTurn(0);
      $v1->setTurn(1);
    }
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: lose.php");
  }
  else if ($_POST['tir'] < 8 && $res > 4)
  {
    if($v1->getTurn())
    {
      $v1->setTurn(0);
      $v2->setTurn(1);
    }
    else
    {
      $v2->setTurn(0);
      $v1->setTurn(1);
    }
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: lose.php");
  }
  else if ($_POST['tir'] < 11 && $res > 5)
  {
    if($v1->getTurn())
    {
      $v1->setTurn(0);
      $v2->setTurn(1);
    }
    else
    {
      $v2->setTurn(0);
      $v1->setTurn(1);
    }
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: lose.php");
  }
  else
  {
  if($v1->getTurn())
  {
    $v1->nbtir = 0;
  }
  else
  {
    $v2->nbtir = 0;
  }
  $_SESSION['vaisseaux']['v2'] = serialize($v2);
  $_SESSION['vaisseaux']['v1'] = serialize($v1);
  echo $res;
  }
}

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
  img {
    width: 25px;
    height: 25px;

  }
}
</style>
</head>
<body>
  <?php
  if ($v1->getPerdu() == 1)
  {
    header("Location: lose.php");
  }
  if ($v2->getPerdu() == 1)
  {
    header("Location: lose.php");
  }
  ?>
  <div class="grid-container">
<?php
function color($v, $x, $y)
{
    $pos1 = $v->getPos();
    foreach ($pos1['x'] as $v)
    {
      foreach ($pos1['y'] as $w)
      {
        if($v == $x && $w == $y)
          return 1;
      }
    }
    return 0;
}
while ($y < 20)
{
  while ($x < 20)
  {
    if(color($v1, $x, $y) && color($v2, $x, $y) == 0)
      echo '<div style="background-color:green;"></div>';
    else if(color($v2, $x, $y) && color($v1, $x, $y) == 0)
      echo '<div style="background-color:Tomato;"></div>';
    else if(color($v2, $x, $y) && color($v1, $x, $y))
    {
      if ($v1->getTurn() == 1)
      {
        $v1->setPerdu(1);
        $_SESSION['vaisseaux']['v2'] = serialize($v2);
        $_SESSION['vaisseaux']['v1'] = serialize($v1);
      }
      if ($v2->getTurn() == 1)
      {
        $v2->setPerdu(1);
        $_SESSION['vaisseaux']['v2'] = serialize($v2);
        $_SESSION['vaisseaux']['v1'] = serialize($v1);
      }
    }
    else
      echo '<div style="background-color:white;"></div>';
    $x++;
  }
  $x = 0;
  $y++;
}
if (($v1->getTurn() && $v1->nbtir) || ($v2->getTurn() && $v2->nbtir))
if ($tir = $v1->tir($v2))
{
  echo'<form action="game.php" method="post">
  <button type="submit" name="tir" value="'.$tir.'">Tirer</button>
  </form>';
  print_r($tir);
}
?>
</div>
<form action="move.php" method="post">
  <button type="submit" name="submit" value="gauche"><img src="gauche.png"></button>
  <button type="submit" name="submit" value="droite"><img src="droite.png"></button>
  <button type="submit" name="submit" value="haut"><img src="haut.png"></button>
  <button type="submit" name="submit" value="bas"><img src="bas.png"></button>
</form>
<?php
if ($v1->nbmv == 0 && $v1->getTurn())
{
  ?><form action="game.php" method="post">
    <button type="submit" name="fin" value="v2">End Turn</button>
  </form><?php
}
if ($v2->nbmv == 0 && $v2->getTurn())
{
  ?><form action="game.php" method="post">
    <button type="submit" name="fin" value="v1">End Turn</button>
  </form><?php
}
?>
</body>
</html>
