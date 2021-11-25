<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>root for MVC WEB project</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <style>
        fieldset {
            border: 0;
        }

        label {
            display: block;
            margin: 30px 0 0 0;
        }

        .overflow {
            height: 200px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#speed").selectmenu();

            $("#files").selectmenu();

            $("#number")
                .selectmenu()
                .selectmenu("menuWidget")
                .addClass("overflow");
            $("#salutation").selectmenu();
        });
    </script>
</head>
<br>
<body>

<h5>Добро пожаловать в маленькое, но очень миленькое учебное WEB-приложенние</h5>
<h6>mySQL + MVC</h6>
</br></br>

Можно просмотреть или добавить/изменить/удалить новую запись в БД: <a href="admin/post/create">>>>
    Добавить</a></br>
</br>

<form class="form-inline" name="" method="post" action="">

    <div class="form-group mb-2">
        <ilabel>Даже есть список авторов из БД:</ilabel>
    </div>

    <div class="form-group mx-sm-3 mb-2">
        <select name="speed" id="speed">
            <?php
            foreach ($data as $key => $row) : ?>
                <?php foreach ($row as $key => $value) : ?>
                <?php endforeach ?>
                <option> <?= $row['name'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <a href="user/post/create">>>>
        Добавить</a></br>
    </br>
</form>

</br>
Ну а если ввести неправильный адрес, то можно получить 404 и указание возможных адресов для URL :-)


</body>


</html>

