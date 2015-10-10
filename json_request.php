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

$stmt = $db->query("SELECT * FROM `zone`");
$rows = $stmt->fetchAll(PDO::FETCH_NUM);


for($i=191;$i<194;$i++)
{
    $origin_id = $rows[$i][1];
    $origin_lon = $rows[$i][5];
    $origin_lat = $rows[$i][4];

    for($j=0;$j<281;$j++)
    {
        $des_id = $rows[$j][1];
        $des_lon = $rows[$j][5];
        $des_lat = $rows[$j][4];
        $json_string = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origin_lon.",".$origin_lat."&destinations=".$des_lon.",".$des_lat."&key=AIzaSyC_njeivvwlFxZnFr7hKzCo35_05ryOO3U");
        $parsed_arr = json_decode($json_string,true);


        $dis_text = $parsed_arr['rows'][0]['elements'][0]['distance']['text'];
        $dis_value = $parsed_arr['rows'][0]['elements'][0]['distance']['value'];
        $duration_text = $parsed_arr['rows'][0]['elements'][0]['duration']['text'];
        $duration_value = $parsed_arr['rows'][0]['elements'][0]['duration']['value'];


        $statement = $db->prepare("INSERT INTO `zone_distance`(`o_fid`, `d_fid`,`distance_text`,`distance_value`,`duration_text`,`duration_value`)
                                   VALUES(?, ?, ?, ?, ?, ?)"
        );
        $statement->execute(array($origin_id, $des_id, $dis_text,$dis_value,$duration_text,$duration_value));
    }

}






