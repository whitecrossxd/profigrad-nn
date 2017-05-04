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
?>


<html>
<head>
		<meta charset="utf-8">

		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

		<link rel='stylesheet' href='css/materialize.min.css' type='text/css'/>

		<link rel='stylesheet' href='css/main.css' type='text/css'/>
                
                <link href="css/least.min.css" rel="stylesheet" />

		<script type="text/javascript" src='js/jquery-2.2.1.js'></script>
		<script type="text/javascript" src='js/materialize.js'></script>
                <script src="js/least.js"></script>
                
                <title>ПрофиГрад</title>
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
	      <li><img src="img/parallax.jpg"></li>
	      <li><img src="img/2.jpg" alt="foto"></li>
	      <li><img src="img/3.jpg" alt="foto"></li>
	      <li><img src="img/4.jpg" alt="foto"></li>
	    </ul>
	</div>
	<div class="container">
            <? foreach ($items as $item): ?>
		<div class="newsItem" >
                    <p class="date"><?= $item['date'] ?></p>
			<div class="row">
				<h1 class="textcenter"><?= $item['title'] ?></h1>
				<div class="col s12 m12 l12">
                                    <div class="small_text">
                                        <p class="flow-text"><?= $item['short_text'] ?></p>
                                        <? if($item['full_text']): ?>
                                            <a href="#" class="text_toggle sm_btn_decoration" data-switch="false">Читать подробнее...</a>
                                        <?endif;?>
                                    </div>
				</div>
				<div class="col s12 m12 l12">
                                    <div class="full_text">
                                        <p class="flow-text"><?= $item['full_text'] ?></p>
                                    	<a href="#" class="text_toggle sm_btn_decoration hidden" data-switch="true">Свернуть</a>
                                    </div>
				</div>
                                <div class="col s12 news_video">
                                    <? if($item['video']):?>
                                        <video src="<?=$item['video']?>" width="100%" type="video/mp4" codecs="avc1.42E01E, mp4a.40.2" controls/>
                                    <? endif; ?>
                                    <? if($item['img'] && count(unserialize($item['img'])) > 1): ?>
                                        <section id="least">
                                            <div class="least-preview"></div>
                                            <ul class="least-gallery" >
                                                
                                                <? foreach(unserialize($item['img']) as $img): ?>
                                                    <li>
                                                        <a href="<?=$img[0]?>" title="Увеличить" data-subtitle="Фото" data-caption="<?=$img[1]?>">
                                                            <img src="<?=$img[0]?>" alt="Alt Image Text" />
                                                        </a>
                                                    </li>
                                                <? endforeach; ?>
                                            </ul>
                                        </section>
                                    <? else: ?>
                                        <div class="news_img">
                                            <img width="100%" src="<?=unserialize($item['img'])[0][0]?>"/>
                                        </div>
                                    <? endif; ?>
                                    
                                </div>
			</div>
		</div>
            <? endforeach; ?>
            <?php
//            $arr[] = ['img/plakat.jpg', 'Описание 1'];
//            print_r(serialize($arr));
            ?>            
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
$(document).ready(function(){
    $('.slider').slider({
    	indicators: false,
    	height: 350,
     	transition: 700,
     	interval: 3000});
    $('.parallax').parallax();
    $('.text_toggle').click(function(){
	var item = $(this).parents('.newsItem');
	item.find('div.full_text').slideToggle(1000);
	item.find('[data-switch=true],[data-switch=false]').toggleClass('hidden');
        $(document).scrollTop(item.offset().top-100);
	return !1;
    });
    $('.least-gallery').least();
});
</script>
    
</body>


</html>
