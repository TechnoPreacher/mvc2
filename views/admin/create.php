<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Create для модели Post (admin zone)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<br>

<h4>Форма для добавления данных в БД с одновременным просмотром содержимого всей таблицы</h4>

<form name="create" method="post" action="">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="author_id" placeholder="author ID">
            </div>
            <div class="col">
                <input type="text" class="form-control"  name="subject"placeholder="subject title">
            </div>
            <div class="col">
                <input type="text" class="form-control"  name="detail" placeholder="subject body">
            </div>
            <div class="col">
                <button type="submit" name="send" class="btn btn-primary">Add to DB</button>
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


</body>
</html>

