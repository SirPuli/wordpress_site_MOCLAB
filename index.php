<?php

define('VERSION', '0.test_1');


$page = isset($_GET['page']) ? $_GET['page'] : 'main_page';


include "./views/__header.php";
if (file_exists("./views/$page.php"))
{
    include "./views/$page.php";
}
else
{
    include "./views/404.php";
}
include "./views/__footer.php";