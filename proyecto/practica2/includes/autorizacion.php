<?php

function estaLogado()
{
  return isset($_SESSION['login']);
}