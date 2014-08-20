<?php

function h($var) {
  $html = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
  return $html;
}

