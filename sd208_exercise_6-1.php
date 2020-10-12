<?php
session_start();

if(isset($_POST['add']))
{
    
    array_push($_SESSION['book'],$_POST['bookmark_name']);
    array_push($_SESSION['anchor'],$_POST['url']);
    
    // print_r($_SESSION['book']);
    // print_r($_SESSION['anchor']); 
   
}    

if (isset($_POST['clearAll'])) {
    $_SESSION['book'] = array();
    $_SESSION['anchor'] = array();
}
if(isset($_POST['clear'])){
    unset($_SESSION['book'][$_POST['id']]);
    unset($_SESSION['anchor'][$_POST['id']]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Sessions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- FONT ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FONT-FAMILY -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
 
    <style>
        label{
            font-size:2vw;
        }
        body{
            background-image:url('https://fullyloaded.pizza/wp-content/uploads/2016/08/brown-wood-texture-and-background-1170x780.jpg');
            background-repeat:no-repeat;
            background-size: cover;
            color:white;
            font-family: 'Poppins';
        }
        a{
            color:white;
        }
        a:hover{
            color:yellow;
            text-decoration-line: none;
        }
        h1{
            font-size: 4vw;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="mt-5 col-sm-6">
            <div class="form-header">
                <h1>Add BookMarks</h1>
            </div>
            <form method="POST" class="mt-5">
                <div class="form-group">
                    <div class="col-sm-8">
                        <label>Bookmark Name</label>
                        <input class="form-control" type="text" name="bookmark_name" placeholder="Enter Bookmark name">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-8">
                        <label>URL</label>
                        <input class="form-control" type="text" name="url" placeholder="Enter url">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="col-sm-8">
                        <input type="submit" name="add" value="Add Bookmark" class="btn btn-primary">
                        <input type="submit" name="clearAll" value="Clear" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-sm-6 mt-5">
            <div>
                <h1>My BookMarks</h1>
            </div>
            <table class="container mt-5 table">
                <?php
                    if(isset($_SESSION['book']) and isset($_SESSION['anchor'])){
                    // foreach($_SESSION['bookmarks'] as $index => $a ){
                    for($i = 0; $i < count($_SESSION['book']); $i++){   
                ?>
                <div class="col-sm-8">
                    <tr>
                        <td><a href="<?php echo $_SESSION['anchor'][$i];?>"><?php echo $_SESSION['book'][$i];?></a></td>
                        <form method="POST">
                            <td><input type="hidden" name="id" value="<?php echo $i; ?>"></td>
                            <td><input name="clear" type="submit" value="x" class="btn btn-danger"></td>
                        </form>
                    </tr>
                </div>
                    <?php }}?>
            </table>
        </div>
    </div>
</div>
</body>
</html>