<?php

namespace App\Helpers;

class Database
{

  private $dbc;

  function __construct()
  {
    $this->dbc = mysqli_connect(
      env('DB_HOST'),
      env('DB_USERNAME'),
      env('DB_PASSWORD'),
      env('DB_DATABASE')
    ) or die('Error connecting to database.');
  }

  function query($query)
  {
    return mysqli_query($this->dbc, $query) or die('Error querying database.');
  }

  function __destruct()
  {
    mysqli_close($this->dbc);
  }

}
