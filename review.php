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

$items = \R::findAll('news', 'ORDER BY `id` DESC');
$reviews = \R::findAll('reviews', 'ORDER BY `id` DESC');
?>
<html>
	<header>
		
		<meta charset="utf-8">

		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"></link>

		<link rel='stylesheet' href='css/materialize.css' type='text/css'></link>

		<link rel='stylesheet' href='css/main.css' type='text/css'></link>

		<script type="text/javascript" src='js/jquery-2.2.1.js'></script>
		<script type="text/javascript" src='js/materialize.js'></script>
	</header>
	<body>
		<div class="navbar-fixed">
		    <nav>
		    	<div class="container">		      
		        <a href="index.html" class="brand-logo hoverable">ПрофиГрад</a>
		        <ul class="rightmenu ">
		          <li><a href="index.html">На Главную</a></li>
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
                            <div class="reviews">
                                <h2 class="title">Отзывы всех посетителей</h2>
                                <div class="items row nomargin">
                                    <?$i=1;?>
                                    <? foreach($reviews as $review): ?>
                                        <?if($i == 3) echo '</div><div class="items row nomargin">'; $i=1;?>
                                    <div class="item col s12 m6 l6 xl4" style="margin-bottom: 20px">
                                            <h6><?=$review['name']?> <?=$review['last_name']?></h6>
                                            <span><?=$review['role']?> Школа №<?=$review['school']?></span>
                                            <p><?=$review['text']?></p>
                                        </div>
                                        <?$i++;?>
                                    <? endforeach; ?>
                                </div>
                            </div>
			</div>
            <div class="reviews_writing">
                        <h2 class="title">Оставьте свой отзыв</h2>
                        <div class="row orange">
                            <p><?= $_SESSION['error']??'' ?></p>
                            <form class="col s12" method="post" action="action_review.php">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="first_name" type="text" name="name" class="validate white-text">
                                        <label for="first_name">Имя*</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="last_name" type="text" name="last_name" class="validate white-text">
                                        <label for="last_name">Фамилия*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="school" type="text" name="school" class="validate white-text">
                                        <label for="school">Номер Школы(пример:111, 8, 38)</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="position" type="text" name="role" class="validate white-text">
                                        <label for="position">Должность(пример: Учитель, Ученик, Родитель)</label>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="textarea1" name="text" class="materialize-textarea white-text" data-length="600"></textarea>
                                    <label for="textarea1">Напишите Ваш отзыв здесь*</label>
                                </div>
                                <button class="btn waves-effect waves-orange white orange-text" type="submit" name="action">Оставить отзыв
                                    <i class="material-icons right">send</i>
                                </button>
                                <span class="black-text notification"> * - поля, обязательные для заполнения</span>
                            </form>
                        </div>
                    </div>
	</body>
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
	    $(document).ready(function(){
      	$('.slider').slider({
      		indicators: false,
      		height: 350,
        	transition: 700,
        	interval: 3000});
      	$('.parallax').parallax();});
    </script>
</html>