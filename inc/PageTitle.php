<?php


class PageTitle
{
    public function getPageTitle(){
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/',$link);
        $page = end($link_array);
        $page = str_replace(".php", "", $page);
        echo $page;
    }
}