<?php

class Dice
{
  const MAX = 6;
  const MIN = 1;

  public function lancer()
  {
    return(rand(self::MIN, self::MAX));
  }
}
?>
