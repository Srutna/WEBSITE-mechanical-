<?php 
SESSION_START();
include_once '../config/database.php';

$name = $_POST['name'];
$number = $_POST['number'];

$data = new database();
$db = $data->connect();

if (isset ($_SESSION['username']))
    $option = "active";
else
    $option = "disabled";
    

function sendResponse($name, $model, $license, $engine, $bore, $comp_ratio, $fuel_delivery, $ignition, $trans, $final_drive, $susp_frnt, $susp_rear, $brakes_frnt, $brakes_rear, $tires_frnt, $tires_rear, $tire, $dim, $seat_h, $seat_capac, $n_doors, $wheel_base, $rake, $trail, $grnd_clear, $fuel_capac, $fuel_eco, $wet_weight, $boot_spc, $turn_rad, $steer_type, $result2, $option)
{
    echo "<div class='container'>
          <div class='row'>
            <div class='col'>
                <div id='accordion'>
                  <div class='card'>
                    <div class='card-header' id='headingOne'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                         <font size='4'><b>Engine</b></font>
                         <button type='button' class='btn btn-secondary' $option onclick='addForm.submit()'>Change</button>
                        </button>
                      </h5>
                    </div>
                    
                    <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>
                            <tr>
                              <th scope='row'>name</th>
                              <td>$name</td>
                            </tr>
                            <tr>
                              <th scope='row'>Model</th>
                              <td>$model</td>
                            </tr>
                            <tr>
                              <th scope='row'>License Number</th>
                              <td>$license</td>
                            </tr>
                            <tr>
                              <th scope='row'>Engine-type</th>
                              <td>$engine</td>
                            </tr>
                            <tr>
                              <th scope='row'>Bore-Stroke</th>
                              <td>$bore</td>
                            </tr>
                            <tr>
                              <th scope='row'>Compression-Ratio</th>
                              <td>$comp_ratio</td>
                            </tr>
                            <tr>
                              <th scope='row'>Fuel Delivery</th>
                              <td>$fuel_delivery</td>
                            </tr>
                            <tr>
                              <th scope='row'>Ignition</th>
                              <td>$ignition</td>
                            </tr>
                            <tr>
                              <th scope='row'>Transmission</th>
                              <td>$trans</td>
                            </tr>
                            <tr>
                              <th scope='row'>Final Drive</th>
                              <td>$final_drive</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                    
                    <div class='card'>
                    <div class='card-header' id='headingTwo'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                          <font size='4'><b>Chasis</b></font><button type='button' class='btn btn-secondary' $option onclick='addForm.submit()'>Change</button>
                        </button>
                      </h5>
                    </div>
                    
                    <div id='collapseTwo' class='collapse show' aria-labelledby='headingTwo' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>
                            <tr>
                              <th scope='row'>Suspension Front</th>
                              <td>$susp_frnt</td>
                            </tr>
                            <tr>
                              <th scope='row'>Suspension Rear</th>
                              <td>$susp_rear</td>
                            </tr>
                            <tr>
                              <th scope='row'>Brakes Front</th>
                              <td>$brakes_frnt</td>
                            </tr>
                            <tr>
                              <th scope='row'>Brakes Rear</th>
                              <td>$brakes_rear</td>
                            </tr>
                            <tr>
                              <th scope='row'>Tires Front</th>
                              <td>$tires_frnt</td>
                            </tr>
                            <tr>
                              <th scope='row'>Tires Rear</th>
                              <td>$tires_rear</td>
                            </tr>
                            <tr>
                              <th scope='row'>Tire Type</th>
                              <td>$tire</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                    
                    <div class='card'>
                    <div class='card-header' id='headingThree'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                          <font size='4'><b>Dimensions</b></font><button type='button' class='btn btn-secondary' $option onclick='addForm.submit()'>Change</button>
                        </button>
                      </h5>
                    </div>
                    
                    <div id='collapseThree' class='collapse show' aria-labelledby='headingThree' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>
                            <tr>
                              <th scope='row'>Dimension</th>
                              <td>$dim</td>
                            </tr>
                            <tr>
                              <th scope='row'>Seat Height</th>
                              <td>$seat_h</td>
                            </tr>
                            <tr>
                              <th scope='row'>Seat Capacity</th>
                              <td>$seat_capac</td>
                            </tr>
                            <tr>
                              <th scope='row'>Doors</th>
                              <td>$n_doors</td>
                            </tr>
                            <tr>
                              <th scope='row'>Wheel Base</th>
                              <td>$wheel_base</td>
                            </tr>
                            <tr>
                              <th scope='row'>Rake</th>
                              <td>$rake</td>
                            </tr>
                            <tr>
                              <th scope='row'>Trail</th>
                              <td>$trail</td>
                            </tr>
                            <tr>
                              <th scope='row'>Ground Clearence</th>
                              <td>$grnd_clear</td>
                            </tr>
                            <tr>
                              <th scope='row'>Fuel Capacity</th>
                              <td>$fuel_capac</td>
                            </tr>
                            <tr>
                              <th scope='row'>Fuel economy</th>
                              <td>$fuel_eco</td>
                            </tr>
                            <tr>
                              <th scope='row'>Wet Weight</th>
                              <td>$wet_weight</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                    
                    <div class='card'>
                    <div class='card-header' id='headingFour'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseFour' aria-expanded='true' aria-controls='collapseFour'>
                          <font size='4'><b>Other</b></font><button type='button' class='btn btn-secondary' $option onclick='addForm.submit()'>Change</button>
                        </button>
                      </h5>
                    </div>
                    
                    <div id='collapseFour' class='collapse show' aria-labelledby='headingFour' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>
                           <tr>
                              <th scope='row'>Boot Space</th>
                              <td>$boot_spc</td>
                            </tr>
                            <tr>
                              <th scope='row'>Turning Radiation</th>
                              <td>$turn_rad</td>
                            </tr>
                            <tr>
                              <th scope='row'>Steer Type</th>
                              <td>$steer_type</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>";
                  
                  
            if ($result2 -> num_rows > 0)
            {
                echo"
                  <div class='card'>
                    <div class='card-header' id='headingFive'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseFive' aria-expanded='true' aria-controls='collapseFive'>
                          <font size='4'><b>Features</b></font><button type='button' class='btn btn-secondary' $option onclick='addForm.submit()'>Change</button>
                        </button>
                      </h5>
                    </div>
                    
                    <div id='collapseFive' class='collapse show' aria-labelledby='headingFive' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                        <thead>
                            <tr>
                                <th scope = 'col'>Type</th>
                                <th scope = 'col'>Description</th>
                            </tr>
                          <tbody>";
    
                    while ($row = $result2->fetch_assoc())
                    {
                        $type = $row['type'];
                        $descr = $row ['descr'];
                        echo "
                           <tr>
                              <td>$type/th>
                              <td>$descr</td>
                            </tr>";
                    }
                    echo"
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>";
            }                        
             
    echo"
              </div>
            </div>
          </div>
        </div>";
}

