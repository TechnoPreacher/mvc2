<h6>фильтрация данных из модели Post (админская зона)</h6>

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

<a href="create">Create</a>//ссылка на вызов вьюшки CREATE

<form name="" method="post" action="">

    <div class="form-group p-1">
        <div class="w-auto">
            <label for="authorid">author id:</label>
        </div>
        <div class="w-25">
            <input type="text" class="form-control col" name="author_id" placeholder="put ID of author here">
        </div>
        <div class="col"></div>
    </div>

    <div class="form-group p-1">
        <div class="w-auto">
            <label for="subject">subject:</label>
        </div>
        <div class="w-25">
            <input type="text" class="form-control col" name="subject" placeholder="some text from subject">
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
        <td><a href="post/update ?id=<?=$row['id'] ?>">Update</a></td>
        <td><a href="post/delete ?id=<?=$row['id'] ?>">Delete</a></td>
    </tr>
    <?php endforeach ?>
</table>

//post/update?id=<?=$row['id'] ?>

</body>
</html>

