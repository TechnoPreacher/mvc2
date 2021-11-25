<h5>Форма обновления таблицы авторов</h5>
</br>
</br>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>form for homework</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<form name="create" method="post" action="">
    <div class="row">

        <div class="col">
            <input type="text" class="form-control" name="user_id" value="<?=$data[0]['user_id'] ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control"  name="name" value="<?=$data[0]['name'] ?>">
        </div>

        <div class="col">
            <input type="password" class="form-control"  name="pass" value="<?=$data[0]['pass'] ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control col" name="id" hidden value="<?=$data[0]['id'] ?>" >
        </div>

        <div class="col">
            <button type="submit" name="send" class="btn btn-primary">Update DB</button>
        </div>
    </div>
</form>
<a class="btn btn-info" href="/" role="button">На главную</a>

</body>
</html>

