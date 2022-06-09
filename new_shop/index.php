<?php
  session_start();
  mb_internal_encoding("UTF-8");

  function classAutoloader($class) {
      if (preg_match('/Controller$/', $class)) {
          require_once('controllers/' . $class . '.php');
      } else {
          require_once('models/' . $class . '.php');
      }
  }

  spl_autoload_register("classAutoloader");

  $router = new RouterController();
  
  $router->process(array($_SERVER['REQUEST_URI']));

  $router->renderView();
?>