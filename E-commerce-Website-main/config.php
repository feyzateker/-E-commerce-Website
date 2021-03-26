<?php
  $db = mysqli_connect('localhost', 'root', '', 'group_9');
  if ($db->connect_errno > 0)
  {
    die('Unable to connect.');
  }
  session_start();

?>