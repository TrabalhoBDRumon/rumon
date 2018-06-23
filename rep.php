<?php

use Rumon\Database\Republica;
use Rumon\Database\Pessoa;

require_once 'adm/ClassRepublica.php';
require_once 'adm/ClassPessoa.php';

function generoRep($idTipo){

    switch($idTipo){
        case 1:
            $genero = "Masculina";
            break;
        case 2:
            $genero = "Feminina";
            break;
        case 3:
            $genero = "Mista";
            break;
        default:
            break;    
    }
    return $genero;
}
$rep = new Republica();


if (isset($_POST['cadastrarrep'])) {
    $rep->setNome($_POST['nomerep']);
    $rep->setSite($_POST['siterep']);
    $rep->setFundacao($_POST['fundacaorep']);
    $rep->setEmail($_POST['emailrep']);
    $rep->setTipo($_POST['tiporep']);
    $rep->setFacebook($_POST['facerep']);
    $rep->setTelefone($_POST['telrep']);
    $rep->insert();

    $result = $rep->insert();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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
				<li class="active"><a href="rep.php">República</a></li>
				<li><a href="pessoas.php">Pessoas</a></li>
				<li><a href="assembleia.php">Assembleia</a></li>
				<li><a href="patrimonio.php">Patrimônio</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->
        <br><br><br>
	<div class="contact-section spad fix">
        <div class="container">
            <?php
            if (isset($result)) {
                ?>
                <div class="alert alert-success">
                    <?php echo 'República Cadastrada com Sucesso!'; ?>
                </div>
                <?php
            } else if (isset($error)) {
                ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
                <?php
            }
            ?>
            
            <div class="col-md-12">
                <!-- contact info -->
                <div class="col-md-6">
                    <div class="section-title left">
                        <h1>Pesquisa República</h1>
                    </div>
                    
                    <form class="form-class" id="con_form">
                        
                            
                            <h2>Digite o nome:</h2><br>
                               
                                <input type="text" name="nomerep" class="col-md-3">
                            
                            <div class="text-right">
                                <button class="site-btn" name="botaopesquisarrep">Pesquisar</button>
                            </div>
                        
                    </form>
                    
                    
                    <table class="table" style="background-color: white;">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Tipo</th>
                          <th>Telefone</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <?php
                        if(isset($_GET['nomerep'])){
                            $nomeRepublica = $_GET['nomerep'];
                            $reps = $rep->buscaRep($nomeRepublica);
                            foreach($reps as $r){
                                echo "<td>$r->r_nome</td>";
                                echo "<td>".generoRep($r->r_tipo)."</td>";
                                echo "<td>$r->r_telefone</td>";
                                echo "</tr>";
                                echo "</tbody>";
                                $pessoa = new Pessoa();
                                $moradores = $pessoa->moraRepublica($r->r_id);
                                echo "</table>";
                                echo '<table class="table" style="background-color: white;">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Apelido</th>";
                                echo "<th>Nome</th>";
                                echo "<th>Celular</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($moradores as $morador){
                                    echo "<tr>";
                                    echo "<td>$morador->p_apelido</td>";
                                    echo "<td>$morador->p_nome</td>";
                                    echo "<td>$morador->p_celular</td>";
                                    echo "</tr>";
                                }
                            }
                            
                        }
                      ?>
                      </tbody>
                      </table>
                </div>
                <!-- contact form -->
                <div class="col-md-6">
                    <form class="form-class" id="con_form" method="post">
                        <div class="row">
                            <div class="section-title left"><h1>Cadastro de República</h1></div>
                            <h2>Nome:</h2><div class="">
                                <input type="text" name="nomerep">
                            <h2>Site:</h2><div class="">
                                <input type="text" name="siterep">
                            <h2>Data de Fundação:</h2>
                                <input type="date" name="fundacaorep">
                            <h2>Email:</h2>
                                    <input type="text" name="emailrep">
                            <h2>Tipo:</h2>
                                    <input type="text" name="tiporep">
                            <h2>Facebook:</h2>
                                <input type="text" name="facerep">
                            <h2>Telefone:</h2>
                                <input type="text" name="telrep">    
                                <button class="site-btn" name="cadastrarrep">Cadastrar</button>
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
