<?php

include_once "requete.php";
include_once "function.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Facebook Theme Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	[if lt IE 9]
	<script src="html5shim.googlecode.com/svn/trunk/html5.js"></script>
	[endif]

	<link href="assets/css/facebook.css" rel="stylesheet">
</head>

<body>
	<h1>earwerzweur</h1>
	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">

				<!-- sidebar -->
				<div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

					<ul class="nav">
						<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
					</ul>

					<!--MEnu personaliser avec home et post  -->
					<ul class="nav hidden-xs" id="lg-menu">
						<li class="active"><a href="home.php"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
						<li><a href="post.php"><i class="glyphicon glyphicon-list"></i> Post</a></li>

					</ul>
					<ul class="list-unstyled hidden-xs" id="sidebar-footer">
						<li>
							<a href="http://usebootstrap.com/theme/facebook">
								<h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply
							</a>
						</li>
					</ul>

					<!-- tiny only nav-->
					<ul class="nav visible-xs" id="xs-menu">
						<li><a href="" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
						<li><a href="#" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
						<li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
						<li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
					</ul>

				</div>
				<!-- /sidebar -->

				<!-- main right col -->
				<div class="column col-sm-10 col-xs-11" id="main">

					<!-- top nav -->
					<div class="navbar navbar-blue navbar-static-top">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="http://usebootstrap.com/theme/facebook" class="navbar-brand logo">b</a>
						</div>
						<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm" style="max-width:360px;">
									<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
							<ul class="nav navbar-nav">
								<li>
									<a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
								</li>
								<li>
									<a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
								</li>
								<li>
									<a href="#"><span class="badge">badge</span></a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
									<ul class="dropdown-menu">
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
					<!-- /top nav -->

					<div class="padding">
						<div class="row">



							<?php

							$allpostcontent = getAllPost();
							$nbpost = count($allpostcontent);
							//var_dump($allpostcontent);
							//var_dump($nbpost);

							for ($i = 0; $i < $nbpost; $i++) {

								$idPost = $allpostcontent[$i]["idPost"];
								$allImageForThePost = GetallImage($idPost);

								//	var_dump($allImageForThePost);
								$nbimage = count($allImageForThePost);
								echo '<div class="row">';
								echo '<div class="card" ></div>
<div class="card">
	<div class="card-body " style="width: 800 px ;height: 600;">
		<div class="carousel slide" data-ride="carousel" id="carousel-' . $i . '">
			<div class="carousel-inner" role="listbox">';
								for ($j = 0; $j < $nbimage; $j++) {
									if ($j == 0) {
										echo ' <div class="carousel-item active" style="height: 510px;width: 800px;"><img class="w-100 d-block" src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '" alt="Slide Image" style="height: 276;width: 800px;"></div>';
									} else {
										echo ' <div class="carousel-item " style="height: 510px;width: 800px;"><img class="w-100 d-block"
src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '" alt="Slide Image"
style="height: 500;width: 100%;"></div>';
									}
								}
								echo '</div>
			<div><a class="carousel-control-prev" href="#carousel-' . $i . '" role="button" data-slide="prev"><span
						class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a
					class="carousel-control-next" href="#carousel-' . $i . '" role="button" data-slide="next"><span
						class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
			<ol class="carousel-indicators">';
								for ($h = 0; $h < $nbimage; $h++) {
									if ($h == 0) {
										echo '<li data-target="#carousel-' . $i . '" data-slide-to="' . $h . '" class="active"></li>';
									} else {
										echo '<li data-target="#carousel-' . $i . '" data-slide-to="' . $h . '"></li>';
									}
								}
								echo '</ol>
			</div>
			<p class="card-text">' . $allpostcontent[$i]["commentaire"] . '</p>
		</div>
	</div>';
								echo '</div>';
							}


							?>
							</table>
							<!-- main col left -->
							<style>
								#toto {
									width: 900px;
									height: auto;
									border: solid black;
									background-color: red;

								}
							</style>


							<p>45 Followers, 13 Posts</p>

						</div>

					</div>

				</div>
				<!--/row-->

				<div class="row">
					<div class="col-sm-6">
						<a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
					</div>
				</div>

				<div class="row" id="footer">
					<div class="col-sm-6">

					</div>
					<div class="col-sm-6">
						<p>
							<a href="#" class="pull-right">�Copyright 2013</a>
						</p>
					</div>
				</div>

				<hr>

				<h4 class="text-center">
					<a href="http://usebootstrap.com/theme/facebook" target="ext">Download this Template @Bootply</a>
				</h4>

				<hr>


			</div><!-- /col-9 -->
		</div><!-- /padding -->
	</div>
	<!-- /main -->

	</div>
	</div>
	</div>


	<!--post modal-->
	<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
					Update Status
				</div>

				<!---
Zone pour upload form#################################################################
-->
				<div class="modal-body">
					<form enctype="multipart/form-data" class="form center-block" action="uploadimage.php" method="POST">
						<div class="form-group">
							<textarea class="form-control input-lg" name="Text" placeholder="Que voulez vous partager"></textarea>

						</div>

				</div>
				<div class="modal-footer">
					<div>

						<!--
						<button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true"></button>
						--->
						<input class="btn btn-primary btn-sm" name="submit" value="submit" type="submit">
						<ul class="pull-left list-inline">
							<!---<li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>-->
							<input multiple=true enctype="multipart/form-data" accept="image/*" class="glyphicon glyphicon-upload" type="file" name="image[]">
							<input type="hidden" name="MAX_FILE_SIZE" value="3145728" />

						</ul>

					</div>
				</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/jquery.js">
	</script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-toggle=offcanvas]').click(function() {
				$(this).toggleClass('visible-xs text-center');
				$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
				$('.row-offcanvas').toggleClass('active');
				$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
				$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
				$('#btnShow').toggle();
			});
		});
	</script>
</body>

</html>