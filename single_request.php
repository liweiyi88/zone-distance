<?php
/**
 * Created by PhpStorm.
 * User: emilychen
 * Date: 24/09/15
 * Time: 5:19 PM
 */
require_once('Distance.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
$db = new PDO('mysql:host=localhost;dbname=travel;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$stmt = $db->query("SELECT * FROM `zone_distance` WHERE `distance_text` IS NULL OR `distance_value` IS NULL");

$stmt = $db->query("SELECT * FROM `zone_distance` WHERE `distance_text` IS NULL OR `distance_value` IS NULL OR `duration_text` IS NULL OR `duration_value` IS NULL");

$zones = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($zones as $zone)
{
    $o_fid = $zone['o_fid'];
    $d_fid = $zone['d_fid'];
    getSingleRequest($o_fid,$d_fid,$db);
}


function getSingleRequest($o_fid,$d_fid,$db)
{
    $stmt = $db->query("SELECT * FROM `zone` WHERE `fid` = $o_fid");
    $origin =  $stmt->fetch();

    $origin_lon = $origin['lon'];
    $origin_lat = $origin['lat'];


    $stmt = $db->query("SELECT * FROM `zone` WHERE `fid` = $d_fid");
    $destination =  $stmt->fetch();
    $des_lon = $destination['lon'];
    $des_lat = $destination['lat'];

    $request = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origin_lon.",".$origin_lat."&destinations=".$des_lon.",".$des_lat."&key=AIzaSyC_njeivvwlFxZnFr7hKzCo35_05ryOO3U";

    $json_string = file_get_contents($request);
    $parsed_arr = json_decode($json_string,true);


    $dis_text = $parsed_arr['rows'][0]['elements'][0]['distance']['text'];
    $dis_value = $parsed_arr['rows'][0]['elements'][0]['distance']['value'];

    $duration_text = $parsed_arr['rows'][0]['elements'][0]['duration']['text'];
    $duration_value = $parsed_arr['rows'][0]['elements'][0]['duration']['value'];

    $stmt = $db->prepare("UPDATE `zone_distance` SET `distance_text`=?, `distance_value`=?, `duration_text`=?, `duration_value`=?  WHERE o_fid=? AND d_fid=?");
    $stmt->execute(array($dis_text,$dis_value,$duration_text,$duration_value,$o_fid,$d_fid));
//    echo $request;

}






