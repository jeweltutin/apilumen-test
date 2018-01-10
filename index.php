<?php
//$fetchPosts = file_get_contents('http://localhost:8000/api/v1/posts/index');
//echo $fetchPosts;
//$decodedPosts = json_decode($fetchPosts, true);

require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'http://localhost:8000/api/v1/posts/index', [
    'headers' => [
        'User-Agent' => 'testing/1.0',
        'Accept'     => 'application/json',
        'api_token'      => ['HppIxNGGANQA2bEhnZpo2y1x9Fn8x81sT76SRvcx5IPuwIbXM7zg1b42tSVx']
    ]
]);
//echo $res->getStatusCode();
// "200"
//echo $res->getHeader('content-type');
// 'application/json; charset=utf8'
if($res->getStatusCode() == 200){
	$decodedPosts = json_decode($res->getBody(),true);
}else{
	echo "Something wrong";
}

?>


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

    <title>Lumen API test</title>

	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Lumen api test</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="POST" action="http://localhost:8000/api/v1/users/add">
			<!--<input type="hidden" name="_method" value="put">-->
			<div class="form-group">
              <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
		<?php	
		//print_r($decodedPost);
		foreach($decodedPosts as $dpost){ ?>
			<div class="col-md-4">
			  <h2><?php echo $dpost['title']; ?></h2>
			  <p><?php echo $dpost['body']; ?> </p>
			  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div>
		<?php } ?>

      </div>

      <hr>

      <footer>
        <p>&copy; 2018 Jeweltutin, Inc.</p>
      </footer>
    </div> <!-- /container -->

  </body>
</html>
