<?php 
SESSION_START();
include_once './config/database.php';

$data = new database();
$db = $data->connect();
$model =  array();
$number =  array();
$model_a = array();
$number_a = array();
$i = 0;

$query = "SELECT name FROM product";
$result = $db->query($query);

/*for the search bar*/

if ($result -> num_rows > 0)
{
    $arr_name = array();
    $i = 0;
    
    while ($row = $result->fetch_assoc())
    {   $arr_name[$i] = $row['name'];
        $i++;
    }
}
else
    $_SESSION['alert'] = "Error couldn't find DATABASE";

//---------------------------------------------------------------------------------------------------------------

$query_m = "SELECT model, COUNT(*) AS n FROM product JOIN tb_iso ON product.id = tb_iso.fk_prod JOIN type ON tb_iso.fk_type = type.id WHERE type.name = 'Motorcycle' GROUP BY (model) ORDER BY model ASC";

$query_a = "SELECT model, COUNT(*) AS n FROM product JOIN tb_iso ON product.id = tb_iso.fk_prod JOIN type ON tb_iso.fk_type = type.id WHERE type.name = 'Auto' GROUP BY (model) ORDER BY model ASC";

$rs_m = $db->query($query_m) or die ("query error" . mysqli_error($db));
$rs_a = $db->query($query_a) or die ("query error" . mysqli_error($db));

if ($rs_m->num_rows > 0)
{
    while ($rows = $rs_m->fetch_assoc())
    {
        $model[] = $rows['model'];
        $number[] = $rows['n'];
    }
}
else
{
    //noData("There is NO data to show");
}

if ($rs_a->num_rows > 0)
{
    while ($rows = $rs_a->fetch_assoc())
    {
        $model_a[] = $rows['model'];
        $number_a[] = $rows['n'];
    }
}
else
{
    //noData("There is NO data to show");
}
?>

<!--------------------------------------------------------------------------------------------------------------->

<html>
    <head>
        <title>Repair</title>
         <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/repair.css">
        <style>
            body {
                padding-top: 1em;
                background-color: #cdcdcd;
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
        
        <br>
        <br>
        <br>
        <div>
            <?php 
            if (isset($_SESSION['alert']))
            {?>
                <p>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      <strong><?php echo $_SESSION['alert'] ;?></strong>
                    </div>
                </p>
            <?php unset($_SESSION['alert']);
            } 
            else {  ?>
                <p></p>
            <?php } ?>
        
        </div>
        <div class="container h-100">
            <div class="col-md-7">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Search</span>
                  </div>
                  <input list="art_na" id="orangeForm-name" aria-describedby="basic-addon1" name="art_name" placeholder="Article Name" class="form-control validate">
                  <datalist id ="art_na">
                    <?php for ($a = 0; $a < count($arr_name); $a++)
                    {  ?>
                              <option value="<?php echo $arr_name[$a]; ?>">
                    <?php } ?>
                  </datalist>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" style="color:white" onclick= "showArticle()" type="button">Button</button>
                  </div>
                </div>
            </div>
            
<!--------------------------------------------------------------------------------------------------------------->
            
            <div class="row mgmt-links-wrapper align-items-center">
                <div class="col-sm-6" onclick="showModels('m')">
                    <a>
                        <div class="link-box">
                            <i class="fa fa-motorcycle"></i>
                            <p>Motorcycle</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6" onclick="showModels('a')">
                    <a>
                        <div class="link-box">
                            <i class="fa fa-automobile"></i>
                            <p>Automobile</p>
                        </div>
                    </a>
                </div>
            </div>
        
<!--------------------------------------------------------------------------------------------------------------->
            
            <div id = "box_m" style = "display: none">
            <div id = "accordion">
                <?php for ($j = 0; $j < count($model); $j++)
            { ?>
                <div class='card'>
                    <div class='card-header' id='<?php echo $model[$j]; ?>'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapse.<?php echo $model[$j]; ?>' aria-expanded='true' aria-controls='collapse.<?php echo $model[$j]; ?>'>
                         <font size='3'><b><?php echo $model[$j]; ?></b></font>
                        </button>
                        <span class='badge badge-primary badge-pill'><?php echo $number[$j]; ?></span>
                      </h5>
                    </div>  
                    
                    <div id='collapse.<?php echo $model[$j]; ?>' class='collapse show' aria-labelledby='<?php echo $model[$j]; ?>' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>
                    
                    <?php
                    $query_s = "SELECT name, license FROM product WHERE model = '$model[$j]'";
                    $rs_m = $db -> query ($query_s);
                    if ($rs_m->num_rows > 0)
                    {
                        while ($row = $rs_m -> fetch_assoc())
                        {
                            $a = $row['name'];
                            $b = $row['license'];
                    ?>
                            <tr class='clickable-row' data-href='history.php?q=<?php echo $a; ?>'>
                              <th scope='row'>Name</th>
                                <td><?php echo $a; ?></td>
                              <th scope='row'>License</th>
                                <td><?php echo $b; ?></td>
                            </tr>
                    <?php } 
                    } ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>
        </div>
            
<!--------------------------------------------------------------------------------------------------------------->    
        <div id = "box_a" style = "display: none">
            <div id = "accordion">
                <?php for ($j = 0; $j < count($model_a); $j++)
            {  ?>
                <div class='card'>
                    <div class='card-header' id='<?php echo $model_a[$j]; ?>'>
                      <h5 class='mb-0'>
                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapse.<?php echo $model_a[$j]; ?>' aria-expanded='true' aria-controls='collapse.<?php echo $model_a[$j]; ?>'>
                         <font size='3'><b><?php echo $model_a[$j]; ?></b></font>
                        </button>
                        <span class='badge badge-primary badge-pill'><?php echo $number_a[$j]; ?></span>
                      </h5>
                    </div>  
                    
                    <div id='collapse.<?php echo $model_a[$j]; ?>' class='collapse show' aria-labelledby='<?php echo $model_a[$j]; ?>' data-parent='#accordion'>
                      <div class=card-body>'
                        <table class='table table-hover table-dark'>
                          <tbody>
                    
                    <?php
                    $query_s = "SELECT name, license FROM product WHERE model = '$model_a[$j]'";
                    $rs_a = $db -> query ($query_s);
                    if ($rs_a->num_rows > 0)
                    {
                        while ($row = $rs_a -> fetch_assoc())
                        {
                            $c = $row['name'];
                            $d = $row['license'];
                    ?>
                            <tr class='clickable-row' data-href='history.php?q=<?php echo $c; ?>'>
                              <th scope='row'>Name</th>
                                <td><?php echo $c; ?></td>
                              <th scope='row'>License</th>
                                <td><?php echo $d; ?></td>
                            </tr>
                    <?php } 
                    } ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>
        </div>  
    </div>
    
<!--------------------------------------------------------------------------------------------------------------->

        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>
            
        <script>
        function showModels(y)
        {
            var x = document.getElementById("box_m");
            var z = document.getElementById("box_a");
            if (y == 'm'){
                 if (x.style.display == "none" && z.style.display == "none") {
                    x.style.display = "block";
                } else if (x.style.display == "none" && z.style.display == "block"){
                    z.style.display = "none";
                    x.style.display = "block";
                }
                else{
                    x.style.display = "none";}
            }
            else if (y == 'a'){
                if (z.style.display == "none" && x.style.display == "none") {
                    z.style.display = "block";
                } else if (z.style.display == "none" && x.style.display == "block"){
                    x.style.display = "none";
                    z.style.display = "block";
                } else {
                    z.style.display = "none";
                }
            }
        }
        </script>

    </body>
</html>