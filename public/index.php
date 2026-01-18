<?php
require "../Core/functions.php";
spl_autoload_register(function ($class) {
  $class = str_replace("\\", DIRECTORY_SEPARATOR, subject: $class);
  require base_path("{$class}.php");
});
require "../App/Models/Usuario.php";
session_start();

require "../routes.php";
