<?php

use Rumon\Database\Pessoa;
use Rumon\Database\Republica;

require_once 'adm/ClassPessoa.php';
require_once 'adm/ClassRepublica.php';

$pessoa = new Pessoa();

if (isset($_POST['cadastrarpessoa'])) {
    $pessoa->setCpf($_POST['cpfpessoa']);
    $pessoa->setRg($_POST['rgpessoa']);
    $pessoa->setNome($_POST['nomepessoa']);
    $pessoa->setTipo($_POST['tipopessoa']);
    $pessoa->setCarteirinha($_POST['carteirinhapessoa']);
    $pessoa->setNasc($_POST['nascpessoa']);
    $pessoa->setCelular($_POST['celpessoa']);
    $pessoa->setApelido($_POST['apelidopessoa']);
    $pessoa->setFaculdade($_POST['facupessoa']);
    $pessoa->setRepID((int)$_POST['rep_id']);
    $pessoa->insert();

    $result = $pessoa->insert();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
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
                    <li><a href="rep.php">República</a></li>
                    <li class="active"><a href="pessoas.php">Pessoas</a></li>
                    <li><a href="assembleia.php">Assembleia</a></li>
                    <li><a href="patrimonio.php">Patrimônio</a></li>
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
                        <?php echo 'Pessoa Cadastrada com Sucesso!'; ?>
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
                            <h1>Pesquisa Pessoa</h1>
                        </div>

                        <form class="form-class" id="con_form">


                            <h2>Digite o apelido:</h2><br>

                            <input type="text" name="nomepessoa" class="col-md-3">

                            <div class="text-right">
                                <button class="site-btn" name="botaopesquisarpessoa">Pesquisar</button>
                            </div>

                        </form>


                        <table class="table" style="background-color: white;">
                            <thead>
                                <tr>
                                    <th>Apelido</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_GET['nomepessoa'])){
                                        $apelido = $_GET['nomepessoa'];
                                        $pessoas = $pessoa->buscaPessoa($apelido);
                                        foreach($pessoas as $p){
                                            echo "<tr>";
                                            echo "<td>$p->p_apelido</td>";
                                            echo "<td>$p->p_nome</td>";
                                            echo "<td>$p->p_celular</td>";
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
                                <div class="section-title left"><h1>Cadastro de Pessoa</h1></div>
                                <h2>CPF:</h2>
                                <input type="text" name="cpfpessoa">
                                <h2>RG:</h2>
                                <input type="text" name="rgpessoa">
                                <h2>Nome:</h2>
                                <input type="text" name="nomepessoa">
                                <h2>Tipo(Calouro/Morador/Decano):</h2><br />
                                <select required name="tipopessoa">
                                    <option value="1">Calouro</option>
                                    <option value="2">Morador</option>
                                    <option value="3">Decano</option>
                                </select><br />
                                <h2>Carteirinha</h2>
                                <input type="text" name="carteirinhapessoa">
                                <h2>Data:</h2>
                                <input type="date" name="nascpessoa">
                                <h2>Celular:</h2>
                                <input type="text" name="celpessoa">
                                <h2>Apelido:</h2>
                                <input type="text" name="apelidopessoa">
                                <h2>Faculdade</h2>
                                <input type="text" name="facupessoa">

                                <select id="reppessoa" name="rep_id">
                                    <?php
                                        echo '<option>República:</option>';
                                        $republica = new Republica();
                                        $reps = $republica->view();
                                        foreach($reps as $rep){
                                            echo '<option value="'.$rep->r_id.'">'.$rep->r_nome.'</option>';
                                        }
                                    ?>
                                </select><br />

                                <button class="site-btn" name="cadastrarpessoa">Cadastrar</button>  
                        </form>

                    </div>
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
