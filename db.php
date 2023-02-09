<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'konectaprueba'
) or die(mysqli_error($mysqli));
