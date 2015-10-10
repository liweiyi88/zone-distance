<?php
/**
 * Created by PhpStorm.
 * User: emilychen
 * Date: 26/09/15
 * Time: 9:50 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);


$db = new PDO('mysql:host=localhost;dbname=travel;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



for($i=0; $i<281; $i++)
{
    $stmt = $db->query("SELECT * FROM `zone_distance` WHERE `o_fid`= $i ");

    $zones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = $i.',';

    foreach($zones as $zone)
    {
        $html .= $zone['duration_value'].',';
    }

    $html = rtrim($html,',');
    echo $html.'<br>';
}







