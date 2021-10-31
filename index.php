<?php

if (isset($_GET['url'])) {
  $url = $_REQUEST['url'];
  switch ($url) {
    case 'librapy':
      include 'librapy.php';
      break;
    case 'form':
      include 'form.php';
      break;
  }
}

?>