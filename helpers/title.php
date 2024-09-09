<?php
function getTitle($title)
{
    $explodeTitle = explode("-",$title);
    $implodeTitle = implode(" ",$explodeTitle);
    return ucwords($implodeTitle);
}