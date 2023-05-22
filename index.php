<?php 
echo "Home"; 
if (isset($_POST['title']) && isset($_POST['desc'])) {
    header("Location:editor.php?title=".urlencode($_POST['title'])."&desc=".urlencode($_POST['desc']));
    return;
}

?>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

    #edit {
        background: -webkit-linear-gradient(#67ae55, #578843);
        border: none;
        color: #fff;
        font-size: 20px;
        height: 50px;
        width: 100px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<nav><img src="https://static.tsugi.org/img/logos/tsugi-logo-incubating.png" height="70px"></nav>
<?php 
$input = file_get_contents('test.json');
$output = json_decode($input);
foreach($output->modules as $item) {
    $title = $item->title;
    $desc = $item->desc;
    echo ("<p id='title'>$title</p");
    echo"<br>";
    echo ("<p id='desc'>$desc</p>");
    echo"<br>";
}
?>
<form method ="POST">
<input id='hiddentitle' name='title' type='hidden' value=''>
<input id='hiddendesc' name='desc' type='hidden' value=''>
<input type="submit" id="edit" value="Edit">
</form>
<a href="./add.php"><button type="submit">Add</button></a>
<script>
    let titleValue = $("#title").text()
    let descValue = $("#desc").text()
    let hiddenTitle = document.getElementById("hiddentitle")
    let hiddenDesc = document.getElementById("hiddendesc")
    let edit = document.getElementById("edit")
    edit.addEventListener("click", function() {
        hiddenTitle.setAttribute("value", titleValue)
        hiddenDesc.setAttribute("value", descValue)
        
    })

    /* 
    let title = document.getElementById("title")
    let desc = document.getElementById("desc")
    let editEl = document.getElementById("edit")
    let deleteEl = document.getElementById("delete") 
    editEl.addEventListener("click", function() {
        title.innerHTML = `
        <form method="post">
        <input name="title" type="text" size="50" value="${titleValue}"> 
        </form>
        `  
        editEl.innerHTML = `<button id="save-btn">Save</button> `
        
    

    }) */


</script>