<?php
    $items_from_page = 10;
    $visible_number_pages = 3;
    $active_page = $_GET[p];
    if(!isset($active_page)) $active_page = 1;
    $all_rows = 20000;
    $all_pages = ceil($all_rows / $items_from_page);
    if($active_page > $all_pages) $active_page = $all_pages;
    if($active_page == 1)
    {
        $start_counter = 1;
        $finisf_counter = 1 + $visible_number_pages;
    }
    if($active_page == $all_pages)
    {

        $start_counter = $all_pages - $visible_number_pages;
        $finisf_counter = $all_pages;
    }
    if($active_page != 1 && $active_page != $all_pages)
    {

        $start_counter = $active_page - $visible_number_pages;
        $finisf_counter = $active_page + $visible_number_pages;
    }

    $pages = array();
    for($a=1; $a<=$all_pages; $a++)
    {
       if($a<=$finisf_counter && $a>=$start_counter) $pages[] = $a;
    }
    if($active_page > $visible_number_pages + 1)
    {
        echo "<a href=?p=1 class='".$active." paginator'>1</a>";
        if($start_counter > 2)
        echo " ... ";
    }

    foreach($pages as $link)
    {
        if($link == $active_page) $active = 'active';
        echo "<a href=?p=$link class='".$active." paginator'>".$link."</a>";
        unset($active);
    }

    if($active_page < $all_pages - $visible_number_pages)
    {
        if($finisf_counter < $all_pages-1) echo " ... ";
        echo "<a href=?p=$all_pages class=' paginator'>".$all_pages."</a>";
    }
