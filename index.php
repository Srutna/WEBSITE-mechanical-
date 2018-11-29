<?php
SESSION_START();
include_once './config/database.php';

$database = new database();
$db = $database->connect();

$query = "SELECT name, license FROM product";
$result = $db->query($query);

if ($result -> num_rows > 0)
{
    $arr_name = array();
    $arr_number = array();
    $i = 0;
    while ($row = $result->fetch_assoc())
    {
        $arr_name[$i] = $row['name'];
        $arr_number[$i] = $row['license'];
        $i++;
    }
}
else
{
    $_SESSION['alert'] = "Error couldn't find DATABASE";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>

        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles.css">
        <style>
            body {
                padding-top: 1em;
                background-color: #333333;
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
                    <li class="nav-item active">
                        <a class="nav-link"  href="#"><b>Search</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="repair.php"><b>Repair</b></a>
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
        
        <!-- LOGIN POP UP-->

          <!-- Modal body -->
        <div class="modal fade" id="loginPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
        <!--login parameters sent to the file loginForm.php-->
                <div class="modal-body mx-3">
                <form id = "loginForm" action="./forms/loginForm.php" method="post">
                    <div class="md-form mb-5">
                        <p id="p1" style="color:red"></p>
                        <i class="fa fa-user prefix grey-text"></i>
                        Name: <input type="text" id="orangeForm-name"  name="username" placeholder="Insert your name" class="form-control validate" required>
                    </div>
                     <div class="md-form mb-5">
                        <p id="p2" style="color:red"></p>
                        <i class="fa fa-user prefix grey-text"></i>
                        Password: <input type="password" id="orangeForm-name"  name="pass"  placeholder="Your password" class="form-control validate" required>
                    </div>
                </form>                     
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-deep-orange" onclick="controlLogin()">Login</button>
                </div>
            </div>
        </div>
      </div>
    </div>     
    
    <!--modal finish--> 
                
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
        
        <div class="container">
            <div class="row">
              <div class="col-md-7">
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="color:white;"><b>Search</b></th>
                        </tr>
                        <tr>
                          <th>
                              <input list="art_na" id="orangeForm-name"  name="art_name" placeholder="Article Name" class="form-control validate">
                              <datalist id ="art_na">
                        <?php for ($a = 0; $a < count($arr_name); $a++)
                        {  ?>
                                  <option value="<?php echo $arr_name[$a]; ?>">
                        <?php } ?>
                              </datalist>
                          </th>
                        </tr>
                        <tr>
                          <th>
                              <input list="art_number" id="orangeForm-name"  name="art_number" placeholder="Article License" class="form-control validate">
                              <datalist id ="art_number">
                        <?php for ($a = 0; $a < count($arr_number); $a++)
                        {  ?>
                                  <option value="<?php echo $arr_number[$a]; ?>">
                        <?php } ?>
                              </datalist>
                          </th>
                        </tr>
                         <tr>
                            <th>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-deep-orange" onclick="sendForm()"><b>Search</b></button>
                                </div>
                            </th>
                          </tr>
                      </thead>
                  </table>
                </div>
            </div>
        </div>
        
        <p id="ciao"></p>
        <p id="bobo"></p>

        <!-- Styles (so that we can see the grid) -->
        <style scoped>
        .container {
            background: #333333;
            text-align: center;
            padding-top: 100px;
            padding-bottom: 100px;
            }
        </style>
        

        <!-- Initialize Bootstrap functionality -->
        <script>
        // Initialize tooltip component
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

        // Initialize popover component
        $(function () {
          $('[data-toggle="popover"]').popover()
        })
        
        function controlLogin()
        {
            var ps = new Array("p1","p2");
            for (var i = 0; i < 2; i++)
                document.getElementById(ps[i]).innerHTML = "";
            
            var username = document.getElementsByName("username")[0].value;
            var password = document.getElementsByName("pass")[0].value;
            
            if (username == "" || password =="")
            {
                if (username == "")
                    document.getElementById("p1").innerHTML = "<sup>*</sup>This field must not be empty";
                if (password == "")
                    document.getElementById("p2").innerHTML = "<sup>*</sup>This field must not be empty";
            }
            else
                document.getElementById("loginForm").submit();
        }
        function sendForm()
        {
            var name = document.getElementsByName("art_name")[0].value;
            var number = document.getElementsByName("art_number")[0].value;
            
            var xhttp = new XMLHttpRequest();
            
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ciao").innerHTML = this.responseText;
              }
            };
            if (name != "" || number != "")
            {
                xhttp.open("POST", "./forms/search.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("name="+name+"&number="+number);
            }
        }
        </script>
    </body>
</html>