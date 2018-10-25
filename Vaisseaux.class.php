<?php
include_once 'vaisseaux.class.php';
class vaisseaux1
{
  private $_pos;
  private $_perdu = 0;
  public $nbmv = 5;
  public $nbtir = 1;
  private $_turn;

  public function __construct($array, $tu)
  {
    $this->_pos = $array;
    $this->_turn = $tu;
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
      else
        $this->_perdu = 1;
    }
    if ($mv === "gauche")
    {
    foreach($this->_pos['x'] as $k => $v)
      if ($v > 0)
        $this->_pos['x'][$k] = $v - 1;
      else
        $this->_perdu = 1;
    }
    if ($mv === "haut")
    {
    foreach($this->_pos['y'] as $k => $v)
      if ($v > 0)
        $this->_pos['y'][$k] = $v - 1;
      else
        $this->_perdu = 1;
    }
    if ($mv === "bas")
    {
    foreach($this->_pos['y'] as $k => $v)
      if ($v < 19)
        $this->_pos['y'][$k] = $v + 1;
      else
        $this->_perdu = 1;
    }
  }

  public function tir($v2)
  {
    $p = 100;
    $tab = array();
    $key = array();
    $posv2 = $v2->getPos();
     foreach ($this->_pos['x'] as $k => $v)
     {
       foreach ($posv2['x'] as $k2 => $w) {
         if($v == $w)
         {
          $tab[] = abs($this->_pos['y'][$k] - $posv2['y'][$k2]);
          }
       }
     }
     foreach ($this->_pos['y'] as $k => $v)
     {
       foreach ($posv2['y'] as $k2 => $w) {
         if($v == $w)
         {
          $tab[] = abs($this->_pos['x'][$k] - $posv2['x'][$k2]);
        }
       }
     }
     foreach ($tab as $k => $v) {
       if($p > $v)
       {
        $p = $v;
      }
    }
     return($p);
  }

  public function getPerdu()
  {
    return $this->_perdu;
  }
  public function setPerdu($i)
  {
    $this->_perdu = $i;
  }
  public function setTurn($t)
  {
    $this->_turn = $t;
  }
  public function getTurn()
  {
    return $this->_turn;
  }
}
 ?>
