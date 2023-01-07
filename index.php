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
}else if(isset($_POST['key']) && $_POST['key'] != ''){
    $generated_key = $_POST['key'];
}

$endoce_element = '';
if('encode' == $task)
{
    $original_data = $_POST['data'];
    if($original_data != '')
    {
        $endoce_element = encode($original_data, $generated_key);
    }
}

//data endoce function

function encode($original_data, $generated_key)
{
    // return $generated_key;
    $key = 'abcdefghijklmnopqrstuvwxyz1234567890';
    // $key = '8vaks4ly91w0ux76532zpbnhimjdotqfecrg';
    // $generated_key = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $encoded_data = '';
    $original_data_length = strlen($original_data);
    for($i=0; $i<=$original_data_length-1; $i++)
    {
        $current_char = $original_data[$i];
        $position     = strpos($key, $current_char);

        if($position !== false)
        {
            $encoded_data .= $generated_key[$position];
        }else{
            $encoded_data .= $current_char;
        }

    }
    
    return $encoded_data;

}

//generate key function
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
                <form method="POST" action="index.php" >
                    <div class="form-group m-2">
                        <label for="exampleInputEmail1">Key</label>
                        <input type="text" name="key" class="form-control" placeholder="Enter Key" value="<?php display($key) ?>"> 
                    </div>
                        <div class="form-group m-2">
                            <label for="exampleInputPassword1">Data</label>
                            <textarea name="data" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group m-2">
                            <label for="exampleInputPassword1">Result</label>
                            <textarea name="result" id="" class="form-control"><?php echo $endoce_element; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>