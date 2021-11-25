<!DOCTYPE html>

<br lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Create для модели Post (admin zone)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<br>

<h4>Добавление данных в таблицу авторов с просмотром содержимого (admin role)</h4>
</br>
<form name="create" method="post" action="">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="user_id" placeholder="User ID">
            </div>
            <div class="col">
                <input type="text" class="form-control"  name="name"placeholder="User name">
            </div>
            <div class="col">
                <input type="text" class="form-control"  name="pass"placeholder="User password">
            </div>
            <div class="col">
                <button type="submit" name="send" class="btn btn-primary">Add to Users</button>
            </div>

        </div>
</form>

<br>

<table>

    <?php


    foreach ($data as $key => $row) :  ?>
        <tr>
            <?php foreach($row as $key => $value) : ?>
                <td> <?= $value ?>  </td>
            <?php endforeach ?>
            <td>  <a href="update?id=<?=$row['id'] ?>">Update</a></td>
            <td>  <a href="delete?id=<?=$row['id'] ?>">Delete</a></td>
        </tr>
    <?php endforeach ?>
</table>

<a class="btn btn-info" href="/" role="button">На главную</a>
</body>
</html>

