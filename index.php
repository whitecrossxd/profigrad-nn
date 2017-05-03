<?
$db = [
    'host' => 'localhost',
    'dbname' => 'profigrad-nn',
    'user' => 'root',
    'password' => '',
    'sql_mode' => !0
];

require_once 'rb.php';
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";

\R::setup($dsn, $db['user'], $db['password']);
\R::freeze(true);
//\R::fancyDebug(true);
if ($db['sql_mode'])
    \R::exec("SET GLOBAL sql_mode = 'NO_ENGINE_SUBSTITUTION'");

$items = \R::findAll('news', 'ORDER BY `id` DESC');
?>


<html>
	<head>
		<title>ПрофиГрад</title>
		<meta charset="utf-8">

		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

		<link rel='stylesheet' href='css/materialize.min.css' type='text/css'/>

		<link rel='stylesheet' href='css/main.css' type='text/css'/>

		<script type="text/javascript" src='js/jquery-2.2.1.min.js'></script>
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

		<div id="content">
                    <div class="parallax_with_content">  
                        <div class="parallax-container">
                            <div class="parallax"> <img src="img/parallax1.jpg"></div>
                        </div>
                        <div class='container parallax-content'>
                            <h1>ПрофиГрад</h1>
                            <h3>Город профессий</h3>
                        </div>
                    </div>
                    
                    
                    <div id="slider1" class="slider">
                        <div class="arrow_back"><i class="material-icons">arrow_back</i></div>
                        <div class="arrow_forward"><i class="material-icons">arrow_forward</i></div>
                        <ul class="slides">
                            <li>
                                <img>
                                <div class="caption center-align">
                                    <h3>Появился раздел новости!</h3>
                                    <h5 class="light">Нажмите стрелки справа или слева, чтобы посмотреть краткое описание<br>
                                        Более подробная информация в меню, раздел "НОВОСТ�?"</h5>
                                    <h5><a href="news.php">Перейти в раздел "Новости"</a></h5>
                                </div>
                            </li>
                            <?$i = true;?>
                            <? foreach ($items as $item): ?>
                            <?
                                if($i){
                                    echo '
                                       <li>
                                            <div class="caption right-align">
                                                <div class="row">
                                                    <div class="col s8 right-align">
                                                        <h3>'.$item['title'].'</h3>
                                                        <h5 class="light">'.$item['short_text'].'</h5>
                                                        <a href="news.php">Перейти в раздел "Новости"</a>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="news_image"><img src="'.$item['img'].'"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> 
                                    ';
                                    $i = false;
                                }else{
                                    echo '
                                        <li>
                                            <div class="caption left-align">
                                                <div class="row">
                                                    <div class="col s4">
                                                        <div class="news_image"><img src="'.$item['img'].'"/></div>
                                                    </div>
                                                    <div class="col s8 left-align">
                                                        <h3>'.$item['title'].'</h3>
                                                        <h5 class="light">'.$item['short_text'].'</h5>
                                                        <a href="news.php">Перейти в раздел "Новости"</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    ';
                                    $i = true;
                                }
                            ?>
                            
                            <? endforeach; ?>
                        </ul>
                    </div>
		
    		<div class="content_margin">
    			<div class='container'>
    		    	<div class='row nomargin textcenter'>
    		    		<div class='col s12 m6 l6 xl4'>
    						<a href='project.html' class="cell  z-depth-3 waves-effect waves-block waves-orange">
    							<h3 class="main_menu_style">Проект "ПрофиГрад"</h3>
    						</a>
    					</div>
    					<div class='col s12 m6 l6 xl4'>
    						<a href='excursii.php' class="cell z-depth-3 waves-effect waves-block waves-orange">
    							<h3 class="main_menu_style">Предлагаемые экскурсии</h3>
    						</a>
    					</div>
    					<div class='col s12 m6 l6 xl4'>
    						<a href='Forma.html' class="cell  z-depth-3 waves-effect waves-block waves-orange">
    							<h3 class="main_menu_style">Заявка на участие в проекте</h3>
    						</a>
    					</div>
    					<div class='col s12 m6 l6 xl4'>
    						<a href='forSchool.html' class="cell  z-depth-3 waves-effect waves-block waves-orange">
    							<h2 class="main_menu_style">�?нформация для школ</h2>
    						</a>
    					</div>
    					<div class='col s12 m6 l6 xl4'>
                                            <a href='events.php' class="cell z-depth-3 waves-effect waves-block waves-orange">
    							<h2 class="main_menu_style">Наши мероприятия</h2>
    						</a>
    					</div>
    					<div class='col s12 m6 l6 xl4'>
                                            <a href='news.php' class="cell z-depth-3 waves-effect waves-block waves-orange">
    							<h2 class="main_menu_style">Новости</h2>
    						</a>
    					</div>
    		    	</div>
    		    </div>
    		</div>
		<div id="slider" class="slider">
		    <ul class="slides">
		      <li><img src="img/parallax.jpg"></li>
		      <li><img src="img/2.jpg" alt="foto"></li>
		      <li><img src="img/3.jpg" alt="foto"></li>
		      <li><img src="img/4.jpg" alt="foto"></li>
		    </ul>
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
                </div>
                <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-83828721-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-86013590-1', 'auto');
		  ga('send', 'pageview');

		</script>
                <script type="text/javascript">
                    $(document).ready(function(){
                    $('#slider1').slider({
                            indicators: false,
                            height: 400,
                            transition: 500,
                            interval: 20000}).mouseenter(function(){
                                $('#slider1').slider('pause');
                            }).mouseleave(function(){
                                $('#slider1').slider('start');
                            });
                    $('.arrow_back').click(function(){
                        $('.slider').slider('prev');
                    });
                    $('.arrow_forward').click(function(){
                        $('.slider').slider('next');
                    });
                    $('#slider').slider({
                            indicators: false,
                            height: 350,
                            transition: 700,
                            interval: 3000});
                    $('.parallax').parallax();
                });
                
                </script>
</body>	
</html>
