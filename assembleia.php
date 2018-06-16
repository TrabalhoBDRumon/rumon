<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rumon</title>
    <meta charset="UTF-8">
    <meta name="description" content="Labs - Design Studio">
    <meta name="keywords" content="lab, onepage, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/flaticon.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader">
            <img src="img/logo_rumon.png" alt="">
            <h2>Loading.....</h2>
        </div>
    </div>


    <!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="img/logo_rumon.png" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				<li><a href="home.html">Home</a></li>
				<li><a href="rep.php">Rep�blica</a></li>
				<li><a href="pessoas.php">Pessoas</a></li>
				<li class="active"><a href="assembleia.php">Assembleia</a></li>
				<li><a href="patrimonio.php">Patrim�nio</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->

<br><br><br>

    <!-- Contact section -->
    <div class="contact-section spad fix">
        <div class="container">
            <div class="row">
                <!-- contact info -->
                <div class="col-md-5 col-md-offset-1 contact-info col-push">
                    <div class="section-title left">
                        <h1>Pesquisa de presen�a </h1>
                    </div>
                    
                    <select id="assembleia">
                        <option>Escolha a assembleia:</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <br><br>
                    <table class = "table">
                         <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                            </tr>
                          </tbody>

                    </table>
                </div>
                <!-- contact form -->
                <div class="col-md-6 col-pull">
                    <form class="form-class" id="con_form">
                        <div class="row">
                            <div class="section-title left"> <h1>Cadastro de Assembleia</h1></div>
                            <h2>Data:</h2><br><div class="col-sm-6">
                               
                                <input type="date" name="data_assembleia">
                            </div>
                            <div class="col-sm-12">
                                <button class="site-btn" name="cadastroassembleia">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact section end-->


    <!-- Footer section -->
    <footer class="footer-section">
        <h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
    </footer>
    <!-- Footer section end -->



    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
    <script src="js/map.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
