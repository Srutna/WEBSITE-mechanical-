<?php
SESSION_START();
include_once '../config/database.php';

$query_m = "SELECT model, COUNT(*) AS n FROM product JOIN tb_iso ON product.id = tb_iso.fk_prod JOIN type ON tb_iso.fk_type = type.id WHERE type.name = 'Motorcycle' GROUP BY (model) ORDER BY model ASC";

$query_a = "SELECT model, COUNT(*) AS n FROM product JOIN tb_iso ON product.id = tb_iso.fk_prod JOIN type ON tb_iso.fk_type = type.id WHERE type.name = 'Auto' GROUP BY (model) ORDER BY model ASC";

$data = new database();
$db = $data->connect();
$model =  array();
$number =  array();
$i = 0;

$x = $_GET['q'];

if ($x == 'm')              //for motorcycle
{
    $rs = $db->query ($query_m) or die ("query error" . mysqli_error($db));
    if ($rs->num_rows > 0)
    {
        while ($rows = $rs->fetch_assoc())
        {
            $model[$i] = $rows['model'];
            $number[$i] = $rows['n'];
            $i++;
        }
        foundData($model, $number, $db);
    }
    else
    {
        noData("There is NO data to show");
    }
}
else            //for automobile
{
    $rs = $db->query ($query_a) or die ("query error" . mysqli_error($db));
    if ($rs->num_rows > 0)
    {
        while ($rows = $rs->fetch_assoc())
        {
            $model[$i] = $rows['model'];
            $number[$i] = $rows['n'];
            $i++;
        }
        foundData($model, $number, $db);
    }
    else
    {
        noData("There is NO data to show");
    }
}

function foundData($model, $number, $db)
{
    echo "
            <div id='accordion'>";
        for ($j = 0; $j < count($model); $j++)
        {
            echo"
                  <div class='card'>
                    <div class='card-header' id='$model[$j]'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapse.$model[$j]' aria-expanded='true' aria-controls='collapse.$model[$j]'>
                         <font size='3'><b>$model[$j]</b></font>
                        </button>
                        <span class='badge badge-primary badge-pill'>$number[$j]</span>
                      </h5>
                    </div>
                    
                    <div id='collapse.$model[$j]' class='collapse show' aria-labelledby='$model[$j]' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>";
            
            $query = "SELECT name, license FROM product WHERE model = '$model[$j]'";
            $rs = $db -> query ($query);
            if ($rs->num_rows > 0)
            {
                while ($row = $rs -> fetch_assoc())
                {
                    $a = $row['name'];
                    $b = $row['license'];
            
                    echo "
                            <tr id = 'ros'>
                              <th scope='row'>Name</th>
                              <td><a href = 'loginform.php'>$a</a></td>
                              <th scope='row'>License</th>
                              <td>$b</td>
                            </tr>";
                }
            }
            else
            {
                noData("Couldn't fetch data from database");
            }
            echo"
                        </tbody>
                    </table>
                </div>
            </div>
          </div>";
        }
        echo "
            </div>
            ";
}

function noData($x)
{
    echo "<div class='alert alert-danger' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
              <strong>$x</strong>
            </div>";
}
?>