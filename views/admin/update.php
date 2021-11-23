<h5>Форма обновления данных записи</h5>
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
            <input type="text" class="form-control" name="author_id" value="<?=$data[0]['author_id'] ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control"  name="subject" value="<?=$data[0]['subject'] ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control"  name="detail" value="<?=$data[0]['detail'] ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control col" name="id" hidden value="<?=$data[0]['id'] ?>" >
        </div>

        <div class="col">
            <button type="submit" name="send" class="btn btn-primary">Update DB</button>
        </div>
    </div>
</form>


</body>
</html>

