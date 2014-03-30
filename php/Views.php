<?php

require_once "DBServer.php";

class Views {
  private $app;

  function __construct($app) {
    $this->app = $app;
  }

  function buildServerTables() {
    $table = "<table class='table table-hover'>";
      $table .= "<thead>";
        $table .= "<tr>";
          $table .= "<th>ID</th>";
          $table .= "<th>Server Name</th>";
          $table .= "<th>Minecraft IP</th>";
          $table .= "<th>Website</th>";
        $table .= "</tr>";
      $table .= "</thead>";
      $table .= "<tbody>";
        $i = 1;
        foreach ($this->app->getServers() as $server) {
          $table .= "<tr>";
          $table .= "<td>".$i."</td>";
          $table .= "<td>".$server->getName()."</td>";
          $table .= "<td>".$server->getIpAddress()."</td>";
          $table .= "<td><a href='".$server->getWebsite()."'>".$server->getWebsite()."</a></td>";
          $table .= "</tr>";
          $i++;
        }
      $table .= "</tbody>";
    $table .= "</table>";

    return $table;
  }
}
