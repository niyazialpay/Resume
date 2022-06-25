<?php
function id($id): null|int|string
{
    $a = addslashes(strip_tags(preg_replace("/([^0-9])/um", "", $id)));
    if (is_numeric(intval($a, 10))) {
        return $a;
    } else {
        return null;
    }
}

function replace_characters($text): array|string|null
{
    return preg_replace("/([^\p{Latin}A-Za-z0-9\"', ._@öÖçÇşŞğĞüÜıİА-Яа-яЁё|₺€$\p{Cyrillic}-])/um", "", $text);
}

function GetPost($t): array|string|null
{
    if (is_array($t)) {
        return addslashes(strip_tags($t[0]));
    } else
        return addslashes(strip_tags($t));
}

function message($mesaj): string
{
    return addslashes(strip_tags($mesaj, '<br><br/><br /><a><b><strong><em><i><div><p><img><li><ul><ol><table><tr><td><h1><h2><h2><h3><h4><h5><h6>'));
}


