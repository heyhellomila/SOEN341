

<?php
require_once("action/SignInAction.php");

$action = new SignInAction();

$action->execute();

require_once("partial/header.php");
require_once("action/dba/connection.php");

require_once("action/dba/MySQLrequests.php");


$connection = Connection::getConnection();

if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    
    $check = $connection->prepare("SELECT *  FROM post WHERE (`post_title` LIKE '%" . $query . "%') OR (`post_content` LIKE '%" . $query . "%')");
    $check->bindParam(1, $query);
    $check->execute();
    
    if ($check->rowCount() > 0) {
        echo "<h2>Search Result</h2>";
        while ($results = $check->fetch(PDO::FETCH_ASSOC)) {
            
            
            
            
            
            
            
            
            echo "<form name=\"title\" action=\"index.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"post_id\" value=\"" . $results['post_id'] . "\"></input>";
            
            
            
            echo "<button type=\"submit\" class=\"notButton\">" . $results['post_title'] . "</button></form>";
            
            echo "<p>&nbsp&nbsp&nbsp<strong> Posted:</strong>" . $results['post_creation_time'] . "</p>";
            
            echo "<p>&nbsp&nbsp&nbsp" . $results['post_content'] . "</p>";
            
            
            
        }
    } else {
        
        echo "No results found ";
    }
    
    
    
    
}

else {
    
    echo "No results found ";
}



?>
<?php
require_once("partial/footer.php");
?>

