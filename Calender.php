<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="MyCalender.css">

    <title>My Calender</title>
  </head>
  <body>
      <div class="kotak">
        <div class="title">
          <h2>My Calendar</h2>
        </div>
	  <?php include 'MyCalender.php' ?>
      <?php 
      $month = 1;
      for($i=1; $i<=4; $i++){ ?> 
        <div class="row">
            <?php for($j=1;$j<=3; $j++){ ?>
            <div class="column">
                <?php 
                    display_month($month,2019) ;
                    $month++;
                ?>
            </div>
        <?php 
          }
        ?>
        </div>
        <?php }
			echo "<h2>National Holidays 2019 :</h2>";
            foreach ($Holiday as $key => $value) {
                echo "$key : $value<br>";
            }
        ?>
      </div>
  </body>
</html>
