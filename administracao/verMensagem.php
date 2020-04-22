<!doctype html>
<html lang="en">
<head>

    <?php

        include("\..\ligacao_bd.php");
        session_start();
        if(isset($_SESSION["email"])){

    ?>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

     <title>SafeBet Admin - Ver Mensagem</title>

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
                <li>
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
                <li >
                    <a href="pagamentos.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Pagamentos</p>
                    </a>
                </li>
            
                
                 <li class="active">
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
                   
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
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


            <div class="container">
            <div class="row">
                <div class="col-md-8" style="margin:0 auto; float:none;">
                    <h3 align="center">Mensagem do utilizador</h3>


                    <br />

                    
            
                    <form method="post" action="">
                 

                        <div class="form-group">
                            <?php

                            $idMensagem=$_GET["idReclamacao"];
                            $query = "SELECT * FROM reclamacoes where idReclamacao='$idMensagem'";  
                                $data = $connect->query($query);  
                                
                                foreach($data as $row){
                                  
                                  $email=$row['email'];
                                  $assunto=$row['Assunto'];
                                  $texto=$row['texto'];

                                }

                        
                        ?>
                     
                            <label>Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value=" <?php echo $email; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Assunto</label>
                            <input type="text" id="assunto" name="assunto" class="form-control" placeholder="Assunto" value=" <?php echo $assunto; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Mensagem</label>
                            <input type="text" id="mensagem" name="mensagem" class="form-control" placeholder="Mensagem" value="<?php echo $texto; ?>"></input>
                        </div>
                        <div class="form-group" align="center">
                            <input type="submit"id="apagar" name="apagar" value="Apagar" class="btn btn-info" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST["apagar"])){

           $message='<label>Mensagem Apagada</label>';
        try{

                $sql="DELETE FROM reclamacoes WHERE idReclamacao='$idMensagem'";
                    $stmt = $connect->prepare($sql);
                    $stmt->execute();
                   
                    

        }catch(PDOException $e){
                 
        }


            }


        ?>

               <?php 
                                if(isset($message)){
                               echo '<label class="text-danger">'.$message.'</label>';
                                   }
  
                        ?>
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

</html>

<?php

}


?>