function numberResult($result, $result2, $option)
{
    $row = $result->fetch_assoc();
    $name=$row['name'];
    $model = $row['model'];
    $license = $row['license'];
    $engine = $row['engine'];
    $bore = $row['bore'];
    $comp_ratio = $row['comp_ratio'];
    $fuel_delivery = $row ['fuel_delivery'];
    $ignition = $row['ignition'];
    $trans = $row['trans'];
    $final_drive = $row['final_drive'];
    $susp_frnt = $row['susp_frnt'];
    $susp_rear = $row['susp_rear'];
    $brakes_frnt = $row['brakes_frnt'];
    $brakes_rear = $row['brakes_rear'];
    $tires_frnt = $row['tires_frnt'];
    $tires_rear = $row['tires_rear'];
    $tire = $row['tire'];
    $dim = $row['dim'];
    $seat_h = $row['seat_h'];
    $seat_capac = $row['seat_capac'];
    $n_doors = $row['n_doors'];
    $wheel_base = $row['wheel_base'];
    $rake = $row['rake'];
    $trail = $row['trail'];
    $grnd_clear = $row['grnd_clear'];
    $fuel_capac = $row['fuel_capac'];
    $fuel_eco = $row['fuel_eco'];
    $wet_weight = $row['wet_weight'];
    $boot_spc = $row['boot_spc'];
    $turn_rad = $row['turn_rad'];
    $steer_type = $row['turn_rad'];

    sendResponse($name, $model, $license, $engine, $bore, $comp_ratio, $fuel_delivery, $ignition, $trans, $final_drive, $susp_frnt, $susp_rear, $brakes_frnt, $brakes_rear, $tires_frnt, $tires_rear, $tire, $dim, $seat_h, $seat_capac, $n_doors, $wheel_base, $rake, $trail, $grnd_clear, $fuel_capac, $fuel_eco, $wet_weight, $boot_spc, $turn_rad, $steer_type, $result2, $option);
}

function addNew($ref_n, $ref_num, $option)
{
    if ($ref_n == '0')
        $_SESSION['ref_num'] = $ref_num;
    else
        $_SESSION['ref_n'] = $ref_n;
    
    echo "
    <p>
        <div class='alert alert-danger' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
          <strong><center>NO reference found</center></strong>
        </div>
    </p>
    <form id = 'addForm' method = 'post' action= './insert/add.php'>
        <div class='d-flex justify-content-center'>
            <button type='button' class='btn btn-secondary btn-lg btn-block' $option onclick='addForm.submit()'>ADD NEW</button>
        </div>
    </form>";
echo $option;
    
}

if ($name != "" )               //when name isnt void
{
    $query = "SELECT * FROM product WHERE name = '$name'";
    $result = $db->query ($query) or die ("query error" . mysqli_error($db));
    
    if ($result -> num_rows <= 0)           //when name didnt give any result
    {
        if ($number != "")                  //number isnt void
        {
            $query = "SELECT * FROM product WHERE license = '$number'";
            $result = $db->query ($query);
            
            if ($result -> num_rows > 0)                //number returned results
            {
                $query = "SELECT descr, type FROM feature JOIN tb_fea_prod ON feature.id = tb_fea_prod.fk_fea WHERE tb_fea_prod.fk_prod = (SELECT id FROM product WHERE name = '$name')";
                $result2 = $db->query ($query) or die ("query error" . mysqli_error($db));
                
                numberResult($result, $result2, $option);
            }
        }
        else                    //number is void but name isnt
            addNew($name,'0', $option);
    }
    else
    {
        $query = "SELECT descr, type FROM feature JOIN tb_fea_prod ON feature.id = tb_fea_prod.fk_fea WHERE tb_fea_prod.fk_prod = (SELECT id FROM product WHERE name = '$name')";
        $result2 = $db->query ($query) or die ("query error" . mysqli_error($db));
        
        numberResult($result, $result2, $option);
    }
}
else if ($number != "")
{
    $query = "SELECT * FROM product WHERE license = '$number'";
    $result = $db->query ($query);
    
    if ($result -> num_rows > 0)
    {
        $query = "SELECT descr, type FROM feature JOIN tb_fea_prod ON feature.id = tb_fea_prod.fk_fea WHERE tb_fea_prod.fk_prod = (SELECT id FROM product WHERE license = '$number')";
        $result2 = $db->query ($query) or die ("query error" . mysqli_error($db));
        
        numberResult($result, $result2, $option);
    }
    else
        addNew('0',$number, $option);
}

?>
