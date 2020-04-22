<!doctype html>
<html lang="en">
<head>

    <?php

        include("\..\ligacao_bd.php");

    ?>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

     <title>SafeBet Admin - Editar Utilizador</title>

    <link rel="shortcut icon" HREF="../imagens/SafebetLogo.png">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/casino.png">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    SafeBet
                    <img src="../imagens/SafebetLogo.png" width=200 height=175>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                <li>
                    <a href="apostaRoleta.php">
                        <i class="pe-7s-note2"></i>
                        <p>Apostas Roleta</p>
                    </a>
                </li>
                   <li>
                    <a href="apostaBlackjack.php">
                        <i class="pe-7s-note2"></i>
                        <p>Apostas Blackjack</p>
                    </a>
                </li>
                <li>
                    <a href="pagamentos.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Pagamentos</p>
                    </a>
                </li>
                      </li>
                   <li>
                    <a href="mensagens.php">
                        <i class="pe-7s-chat"></i>
                        <p>Mensagens</p>
                    </a>
                </li>
               
        </div>
    </div>

      <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SafeBet</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                   
                     
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                     
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="index.php">
                                <p>Log Out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Utilizador</h4>
                            </div>
                            <div class="content">
                                <form method="GET" action="bd_sucess.php?idUtilizador">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Site</label>
                                                <input type="text" class="form-control" disabled placeholder="Site" value="Safebet">
                                            </div>
                                        </div>

                                        <?php

                                $idUser=$_GET["idUtilizador"];
                                $query = "SELECT * FROM utilizador where idUtilizador='$idUser'";  
                                $data = $connect->query($query);  
                                
                                foreach($data as $row){
                                  
                                  $idUtilizador=$row['idUtilizador'];
                                  $nome=$row['nome'];
                                  $sobrenome=$row['sobrenome'];
                                  $email=$row['email']; 
                                  $password=$row['password'];
                                  $data_nasc=$row['data_nasc'];
                                  $coins=$row['dinheiro'];           

                                       
                            ?>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>idUtilizador</label>
                                                <input type="text" id="idUtilizador" name="idUtilizador" class="form-control" placeholder="idUtilizador" value="<?php echo $idUtilizador;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=" <?php echo $email; ?> " >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sobrenome</label>
                                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?php echo $sobrenome;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Data De Nascimento</label>
                                                <input type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="Data De Nascimento" value="<?php echo $data_nasc;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Coins</label>
                                                <input type="text" class="form-control" id="coins" name="coins" placeholder="Dinheiro" value="<?php echo $coins; ?>">
                                            </div>
                                    </div> <br> <br> <br> <br>
                                    
                                        <?php

                                        $idUtilizador=1;
                                        }
                                        ?>          

                                    <button type="submit" class="btn btn-info btn-fill pull-right" > Update </button>
                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                            <hr>
                        
                        </div>
                    </div>

                </div>
            </div>



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="../login.php">
                                Home
                            </a>
                        </li>
                     
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="../login.php">SafeBet</a>
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>

