<?php
  include_once "php/AnalyticsTracking.php";

  require_once "php/Application.php";
  require_once "php/Views.php";
  require_once "php/DBServer.php";
  require_once "php/Charter.php";

  $app = new Application("./config/config.json");
  $view = new Views($app);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minecraft Server Tracking</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-bottom: 40px;
      }
    </style>
  </head>
  <body>
    <header class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Minecraft Server Tracking</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="http://ttaylorr.com">Made with <span style="color:red;">&hearts;</span> by ttaylorr</a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div class="container">
      <h2>Tracked Servers <small>Updated every minute</small></h2>
      <?php
        echo($view->buildServerTables());
        $charter = new Charter($app);
      ?>
      <ul class="nav nav-tabs">
        <li class="active"><a href="#" data-name="line">Line Graph</a></li>
        <li><a href="#" data-name="scatter">Scatter Chart</a></li>
        <li><a href="#" data-name="stackedArea">Stacked Area</a></li>
        <li><a href="#" data-name="stackedColumn">Stacked Column</a></li>
        <li><a href="#" data-name="stackedBar">Stacked Bar</a></li>
      </ul>
      <div id="chart" style="height: 525px; width: 100%;"></div>

      <script src="js/jquery-2.1.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/canvasjs.min.js"></script>
      <script src="js/app.min.js"></script>
      <script>
        renderPage(<?php echo $charter->render(); ?>);
      </script>
    </div>
    <footer style="padding-top: 48px;text-align:center;">
      <div class="container text-muted">
        Check us out on <a href="https://github.com/ttaylorr/mc">Github</a>!<br/>
        &copy; <a href="http://ttaylorr.com">Taylor Blau</a> 2014, All Rights Reserved<br/><br/>
        <?php echo $app->rev(); ?>
      </div>
    </footer>
  </body>
</html>
