<?php

include_once ('libs/CurlSearch.php');


try
{
    $search = new CurlSearch();
    $getPage = $search->getHtmlPage();
    $data = $search->enterPage();
}

catch (Exception $e)
{
    $error = $e->getMessage();
}




include ("template/index.php");
