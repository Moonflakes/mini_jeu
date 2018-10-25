<?php
//style="backgound-color:green;"
include_once 'vaisseaux.class.php';
include_once 'Dice.class.php';
session_start();
/*class vaisseaux1 /*extends vaisseaux
{
  private $_pos;

  public function __construct($array)
  {
    $this->_pos = $array;
  }

  public function getPos()
  {
    return $this->_pos;
  }

  public function move($mv)
  {
    if ($mv === "droite")
    {
    foreach($this->_pos['x'] as $k => $v)
      if ($v < 19)
        $this->_pos['x'][$k] = $v + 1;
    }
  }
}*/
$pos = array('x' => array(0,1,0,1), 'y' => array(0,0,1,1));
$v1 = new vaisseaux1($pos, 1);
$pos = array('x' => array(19, 18, 18, 19), 'y' => array(19, 19, 18, 18));
$v2 = new vaisseaux1($pos, 0);
$_SESSION['vaisseaux']['v2'] = serialize($v2);
$_SESSION['vaisseaux']['v1'] = serialize($v1);
$des = new Dice;
$_SESSION['des'] = serialize($des);
//print_r($_SESSION);
?>
