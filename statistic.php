<?php
/**
 * Created by PhpStorm.
 * User: emilychen
 * Date: 25/09/15
 * Time: 10:35 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new PDO('mysql:host=localhost;dbname=travel;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//for($i=0; $i<281; $i++)
//{
//    $stmt = $db->query("SELECT * FROM `zone_distance` where `o_fid` = $i ");
//    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//   echo $i.' :'.sizeof($rows).'<br>';
//    $html = $i;
//    foreach($rows as $row)
//    {
//        $html.= '('.$row['o_fid'].','.$row['d_fid'].')';
//    }
//}

$stmt = $db->query("SELECT COUNT(*) FROM `zone_distance`");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo cout($rows);