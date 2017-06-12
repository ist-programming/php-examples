<?php

/**
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
interface Request
{
  /**
   * 
   * @param string $name
   * @return string Value
   */
  public function getParameter($name);
}
