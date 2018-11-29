<?php
include_once '../config/database.php';

$data = $_POST['data'];

$db = new database();
$db = $db->connect();

$data = json_decode($data, TRUE);

$arr = array();
$i = 0;

foreach ($data as $val)
{
    $arr[$i] = $val;
    $i++;
}

$query = "INSERT INTO product (name, model, license, engine, bore, comp_ratio, fuel_delivery, ignition, trans, final_drive, susp_frnt, susp_rear, brakes_frnt, brakes_rear, tires_frnt, tires_rear, tire, dim, seat_h, seat_capac, n_doors, wheel_base, rake, trail, grnd_clear, fuel_capac, fuel_eco, wet_weight, boot_spc, turn_rad, steer_type) VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[6]', '$arr[7]', '$arr[8]', '$arr[9]', '$arr[10]', '$arr[11]', '$arr[12]', '$arr[13]', '$arr[14]', '$arr[15]', '$arr[16]', '$arr[17]', $arr[18], $arr[19], $arr[20], $arr[21], $arr[22], $arr[23], $arr[24], $arr[25] , $arr[26], $arr[27], $arr[28], $arr[29], '$arr[30]')";

if (!mysqli_query($db, $query))
    echo mysqli_error($db);
else
    echo "saved";
?>