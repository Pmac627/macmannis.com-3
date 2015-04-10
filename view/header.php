<?php /* header.php */ ?>
<!DOCTYPE html>
<html lang="<?php echo $site['lang']; ?>">
<head>
	<meta charset="<?php echo $site['charset']; ?>" />
	<meta http-equiv="Content-Type" content="<?php echo $site['content_type']; ?>; charset=<?php echo $site['charset']; ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo $site['title']; ?> :: <?php echo $pg['title']; ?></title>
	<meta name="description" content="<?php echo $pg['descr']; ?>" />
	<meta name="keywords" content="<?php echo $pg['keywords']; ?>" />
	<meta name="robots" content="<?php echo $pg['index']; ?>,<?php echo $pg['follow']; ?>" />
	<meta name="google-site-verification" content="<?php echo $site['ga_code']; ?>" />
	<base href="<?php echo $site['base_url']; ?>" />
	<link href="humans.txt" rel="author" />
	<link href="<?php echo $site['base_url']; ?><?php echo $pg['canonical']; ?>" rel="canonical" />
	<link href="<?php echo $site['base_url']; ?>view/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $site['base_url']; ?>view/css/agency.css" rel="stylesheet" />
	<link href="<?php echo $site['base_url']; ?>view/css/fonts/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Kaushan+Script" type="text/css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" type="text/css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" type="text/css" rel="stylesheet" />
	<link href="<?php echo $site['base_url']; ?>view/img/favicon.png" rel="icon" type="image/x-icon" />
	<link href="<?php echo $site['base_url']; ?>view/img/favicon.png" rel="shortcut icon" type="image/x-icon" />
	<link href="<?php echo $site['base_url']; ?>view/img/macmannicon-57.jpg" rel="apple-touch-icon" sizes="57x57" />
	<link href="<?php echo $site['base_url']; ?>view/img/macmannicon-72.jpg" rel="apple-touch-icon" sizes="72x72" />
	<link href="<?php echo $site['base_url']; ?>view/img/macmannicon-114.jpg" rel="apple-touch-icon" sizes="114x114" />
	<link href="<?php echo $site['base_url']; ?>view/img/macmannicon-144.jpg" rel="apple-touch-icon" sizes="144x144" />
	<link href="<?php echo $site['base_url']; ?>view/img/macmannimage.jpg" rel="image_src" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" type="text/javascript"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<script>
		!function(g,s,q,r,d){r=g[r]=g[r]||function(){(r.q=r.q||[]).push(arguments)};d=s.createElement(q);q=s.getElementsByTagName(q)[0];d.src='//d1l6p2sc9645hc.cloudfront.net/tracker.js';q.parentNode.insertBefore(d,q)}(window,document,'script','_gs');_gs('GSN-618152-H');
	</script>
</head>
<body id="page-top" class="index" itemscope itemtype="http://schema.org/LocalBusiness">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top" title="<?php echo $site['title']; ?> :: <?php echo $pg['title']; ?>"><span itemprop="name">macmannis web development</span></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				<?php if($site['open'] == 1) { ?>
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
				<?php 
					echo $navHTML;
				} ?>
				</ul>
			</div>
		</div>
	</nav>
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-lead-in">Welcome To My Portfolio!</div>
				<div class="intro-heading">I'm Glad You Stopped By</div>
				<?php if($site['open'] == 1) { ?>
				<a href="<?php echo $firstId; ?>" class="page-scroll btn btn-xl" title="Tell Me More">Tell Me More</a>
				<?php } ?>
			</div>
		</div>
	</header>
