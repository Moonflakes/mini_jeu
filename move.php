<?php
include_once 'vaisseaux.class.php';
session_start();
$v1 = unserialize($_SESSION['vaisseaux']['v1']);
$v2 = unserialize($_SESSION['vaisseaux']['v2']);
if ($v1->nbmv > 0 && $v1->getTurn())
{
  if ($_POST['submit'] == "droite")
  {
    $v1->move("droite");
    $v1->nbmv = $v1->nbmv - 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
  if ($_POST['submit'] == "gauche")
  {
    $v1->move("gauche");
    $v1->nbmv = $v1->nbmv- 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
  if ($_POST['submit'] == "haut")
  {
    $v1->move("haut");
    $v1->nbmv = $v1->nbmv- 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
  if ($_POST['submit'] == "bas")
  {
    $v1->move("bas");
    $v1->nbmv = $v1->nbmv- 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
}
else if ($v2->nbmv > 0 && $v2->getTurn())
{
  if ($_POST['submit'] == "droite")
  {
    $v2->move("droite");
    $v2->nbmv = $v2->nbmv - 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
  if ($_POST['submit'] == "gauche")
  {
    $v2->move("gauche");
    $v2->nbmv = $v2->nbmv- 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
  if ($_POST['submit'] == "haut")
  {
    $v2->move("haut");
    $v2->nbmv = $v2->nbmv- 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
  if ($_POST['submit'] == "bas")
  {
    $v2->move("bas");
    $v2->nbmv = $v2->nbmv- 1;
    $_SESSION['vaisseaux']['v2'] = serialize($v2);
    $_SESSION['vaisseaux']['v1'] = serialize($v1);
    header("Location: game.php");
  }
}
else
  header("Location: game.php");
?>
