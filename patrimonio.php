<?php

use Rumon\Database\Patrimonio;
use Rumon\Database\Aluga;
use Rumon\Database\Republica;

require_once 'adm/ClassPatrimonio.php';
require_once 'adm/ClassAluga.php';
require_once 'adm/ClassRepublica.php';


$patri = new Patrimonio();

if(isset($_POST['cadastrarpatrimonio'])){
    $patri->setNome($_POST['nomepatrimonio']);
    $patri->setDescricao($_POST['descpatrimonio']);
    $patri->setValor($_POST['valorpatrimonio']);
    $patri->setMulta($_POST['multapatrimonio']);
    $patri->insert();

    $result = $patri->insert();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Rumon</title>
    <meta charset="utf-8">
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
				<li><a href="rep.php">República</a></li>
				<li><a href="pessoas.php">Pessoas</a></li>
				<li><a href="assembleia.php">Assembleia</a></li>
				<li class="active"><a href="patrimonio.php">Patrimônio</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->
<br><br><br>


    <!-- Contact section -->
    <div class="contact-section spad fix">
        <div class="container">

            <?php
            if (isset($result)) {
                ?>
                <div class="alert alert-success">
                    <?php echo 'Patrimônio Cadastrada com Sucesso!'; ?>
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
                        <h1>Pesquisa Patrimônio</h1>
                    </div>
                    
                    <form class="form-class" id="con_form">
                        <select name="idpatrimonio" class="col-md-3">
                            <option>Escolha patrimônio:</option>
                            <?php
                                $patrimonios = $patri->mostraPatrimonio();
                                foreach($patrimonios as $p){
                                    echo '<option value="'.$p->patri_id.'">'.$p->patri_nome.'</option>';
                                }
                            ?>
                        </select>
                        <div class="text-right">
                                <button class="site-btn" name="pesquisarpatrimonio">Pesquisar</button>
                        </div>
                    </form>
                    <?php
                        if(isset($_GET['idpatrimonio'])){
                            $idpatrimonio = $_GET['idpatrimonio'];
                            $pat = $patri->patrimonioID($idpatrimonio);
                            echo "<h3>$pat->patri_nome</h3><br><br>";
                        }
                    ?>
                    <table class="table" style="background-color: white;">
                      <thead>
                        <tr>
                          <th>República</th>
                          <th>Situação</th>
                          <th>Emprestimo</th>
                          <th>Devolução</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $aluga = New aluga();
                            $alug = $aluga->buscaAluguel($idpatrimonio);
                            foreach($alug as $alu){
                                $rep = new Republica();
                                echo "<tr>";
                                $repu = $rep->buscaRepID($alu->id_rep_alugou);
                                foreach($repu as $rp){
                                    
                                    echo "<td>".$rp->r_nome."</td>";
                                }
                                if($alu->situacao == "S") echo "<td>Disponível</td>";
                                else echo "<td>Indisponível</td>";
                                echo "<td>".$alu->data_emprestimo."</td>";
                                echo "<td>".$alu->data_devolucao."</td>";
                                echo "</tr>";
                            }
                        ?>
                        
                      </tbody>
                    </table>
                </div>
                <!-- contact form -->
                <div class="col-md-6">
                    <form class="form-class" id="con_form" method="post">
                        <div class="row">
                            <div class="section-title left"><h1>Cadastro de Patrimonio</h1></div>
                            <h2>Nome:</h2><div class="">
                                <input type="text" name="nomepatrimonio">
                            <h2>Descrição:</h2>
                                <textarea name="descpatrimonio"></textarea>
                            <h2>Valor:</h2>
                                <input type="text" name="valorpatrimonio">
                            <h2>Multa:</h2>
                                <input type="text" name="multapatrimonio">
                                <button class="site-btn" name="cadastrarpatrimonio">Cadastrar</button>
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

