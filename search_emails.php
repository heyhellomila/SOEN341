<?php
require_once("partial/header.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <p><h1 class="h1">search for a keyword in contact_us mails</h1><p/>
                <p class="bd-lead">
				<title>Search</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link rel="stylesheet" type="text/css" href="style.css"/></p>
		        <form action="search_emails_results.php" method="GET">
                <input type="text" name="query" />
                <input type="submit" value="Search" />
                </form>
            </div>
        </div>
    </div>
</html>
<?php
require_once("partial/footer.php");
?>