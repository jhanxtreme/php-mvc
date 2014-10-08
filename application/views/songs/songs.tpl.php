<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo BASE_PATH.'public'.DS.'css'.DS.'bootstrap-3.2.0-minified'.DS.'css'.DS.'bootstrap.min.css' ?>" >
	<link rel="stylesheet" href="<?php echo BASE_PATH.'public'.DS.'css'.DS.'default.css' ?>" >
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<div class="navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./#">JhanMateo Project</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
    	    <?php if(isset($menu)): ?>
				<!--li><a href='<?php echo BASE_PATH?>home'>Home</a></li-->
				<?php foreach ($menu as $page => $link): ?>
					<?php if($page != 'home'): ?>
						<li <?php if(str_replace("/","",$_SERVER['REQUEST_URI']) == $page):?>class='active'<?php endif;?>>
							<a href="<?php echo $link; ?>"><?php echo ucwords($page); ?></a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

		<?php if(isset($title)): ?>
			<h1><?php echo $title; ?></h1>
		<?php endif; ?>
		
		<?php if(isset($songs)): ?>
			<div class="list-group">
				 <a href="#" class="list-group-item disabled">
				    Playlist
				  </a>
				<?php foreach($songs as $song): ?>
					<a href="#" class="list-group-item"><?php echo $song['title'] . ' - ' . $song['artist']?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		
	</div><!-- /.container -->



<script type="text/javascript" src="<?php echo BASE_PATH.'public'.DS.'js'.DS.'jquery-1.11.1.js' ?>"></script>
<script type="text/javascript" src="<?php echo BASE_PATH.'public'.DS.'css'.DS.'bootstrap-3.2.0-minified'.DS.'js'.DS.'bootstrap.min.js' ?>"></script>

</body>
</html>
