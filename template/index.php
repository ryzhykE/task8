<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

           <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
          </head>

  <body>

    <div class="container">
        <div class="row">
        <div class="col-lg-3">
         <form class="form-signin"  method="POST" action="index.php">
            <h2 class="form-signin-heading">Please  enter query</h2>
            <label class="sr-only">query</label>
            <input type="text" name="query"  id="inputQuery" class="form-control" placeholder="Qery" required autofocus>
    
            <button class="btn btn-lg btn-primary btn-block" type="submit">Find</button>
        </form>
        </div>
        </div>
        <div class="container col-lg-10">
            <div style="margin-top: 20px;">
                <?if(isset($data) && is_array($data)):?>
                <?foreach($data as $values):?>
                <div class="panel panel-info">
                    <div class=panel-heading>
                        <a href="<?php echo $values['link']?>">
                            <h3 class=panel-title><?= $values['name']?></h3>
                        </a>
                    </div>
                    <div class=panel-body>
                        <?= $values['description']?>
                    </div>
                </div>
                <?endforeach;?>
                <?endif;?>
            </div>
        </div>
    </div> <!-- /container -->
  </body>
</html>


