<?
if(isset($_POST['action'])){
    if(!isset($_POST['name']) || $_POST['name'] == '') $error[] = 'Укажите имя.';
    if(!isset($_POST['last_name']) || $_POST['last_name'] == '') $error[] = 'Укажите фамилию.';
    if(!isset($_POST['text']) || $_POST['text'] == '') $error[] = 'Напишите отзыв.';
    elseif(strlen($_POST['text']) > 600) $error[] = 'Текст отзыва должен быть меньше 600 символов.';
    
    if(count($error)){
        $_SESSION['error'] = implode($error, '<br />');
    }
    else{
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
        
        $review = \R::dispense( 'reviews' );
        $review->date       = \R::isoDateTime();
        $review->name       = $_POST['name'];
        $review->last_name  = $_POST['last_name'];
        $review->role       = $_POST['role'];
        $review->school     = $_POST['school'];
        $review->text       = $_POST['text'];
        \R::store($review);
    }
}
header('Location: index.php');
exit();

//    print_r($_POST);
//    echo $_SESSION['error'];