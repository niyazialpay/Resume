<?php

function generateSalt(): string
{
    $charset = 'abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
    $randString = "";
    $randStringLen = 64;

    while(strlen($randString) < $randStringLen) {
        $randChar = substr(str_shuffle($charset), mt_rand(0, strlen($charset)), 1);
        $randString .= $randChar;
    }

    return $randString;
}

function generateStrongPassword($length = 12, $add_dashes = false, $available_sets = 'luds'): string
{
    $sets = [];
    if (str_contains($available_sets, 'l'))
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if (str_contains($available_sets, 'u'))
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if (str_contains($available_sets, 'd'))
        $sets[] = '23456789';
    if (str_contains($available_sets, 's'))
        $sets[] = '!@#$%&*?';

    $all = '';
    $password = '';
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }

    $all = str_split($all);
    for ($i = 0; $i < $length - count($sets); $i++)
        $password .= $all[array_rand($all)];

    $password = str_shuffle($password);

    if (!$add_dashes)
        return $password;

    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while (strlen($password) > $dash_len) {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}

function generateCouponCode($start_with=null, $length=18): string|bool
{
    if($start_with!=null){
        if(strlen($start_with)>$length)
            return false;
        else
            $length = $length-strlen($start_with);
    };
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789';
    $ret = '';
    for($i = 0; $i < $length; ++$i) {
        $random = str_shuffle($chars);
        $ret .= $random[0];
    }
    return strtoupper($start_with.$ret);
}
