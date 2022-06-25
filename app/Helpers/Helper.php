<?php
function dateformat($datetime, $type='d.m.Y H:i:s', $timezone='UTC'): bool|string
{
    $tz = new DateTimeZone($timezone);
    try {
        $dateset = DateTimeImmutable::createFromFormat('U', strtotime($datetime));
        $dateset->setTimezone($tz);
        return $dateset->format($type);

    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}


function rich_snipped_fix($text): array|string
{
    return str_replace("\\","\\\\",trim(preg_replace('/\s+/', ' ',stripslashes($text))));
}

function DetectIPAddress(): string
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $ipexp=explode(',',$ip);
    return $ipexp[0];
}

function CheckPrivacy($data, $privacy, $date=false, $share_token=null)
{
    $length = strlen($data);
    if ($date){
        if($share_token){
            return dateformat($data, 'd.m.Y');
        }
        else{
            if ($privacy->show_birthday){
                if($privacy->birthday_only_year) return dateformat($data, 'Y');
                else return dateformat($data, 'd.m.Y');
            }
            else
                return substr_replace($data, str_repeat("*", $length-3), 1, $length-2);
        }
    }
    else{
        if($share_token){
            return $data;
        }
        else{
            if ($privacy){
                return $data;
            }
            else{
                return substr_replace($data, str_repeat("*", $length-3), 1, $length-2);
            }
        }
    }
}
