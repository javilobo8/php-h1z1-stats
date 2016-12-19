<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div id="main">
        <span id="userName" class="userName text-center"></span>
        <div class="tierIcon"></div>
        <div class="table">
          <div class="row">
            <div id="tierDetails" class="text-center"></div>
          </div>
          <div class="row">
            <div id="killsPerMatch" class="text-center text-small"></div>
          </div>
          <div class="row">
            <div id="top" class="text-center text-small"></div>
          </div>
          <div class="row">
            <span>Wins/Losses</span>
            <span id="winsLosses"></span>
          </div>
          <div class="row">
            <span>Winrate</span>
            <span id="winsPerMatch"></span>
          </div>
          <div class="row">
            <span>Total Kills</span>
            <span id="totalKills"></span>
          </div>
          <div class="row">
            <span>Top 10 score</span>
            <span id="top10TotalScore"></span>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var name = '<?php echo $_REQUEST['name']; ?>';
      var filterKey = '<?php echo $_REQUEST['filterKey']; ?>';
    </script>
    <script src="h1z1.js"></script>
  </body>
</html>