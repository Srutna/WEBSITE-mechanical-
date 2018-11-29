<?php
include_once './config/database.php';
$q = $_GET['q'];

$data = new Database();
$db = $data->connect();
$info = array();
$service = array();
$fea = array();
$cond = 0;
$i=0;

$title = array ("Bore", "Compression Ratio", "Fuel delivery", "Ignition", "Transmission", "Final drive", "Suspension front", "Suspension rear", "Brakes front", "Brakes rear", "Tires front", "Tires rear", "Tire", "Dimensions", "Seat height", "Seat capacity", "Doors", "Wheel base", "Rake", "Trail", "Ground clearence", "Fuel Capacity", "Fuel economy", "Wet weight", "Boot space", "Turning radius", "Steering type");

$query = "SELECT * FROM product WHERE name = '$q'";
$rs = $db->query($query) or die("Couldn't connect to database");

if ($rs->num_rows > 0)
{
    $row = $rs->fetch_assoc();
    foreach ($row as $value)
    {
        $info[$i] = $value;
        $i++;
    }
}
else
{   //alert
}
$query = "SELECT emp.surname, service.descr, service.date_s, service.pay FROM service JOIN emp ON fk_emp = emp.id WHERE service.fk_prod = (SELECT id FROM product WHERE name = '$q') ORDER BY service.date_s DESC";

$rs_s = $db->query($query) or die ("Couldn't connect to database");

$query = "SELECT type, descr FROM feature JOIN tb_fea_prod ON feature.id = tb_fea_prod.fk_fea WHERE fk_prod = (SELECT id FROM product WHERE name = '$q')";

$fea = $db->query($query) or die ("Couldn't connect to database");

?>
<html>
    <head>
        <title>Repair</title>
        <meta charset="utf-8">
         <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/repair.css">
        <style>
            body {
                padding-top: 1em;
                background-color: #cfcfcf;
            }
            .center_div{
                margin: 0 auto;
                width:80% /* value of your choice which suits your alignment */
            }
        </style> 
    </head>
    <body>
       <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-content">   
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link"  href="index.php"><b>Search</b></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link"  href=""><b>Repair</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Change</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Delete</b></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                <?php 
                if (!isset($_SESSION['username'])){ ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginPopup">Login
                    </button>
                <?php }
                else if (isset($_SESSION['username']) && $_SESSION['username'] == "AKHI") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Profile</b></a>
                    </li>
                <?php }
                else {?>
                    <li class="nav-item">
                        <h5 style="color:white">Welcome <?php echo $_SESSION['username']; ?></h5>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>        
        </div>
        
        <!--navbar-ending -->
<!--------------------------------------------------------------------------------------------------------------->
        </br></br></br></br>
        
        <?php //echo $info[0]; ?>
        <div class = "container" style="border-style:groove; border-width:5px; border-color: #e5e5e5">
            <div class="row">
            <div class="col-md-7 center_div">
                <h4 class="heading" style = "color:#ffffff"><strong>Basic Info</strong><span></span></h4>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th scope="row">Name</th>
                      <td><?php echo $info[1]; ?></td>
                      <th scope="row">Model</th>
                      <td><?php echo $info[2]; ?></td>
                    </tr>
                    <tr >
                      <th scope="row">License</th>
                      <td><?php echo $info[3]; ?></td>
                      <th scope="row">Engine</th>
                      <td><?php echo $info[4]; ?></td>
                    </tr>
                <?php for ($a = 0, $b = 5; $a < count($title)-1; $a++, $b++)
                { ?>
                    <tr name = "tr_hid" style = "display:none">
                      <th scope="row"><?php echo $title [$a]; ?></th>
                      <td><?php echo $info[$b]; ?></td>
                      <th scope="row"><?php echo $title [$a+1]; ?></th>
                      <td><?php echo $info[$b+1]; ?></td>
                    </tr>
                <?php } ?>
                  </tbody>
                  <tbody>
                   <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-deep-orange" onclick="showHiddenModel()"><b>More</b></button></td>
                   </tr>
                  </tbody>
                </table>
            
<!--------------------------------------------------------------------------------------------------------------->
                
                <h4 class="heading" style = "color:#ffffff"><strong>Service</strong><span></span></h4>
                <table class="table table-hover">
                  <tbody>
                    <?php if ($rs_s -> num_rows > 0) 
                    {
                        while ($serv = $rs_s->fetch_assoc())
                        { 
                            if ($cond < 2)
                            {?>
                    <tr>
                      <th scope="row">Employee</th>
                      <td><?php echo $serv['surname']; ?></td>
                      <th scope="row">Description</th>
                      <td><?php echo $serv['descr']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Date</th>
                      <td><?php echo $serv['date_s']; ?></td>
                      <th scope="row">Payment</th>
                      <td><?php echo $serv['pay']; ?>€</td>
                    </tr>
                    </tbody>
                    <?php
                        $cond++;}
                            else
                            { ?>
                    <tbody>
                        <tr name = "tr_hid_serv" style = "display:none">
                          <th scope="row">Employee</th>
                          <td><?php echo $serv['surname']; ?></td>
                          <th scope="row">Description</th>
                          <td><?php echo $serv['descr']; ?></td>
                        </tr>
                        <tr name = "tr_hid_serv" style = "display:none">
                          <th scope="row">Date</th>
                          <td><?php echo $serv['date_s']; ?></td>
                          <th scope="row">Payment</th>
                          <td><?php echo $serv['pay']; ?>€</td>
                        </tr>
                    </tbody>
                    <tbody>
                    <?php
                            }
                        } ?>
                       <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-deep-orange" onclick="showHiddenService()"><b>More</b></button></td>
                       </tr>
                    <?php
                    }
                  else
                  { ?>
                      <h6 align = right><em>Hasn't fixed yet</em></h6>
                  <?php }?>
                  </tbody>
                </table>
            
<!--------------------------------------------------------------------------------------------------------------->
                
                <h4 class="heading" style = "color:#ffffff"><strong>Feature</strong><span></span></h4>
                <table class="table table-hover">
                  <tbody>
                  <?php if ($fea -> num_rows > 0) 
                    { 
                        while ($row = $fea->fetch_assoc()){ ?>
                    <tr>
                      <th scope="row">Type</th>
                      <td><?php echo $row['type']; ?></td>
                      <th scope="row">Description</th>
                      <td><?php echo $row['descr']; ?></td>
                    </tr>
                  <?php }
                    }  else
                    { ?>
                      <h6 align = right><em>No Description added</em></h6>
                    <?php }?>
                  </tbody>
                </table>
                
<!--------------------------------------------------------------------------------------------------------------->
            
            <script>
            function showHiddenModel()
            {
                for (var a = 0; a < 29; a++)
                {
                    if(document.getElementsByName("tr_hid")[a].style.display == "none")
                        document.getElementsByName("tr_hid")[a].style.display = "table-row";
                    else
                        document.getElementsByName("tr_hid")[a].style.display = "none"
                }
            }
            function showHiddenService()
            {
                for (var a = 0; a < 29; a++)
                {
                    if(document.getElementsByName("tr_hid_serv")[a].style.display == "none")
                        document.getElementsByName("tr_hid_serv")[a].style.display = "table-row";
                    else
                        document.getElementsByName("tr_hid_serv")[a].style.display = "none"
                }
            }
            </script>
            </div>
            </div>
        </div> 
    </body>
</html>