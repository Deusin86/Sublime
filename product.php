<?php
	include 'ligacao/conn.php';
	require_once 'funcoes/funcoes.php';

	//$query_comments = mysqli_fetch_array(mysqli_query($conn,"SELECT count(*) FROM comentarios"));
	$idx = $_GET['produto'];
	$dados = (mysqli_query($conn,"SELECT count(id_comentario) as numero_comentarios FROM comentarios where id_produto like $idx"));
	$query_comments = $dados->fetch_assoc();
	//$comments=$query_comments["numero_comentarios"];
	if(!$dados)
	include 'ligacao/desconn.php';

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Productos</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
	 $("#reviews").hide();
});

$(document).ready(function(){
	 $(".comment").hide();
});

</script>

</head>
<body>
<div class="super_container">

	<!-- Header -->

	<?php
	include("header.php");
	?>

	<script type="text/javascript">
	$(document).ready(function){

		document.getElementById("addcart").onclick = function () {
				<?php

				if ($_SESSION['id_registo']==null) {
					$url_go_to="login.php";
				}
				else {
					$url_go_to="cart.php";
				}
				?>
				};

	});
</script>

<!-- Menu -->
	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">

				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<a href="index.html">Home<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Smart Phones<span>.</span></div>
								<div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="images/details_1.jpg" alt=""><div class="product_extra product_new"><a href="categories.html">New</a></div></div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							<div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="images/details_1.jpg" alt=""></div>
							<div class="details_image_thumbnail" data-image="images/details_2.jpg"><img src="images/details_2.jpg" alt=""></div>
							<div class="details_image_thumbnail" data-image="images/details_3.jpg"><img src="images/details_3.jpg" alt=""></div>
							<div class="details_image_thumbnail" data-image="images/details_4.jpg"><img src="images/details_4.jpg" alt=""></div>
						</div>
					</div>
				</div>

				<!-- Product Content -->
				<?php
				include 'ligacao/conn.php';
				$idx = $_GET['produto'];
				$dados = (mysqli_query($conn,"SELECT id_produto, categoria, nome, preco_mercado, desconto, quantidade, descricao FROM produtos where id_produto like '$idx'"));
				$informacao = $dados->fetch_assoc();

			if($informacao['quantidade']>0){
				$disponibilidade="Disponivel";
				echo'
						<style>
							.teste{
								color:  #00cc00;
							}
						</style>
						<script>
						$(document).ready(function(){
							 $("#comprar").show();
						});
						</script>';
			}else{
				$disponibilidade="Indisponivel";
					echo '
							<style>
							 	.teste{
							 		color: red;
								}
							</style>

							<script>
							$(document).ready(function(){
								 $("#comprar").hide();
							});
							</script>';

			}

				if(!$dados)
				include 'ligacao/desconn.php';

				echo '

								<div class="col-lg-6">
									<div class="details_content">
										<div class="details_name">'.$informacao['nome'].'</div>
										<div class="details_discount">'.$informacao['desconto'].'</div>
										<div class="details_price">'.$informacao['preco_mercado'].'</div>

										<!-- In Stock -->
										<div class="in_stock_container">
											<div class="availability">Availability:</div>
											<span class="teste">'.$disponibilidade.'</span>

										</div>
										<div class="details_text">
											<p>'.$informacao['descricao'].'</p>
										</div>

										<!-- Product Quantity -->
										<div id="comprar" class="product_quantity_container">
											<div class="product_quantity clearfix">
												<span>Qty</span>
												<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
												<div class="quantity_buttons">
													<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
													<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
												</div>
											</div>
											<div class="button cart_button"><a href="' . $url_go_to . '">Add to cart</a></div>
										</div>

										<!-- Share -->
										<div class="details_share">
											<span>Share:</span>
											<ul>
												<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>';

				 ?>

			</div>
			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
					<div class="description_title"><a href="#descricao" onclick="return theFunction1();">Descrição</a>
						<script>
							function theFunction1(){
								$(document).ready(function(){
									 $("#reviews").hide();
								});

								$(document).ready(function(){
									 $(".comment").hide();
								});

								$(document).ready(function(){
									 $("#description").show();
								});
							}

						</script>
					</div>

						<div class="reviews_title"><a href="#comentarios" onclick="return theFunction2();">Comentários
						<span>
						<?php echo'('.$query_comments['numero_comentarios'].')'; ?>
						</span></a>

							<script>
								function theFunction2(){
									$(document).ready(function(){
										 $("#description").hide();
									});

									$(document).ready(function(){
										 $("#reviews").show();
									});

									$(document).ready(function(){
										 $(".comment").show();
									});

									<?php
									$query = "SELECT produtos.id_produto,comentarios.comentario,comentarios.data,comentarios.nome,registo.nome FROM comentarios inner join registo on comentarios.nome=registo.id_registo inner join produtos on comentarios.id_produto=produtos.id_produto where comentarios.id_produto=$idx";
									$search_result = tabelafil($query);

									function tabelafil($query)
									{
										include 'ligacao/conn.php';
										$resultados_fil = mysqli_query($conn,$query);
										return $resultados_fil;

									}

									 ?>

								}
							</script>

						</div>

					</div>
					<?php
					echo '<div id="description" class="description_text">
						<p>'.$informacao['descricao'].'</p>
					</div>
					 ';?>

					 <form id="reviews" method="post">
						 <br>
						 <h3>Dê-nos a sua opnião !</h3>
						 <div class="form-group">
						 <label for="exampleInputEmail1">Nome</label>
						 <input type="text" name="nome" class="form-control" aria-describedby="emailHelp">
						 </div>

					 		<div class="form-group">
					 		<label for="exampleTextarea">Comentario</label>
					 		<textarea class="form-control" name="comentario" rows="3"></textarea>
					 		</div>

					 		<div class="form-group">
					 		<label for="exampleInputEmail1">Data</label>
					 		<input type="date" class="form-control" name="data" aria-describedby="emailHelp">
					 		</div>
							<button type="submit" name="guardar" class="btn btn-success">Enviar !</button>
							<br>
							<br>
							<br>
					</form>

					<?php
					if(isset($_POST["guardar"])){
						include 'ligacao/conn.php';
						mysqli_query($conn,"INSERT INTO comentarios (id_produto, nome, comentario, data) VALUES ('11','$_POST[nome]','$_POST[comentario]','$_POST[data]')"); //BUUG HERE, nao adiciona !
						echo '<meta http-equiv="refresh" content"=0;url=product.php">';
						include 'ligacao/desconn.php';
						}
						?>

				<?php
				$comentarios_feitos=0;
				while ($emenu = mysqli_fetch_array($search_result)) {
				$comentarios_feitos++; //class"comment" é o formulario, com varios id e esconde lá em cima no script o formulario(comment) independetemente do id
		 		echo'
		 		<form id="$comentarios_feitos" class="comment">
				<h3>Comentários Feitos</h3>
		 		<div class="form-group">
		 		<label for="exampleInputEmail1">Nome</label>
		 		<input class="form-control"  value="'.$emenu['nome'].'">
		 		</div>

		 		<div class="form-group">
		 		<label for="exampleTextarea">Comentário</label>
		 		<textarea class="form-control">'.$emenu['comentario'].'</textarea>
		 		</div>

		 		<div class="form-group">
		 		<label for="exampleInputEmail1">Data</label>
		 		<input class="form-control" value="'.$emenu['data'].'">
		 		</div>

		 		</form>';
	 			}
	 	?>

				</div>

			</div>
		</div>
	</div>



	<!-- Related Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<div class="product_grid">

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="images/product_1.jpg" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$670</div>
							</div>
						</div>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="images/product_2.jpg" alt=""></div>
							<div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$520</div>
							</div>
						</div>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="images/product_3.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$710</div>
							</div>
						</div>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="images/product_4.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$330</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Subscribe to our newsletter</div>
						<div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Subscribe</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php
	include("footer.php");
	?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/product.js"></script>
</body>
</html>
