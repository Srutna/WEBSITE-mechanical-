<?php 
include_once "../config/database.php";

SESSION_START();
include_once '../config/database.php';

/*$name = $_POST['name'];
$number = $_POST['number'];*/

$progressBar = array ("complete", "active", "disabled");
$progress1 = "active";
$progress2 = "disabled";
$progress3 = "disabled";
$progress4 = "disabled";
$data = new database();
$db = $data->connect();
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../addStyles.css">
        <link rel="stylesheet" href="../styles/repair.css">
        <title>Add product</title>
        <style>
            body {
                padding-top: 1em;
                background-color: #333333;
            }
            .bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #eeeeee; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
/*END Form Wizard*/
            
        </style> 
    </head>
    <body>
        <div class="container">
            
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-sm-3 bs-wizard-step <?php echo $progress1; ?>">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">
                  </div>
                </div>
                
                <div class="col-sm-3 bs-wizard-step <?php echo $progress2 ?>"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>
                </div>
                
                <div class="col-sm-3 bs-wizard-step <?php echo $progress3; ?>"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>
                </div>
                
                <div class="col-sm-3 bs-wizard-step <?php echo $progress4; ?>"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>
                </div>
                
            </div>
        <p id="forms">
            <div id="alert">
            <div class="row">
            <div class="col-md-7">
            <div class="form_main" id="form">
                <h4 class="heading"><strong>Engine</strong><span></span></h4>
                <div class="form">
                    
                    <div class="row mgmt-links-wrapper align-items-center">
                        <div class="col-sm-6">
                            <a href="" onclick='storeGenre("moto")'>
                                <div class="link-box">
                                    <i class="fa fa-motorcycle"></i>
                                    <p id = "moto">Motorcycle</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="" onclick="storeGenre(moto.value)">
                                <div class="link-box">
                                    <i class="fa fa-automobile"></i>
                                    <p id = "car">Automobile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <font color="#ffffff">Name</font>
                    <input type="text" title ="" required="" placeholder="Name" value="" name="data" class="txt name" >
                    <font color="#ffffff">Model</font>
                    <input type="text" title ="" required="" placeholder="Model" value="" name="data" class="txt model">
                    <font color="#ffffff">License</font>
                    <input type="text" title ="" required="" placeholder="License" value="" name="data" class="txt license">
                    <font color="#ffffff">Engine</font>
                    <input type="text" title ="" required="" placeholder="Engine" value="" name="data" class="txt engine">
                    <font color="#ffffff">Bore</font>
                    <input type="text" title ="" placeholder="Bore" value="" name="data" class="txt bore">
                    <font color="#ffffff">Compression Ratio</font>
                    <input type="text" title ="" required="" placeholder="Compression Ratio" value="" name="data" class="txt comp_ratio">
                    <font color="#ffffff">Fuel Delivery</font>
                    <input type="text" title ="" placeholder="Fuel Delivery" value="" name="data" class="txt fuel_delivery">
                    <font color="#ffffff">Ignition</font>
                    <input type="text" title ="" placeholder="Ignition" value="" name="data" class="txt ignition">
                    <font color="#ffffff">Transmission</font>
                    <input type="text" title ="" placeholder="Transmission" value="" name="data" class="txt trans">
                    <font color="#ffffff">Final Drive</font>
                    <input type="text" title ="" placeholder="Final Drive" value="" name="data" class="txt final_drive">
                    
                    <input type="submit" value="submit" name="submit" onclick="storeInfo()"class="txt2">
                </div>
            </div>
            </div>
            </div>
        </p>
        </div>
        <p id="ciao" style="color:white"></p>
        </div>
    
     <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        //class access (all)
        var array = [".name", ".model", ".license", ".engine", ".bore", ".comp_ratio", ".fuel_delivery", ".ignition", ".trans", ".final_drive", ".susp_frnt", ".susp_rear", ".brakes_frnt", ".brakes_rear", ".tires_frnt", ".tires_rear", ".tire", ".dim", ".seat_h", ".seat_capac", ".n_doors", ".wheel_base", ".rake", ".trail", ".grnd_clear", ".fuel_capac", ".fuel_eco", ".wet_weight", ".boot_spc", ".turn_rad", ".steer_type"];
        
        //class name (from engine)
        var clNa = ["susp_frnt", "susp_rear", "brakes_frnt", "brakes_rear", "tires_frnt", "tires_rear", "tire", "dim", "seat_h", "seat_capac", "n_doors", "wheel_base", "rake", "trail", "grnd_clear", "fuel_capac", "fuel_eco", "wet_weight", "boot_spc", "turn_rad", "steer_type"];
        
        //infos (all)
        var info = ["Product's name", "Product's model", "Product's License number", "Product's engine type", "Bore X stroke in mm (ex: 70.0mm x 50.9mm)", "Compression ratio (ex: 13.0:1)", "Method of fuel delivery", "Ignition system", "A machine in a power transmission system, which provides controlled application of the power.", "A final drive sits in the rear of the vehicle, between the two rear wheels.", "Suspension Front type", "Suspension rear type", "Front brakes rotors/discs/pads", "Rear brakes rotors/discs/pads", "Front tire code", "Rear tire code", "Additional info about tires", "L x W x H (in inch)", "In inch","Possible seating place", "Number of doors", "In inch", "Caster angle", "In inch", "In inch", "In gallon", "In mpg", "In pound", "In litres", "Minimum turning radius", "Tyoe of the steer"];
        
        //to store datas
        var store = new Array();
        
        //titles of textboxes (from engine)
        var title = ["Suspension front", "Suspension rear", "Brakes front", "Brakes rear", "Tires front", "Tires rear", "Tire", "Dimensions", "Seat height", "Seat capacity", "Doors", "Wheel base", "Rake", "Trail", "Ground clearence", "Fuel Capacity", "Fuel economy", "Wet weight", "Boot space", "Turning radius", "Steering type"];
        
        //headings
        var heading = ["Chasis", "Dimensions", "Other"];
        
        /*for (var i = 0; i < 10; i++)
            $(array[i]).tooltip({title: info[i], html: true, placement: "right"});*/
        
        $(function(){
            for (var i = 0; i < 10; i++)
                $(array[i]).tooltip({content: info[i], 
                                   position: {
                                      at: "right top-15",
                                      collision: "none"
                                   }
                                });
        });
        
        function storeGenre(x)
        {
            alert(document.getElementsByName(x).value);
        }
        
        function storeInfo()                //chasis
        {
            for (var i = 0; i < 10; i++)
            {
                if (document.getElementsByName("data")[i].value != "")
                    store[i] = document.getElementsByName("data")[i].value;
                else
                    store[i] = "";
            }
            
            <?php $progress2 = $progressBar[1];?>;
            <?php $progress1 = $progressBar[0];?>;
            
            document.getElementById("form").innerHTML = '<h4 class="heading"><strong>'+heading[0]+'</strong><span></span></h4>'+
                '<div class="form">'+
                    '<font color="#ffffff">'+title[0]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[0]+'" value="" name="data" class="txt '+clNa[0]+'">'+
                    '<font color="#ffffff">'+title[1]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[1]+'" value="" name="data" class="txt '+clNa[1]+'">'+
                    '<font color="#ffffff">'+title[2]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[2]+'" value="" name="data" class="txt '+clNa[2]+'">'+
                    '<font color="#ffffff">'+title[3]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[3]+'" value="" name="data" class="txt '+clNa[3]+'">'+
                    '<font color="#ffffff">'+title[4]+'</font>'+
                    '<input type="text" title ="" placeholder="'+title[4]+'" value="" name="data" class="txt '+clNa[4]+'">'+
                    '<font color="#ffffff">'+title[5]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[5]+'" value="" name="data" class="txt  '+clNa[5]+'">'+
                '<font color="#ffffff">'+title[6]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[6]+'" value="" name="data" class="txt  '+clNa[6]+'">'+
                    '<input type="submit" value="submit" name="submit" onclick="storeInfo2()" class="txt2">'+
                '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
        '</p>'+
        '</div>'+
        '</div>';
            
        $(function(){
        for (var i = 10; i < 17; i++)
            $(array[i]).tooltip({content: info[i], 
                               position: {
                                  at: "right top-15",
                                  collision: "none"
                               }
                            });
        });
        }
        
        function storeInfo2()       //dimensions
        {
            var b = 0;
            for (var a = 10; a < 17; a++)
            {
                if (document.getElementsByName("data")[b].value != "")
                    store[a] = document.getElementsByName("data")[b].value;
                else
                    store[a] = "";
                b++;
            }
            
            document.getElementById("form").innerHTML = '<h4 class="heading"><strong>'+heading[1]+'</strong><span></span></h4>'+
                '<div class="form">'+
                    '<font color="#ffffff">'+title[7]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[7]+'" value="" name="data" class="txt '+clNa[7]+'">'+
                    '<font color="#ffffff">'+title[8]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[8]+'" value="" name="data" class="txt '+clNa[8]+'">'+
                    '<font color="#ffffff">'+title[9]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[9]+'" value="" name="data" class="txt '+clNa[9]+'">'+
                    '<font color="#ffffff">'+title[10]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[10]+'" value="" name="data" class="txt '+clNa[10]+'">'+
                    '<font color="#ffffff">'+title[11]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[11]+'" value="" name="data" class="txt '+clNa[11]+'">'+
                    '<font color="#ffffff">'+title[12]+'</font>'+
                    '<input type="text" title ="" placeholder="'+title[12]+'" value="" name="data" class="txt '+clNa[12]+'">'+
                    '<font color="#ffffff">'+title[13]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[13]+'" value="" name="data" class="txt  '+clNa[13]+'">'+
                    '<font color="#ffffff">'+title[14]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[14]+'" value="" name="data" class="txt  '+clNa[14]+'">'+
                    '<font color="#ffffff">'+title[15]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[15]+'" value="" name="data" class="txt  '+clNa[15]+'">'+
                    '<font color="#ffffff">'+title[16]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[16]+'" value="" name="data" class="txt  '+clNa[16]+'">'+
                    '<font color="#ffffff">'+title[17]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[17]+'" value="" name="data" class="txt  '+clNa[17]+'">'+
                    '<input type="submit" value="submit" name="submit" onclick="storeInfo3()" class="txt2">'+
                '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
        '</p>'+
        '</div>'+
        '</div>';
                        
            $(function(){
            for (var i = 17; i < 28; i++)
                $(array[i]).tooltip({content: info[i], 
                                   position: {
                                      at: "right top-15",
                                      collision: "none"
                                   }
                                });
            });
        }
        
        function storeInfo3()   //other
        {
            var b = 0;
            for (var a = 17; a < 28; a++)
            {
                if (document.getElementsByName("data")[b].value != "")
                    store[a] = document.getElementsByName("data")[b].value;
                else if (document.getElementsByName("data")[b].value == "" && a > 17)
                    store[a] = 0.00;
                else
                    store[a] = "";
                b++;
            }
                            
            document.getElementById("form").innerHTML = '<h4 class="heading"><strong>'+heading[2]+'</strong><span></span></h4>'+
                '<div class="form">'+
                    '<font color="#ffffff">'+title[18]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[18]+'" value="" name="data" class="txt '+clNa[18]+'">'+
                    '<font color="#ffffff">'+title[19]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[19]+'" value="" name="data" class="txt '+clNa[19]+'">'+
                    '<font color="#ffffff">'+title[20]+'</font>'+
                    '<input type="text" title ="" required="" placeholder="'+title[20]+'" value="" name="data" class="txt '+clNa[20]+'">'+
                    '<input type="submit" value="Add" name="submit" onclick="storeSend()" class="txt2">'+
                '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
        '</p>'+
        '</div>'+
        '</div>';
            
            $(function(){
            for (var i = 28; i < 31; i++)
                $(array[i]).tooltip({content: info[i], 
                                   position: {
                                      at: "right top-15",
                                      collision: "none"
                                   }
                                });
            });
        }
        
        function storeSend()
        {
            var b = 0;
            for (var a = 28; a < 31; a++)
            {
                if (document.getElementsByName("data")[b].value != "")
                    store[a] = document.getElementsByName("data")[b].value;
                else if (document.getElementsByName("data")[b].value == "" && a != 30)
                    store[a] = 0.00;
                else
                    store[a] = "";
                b++;
            }
            
            var obj = {
                "name": store[0],
                "model": store[1],
                "license": store[2],
                "engine": store[3],
                "bore": store[4],
                "comp_ratio": store[5],
                "fuel_delivery": store[6],
                "ignition": store[7],
                "trans": store[8],
                "final_drive": store[9],
                "susp_frnt": store[10],
                "susp_rear": store[11],
                "brakes_frnt": store[12],
                "brakes_rear": store[13],
                "tires_frnt": store[14],
                "tires_rear": store[15],
                "tire": store[16],
                "dim":store[17],
                "seat_h": store[18],
                "seat_capac": store[19],
                "n_doors": store[20],
                "wheel_base": store[21],
                "rake": store[22],
                "trail": store[23],
                "grnd_clear": store[24],
                "fuel_capac": store[25],
                "fuel_eco": store[26],
                "wet_weight": store[27],
                "boot_spc":store[28],
                "turn_rad": store[29],
                "steer_type": store[30],
            };
            
            obj = JSON.stringify(obj);
            obj = JSON.parse(obj);
            console.log(obj);
            
            
            $.post("s.php",
            {
              data: JSON.stringify(obj)
            },
            function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        }
    </script>
    </body>
</html>