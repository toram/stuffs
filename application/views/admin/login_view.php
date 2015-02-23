<?php

  $base = base_url();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Blog codeigniter</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=$base?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base?>public/css/blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-3">
          <div class="blog-header">
            <h3 class="blog-title"><a href="blog/">El Blog</a> / <span class="lead blog-description">Admin.</span></h3>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-offset-3">
          <?php echo validation_errors(); ?>
          <?php echo form_open("verifylogin"); ?>

            <div class="formgroup">
              <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" size="10" />
                <br />
            </div>

            <div class="formgroup">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" id="password" size="100" />
              <br />
            </div>

            <input type="submit" class="button" value="Login" />
          </form>

        </div>
      </div>
    </div>
</body>
</html>