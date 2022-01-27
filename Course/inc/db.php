<?php

$conn = mysqli_connect('localhost','root','root','users');

if(!$conn)
{echo "Error:". mysqli_connect_error() ;}

?>