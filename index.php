<!DOCTYPE html>
<html lang="en">

<?php
$task = "encode";
if (isset($_GET['task']) && $_GET['task'] != '') {
    $task = $_GET['task'];
}
$key = 'abcdefghijklmnopqrstuvwxyz1234567890';
if ('key' == $task) {
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('', $key_original);
}

function display($key)
{
    printf($key);
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Scrambler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h1>Data Scrambler</h1>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <a href="/index.php?task=endode" class="m-1">Encode</a>
                    <a href="/index.php?task=decode" class="m-1">Decode</a>
                    <a href="/index.php?task=key" class="m-1">Key Generate</a>
                </div>
                <form>
                    <div class="form-group m-2">
                        <label for="exampleInputEmail1">Key</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Key" value="<?php display($key) ?>"> 
                    </div>
                        <div class="form-group m-2">
                            <label for="exampleInputPassword1">Data</label>
                            <textarea name="data" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group m-2">
                            <label for="exampleInputPassword1">Result</label>
                            <textarea name="result" id="" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>