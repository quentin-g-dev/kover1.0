<?

function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=kover', 'root', '');
    $db -> setAttribute (PDO ::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
}
?>