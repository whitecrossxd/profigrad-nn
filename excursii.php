<?
$db = [
    'host' => 'localhost',
    'dbname' => 'profigrad-nn',
    'user' => 'root',
    'password' => '',
    'http_referer' => '/http\:\/\/localhost\:3000\/admin/',
    'sql_mode' => !0
];

require_once 'rb.php';
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";

\R::setup($dsn, $db['user'], $db['password']);
\R::freeze(true);
//\R::fancyDebug(true);
if ($db['sql_mode'])
    \R::exec("SET GLOBAL sql_mode = 'NO_ENGINE_SUBSTITUTION'");

$items = \R::findAll('excursii');
?>

<html>
    <head>		
        <meta charset="utf-8">

        <title>Экскурсии</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel='stylesheet' href='css/materialize.css' type='text/css'/>

        <link rel='stylesheet' href='css/main.css' type='text/css'/>

        <script type="text/javascript" src='js/jquery-2.2.1.js'></script>
        <script type="text/javascript" src='js/materialize.js'></script>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
                <div class="container">		      
                    <a href="index.php" class="brand-logo hoverable">ПрофиГрад</a>
                    <ul class="rightmenu ">
                        <li><a href="index.php">На Главную</a></li>
                        <li><a href="#contacts">Контакты</a></li>

                    </ul>
                </div>
            </nav>
        </div>


        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="img/parallax.jpg"> <!-- random image -->
                </li>
                <li>
                    <img src="img/2.jpg" alt="foto"> <!-- random image -->			        
                </li>
                <li>
                    <img src="img/3.jpg" alt="foto"> <!-- random image -->			        
                </li>
                <li>
                    <img src="img/4.jpg" alt="foto"> <!-- random image -->			        
                </li>
            </ul>
        </div>

        <div class="container">
            <div class="row " style="margin-top: 50px;">



<?$i = 1;?>
<? foreach ($items as $item): ?>
    <div class="col s12 m6 l3">
        <a href="#modal<?=$i?>" class="card modal-trigger waves-effect waves-light">
            <div class="card-image">
                <img src="<?= $item['img'] ?>">          
            </div>
            <div class="card-content">
                <p><?= $item['title'] ?></p>
            </div>
        </a>
    </div>
    <div id="modal<?=$i?>" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4><?= $item['title'] ?></h4>
            <p>Text <?=$i?></p>
        </div>
    </div>
    <?$i++;?>
<? endforeach; ?>
        </div>
        </div>
    <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l8 offset-l2 s12">
                        <h5 class="white-text" id="contacts">Связаться с нами</h5>
                        <p class="grey-text text-lighten-3">Email: profigrad_nn@mail.ru</p>
                        <p class="grey-text text-lighten-3">Елена тел.+79307120217</p>
                        <p class="grey-text text-lighten-3">Ольга тел.+79519107056</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#top">Наверх</a>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.slider').slider({
                    indicators: false,
                    height: 350,
                    transition: 700,
                    interval: 3000});
                $('.parallax').parallax();
                $('.modal').modal();
            });
        </script>
    </body>

</html>