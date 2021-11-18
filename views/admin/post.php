<h1>фильтрация данных из модели Post (админская зона)</h1>
<!-- </br>
по запросу <b>$салаватюлаев</b> нам вернулось:
<b>
    <?php
//  var_dump($салаватюлаев);
?>
</b>
-->


<?php
session_start();
//echo "session started...";
//session_destroy();

if (isset($_SESSION['buf'])) {//есть ли буфер в сессии
    if (isset($_POST['user'])) {//есть ли данные из формы
        $arr = [];
        $arr['user'] = $_POST['user'];
        $arr['pass'] = $_POST['pass'];
        $arr['mail'] = $_POST['mail'];
        $arr['birthday'] = $_POST['birthday'];
        $arr['gender'] = $_POST['gender'];
        $arr['color'] = $_POST['color'];
        array_push($_SESSION['buf'], $arr);//новый массив данных в сессию
    }

} else {
    echo "create empty...";
    $_SESSION['buf'] = array();//создаю пустой массив в сессии если его не было
}
?>

<pre>
    <?php
    // print_r($_SESSION);  для отладки
    ?>
</pre>
<?php

session_write_close();//закрываю сессию после внесения изменений

?>


<!DOCTYPE html>


<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>form for homework</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<form name="" method="post" action="">

    <div class="form-group p-1">
        <div class="w-auto">
            <label for="author">author:</label>
        </div>
        <div class="w-25">
            <input type="text" class="form-control col" name="author" placeholder="author">
        </div>
        <div class="col"></div>
    </div>

    <div class="form-group p-1">
        <div class="w-auto">
            <label for="subject">subject:</label>
        </div>
        <div class="w-25">
            <input type="text" class="form-control col" name="subject" placeholder="subject">
        </div>
    </div>

    <div class="form-group p-1">
        <div class="w-auto">
            <label for="created">date:</label>
        </div>
        <div class="w-25">
            <input type="text" class="form-control col" name="created">
        </div>
    </div>

    <div class="form-group w-25 p-3">
        <button type="submit" name="send" class="btn btn-primary">Submit</button>
    </div>
</form>


<table>
    <?php foreach ($data as $key => $row) :  ?>
    <tr>
        <?php foreach($row as $key => $value) : ?>
        <td> <?= $value ?>  </td>
        <?php endforeach ?>
    </tr>
    <?php endforeach ?>
</table>




</body>
</html>

