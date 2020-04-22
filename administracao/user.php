<!doctype html>
<html lang="en">
    <?php

        include("\..\ligacao_bd.php");
        session_start();

        if(isset($_SESSION["email"])){

    ?>

<head>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

     <title>SafeBet Admin - Utilizadores</title>

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
                   
                        <li>
                            
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                            <input type="text" id="procurar">
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
                            <a href="logout.php">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Lista De Utilizadores</h4>
                                <p class="category">Clique no ID para obter mais informações</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                         
                              
                        <?php

                                $query = "SELECT * FROM utilizador";  
                                $data = $connect->query($query);  
                                
                                echo          

                                       '<table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Sobrenome</th>
                                        <th>Data De Nascimento</th>
                                        <th>Email</th>
                                        <th>dinheiro</th>

                                        
                                        
                                    </thead>
                                    <tbody>';

                                    foreach($data as $row){

                                        echo'

                                        
                                        <tr>
                                            <td>  <a href="editarUtilizador.php?idUtilizador='.$row['idUtilizador'].'">'.$row['idUtilizador'].' </a> </td>
                                            <td>'. $row['nome'].'</td>
                                            <td>'. $row['sobrenome'].'</td>
                                            <td>'.$row['data_nasc'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['dinheiro'].'</td>
                                        </tr>';
                                    }

                                    echo '
                                    </tbody>
                                    </table>';

                            ?>


                            </div>
                        </div>
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




<?php

}else{

    header("location:index.php");

}


?>

<script>
    
    $(document).ready(function{
        $('$search_text').keyup(function(){
        var txt = $(this).val();
        if(txt!=''){
            
            
        }else{
            
            $('#result').html('');
            $.ajax({
                
                url:"users.php",
                method:"post";
                data:{search:txt},
                dataType:"text",
                success:function(data){
                
                $('#result').html(data);
                }
            });
        }
        });
    });

</script>