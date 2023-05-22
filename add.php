<?php 
echo "Add";
if( !empty ($_POST)) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    unset($_POST["add"]);
    $file = file_get_contents('test.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["modules"] = array_values($data["modules"]);
    array_push($data["modules"], $_POST);
    file_put_contents("test.json", json_encode($data));
    header("Location: index.php");

}
?>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>    
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        text-align: center;
        margin: 0;
        background-color: #8b9dc3;
        color: #f7f7f7;
    }

    nav{
        background-color: 	#dfe3ee;
        margin-bottom: 50px;
        box-shadow: 0px 2.98256px 7.4564px rgba(0, 0, 0, 0.1);
    }

    button {
        background: -webkit-linear-gradient(#67ae55, #578843);
        border: none;
        color: #fff;
        font-size: 20px;
        height: 50px;
        width: 100px;
        border-radius: 5px;
        cursor: pointer;
    }

    input { 
        height: 35px;
    }
</style>
<nav><img src="https://static.tsugi.org/img/logos/tsugi-logo-incubating.png" height="70px"></nav>
<form method="POST">
Module Title<br>
<input name="title" type="text" size="50"><br><br>
Module Description<br>
<input name="desc" type="text" size="50"><br><br>
<button type="submit">Publish</button>
</form>