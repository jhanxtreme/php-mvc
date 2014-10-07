<!DOCTYPE>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo BASE_PATH.DS.'public'.DS.'css'.DS.'default.css' ?>" />
</head>
<body>

<div class='top'>
<?php if(isset($menu)): ?>
	<div class="menu">
		<ul>
			<li><a href='<?php echo BASE_PATH?>home'>Home</a></li>
			<?php foreach ($menu as $page => $link): ?>
				<?php if($page != 'home'): ?>
					<li><a href="<?php echo $link; ?>"><?php echo ucwords($page); ?></a></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
</div>

<div class='body'>
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($employees as $employee): ?>
		<li><?php echo $employee['name']; ?> - <?php echo $employee['department']; ?> - <?php echo $employee['position']; ?></li>
	<?php endforeach; ?>
	</ul>
</div>

<div>
</div>

</body>


</html>
