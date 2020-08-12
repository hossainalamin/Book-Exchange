<?php
class Formate
{
    function validation($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }
    function dateformate($date)
    {
        return date('F j,Y g:i a',strtotime($date));
    }
    function textsorten($text,$limit=400)
    {
        $text = $text." ";
        $text = substr($text,0,$limit);
        $text = substr($text,0,strpos($text," "));
        $text = $text ."...";
        return $text;
    }
}
?>