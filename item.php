<?php
include("dbConnection/connect.php");
include("method.php");
$db = new connection();
//echo $db->sms;
$mod=new phpMethod();

$fetch[0]="";
$fetch[1]="";
$message="";







$varItemId=mysqli_real_escape_string($db->link,isset($_POST["itemId"])?$_POST["itemId"]:"");
$varItemName=mysqli_real_escape_string($db->link,isset($_POST["itemName"])?$_POST["itemName"]:"");

if(isset($_REQUEST["addBtn"]))
{
  if(!empty($varItemId) and !empty($varItemName))
  {
   $path="item_image/$varItemId.jpg";
   @move_uploaded_file($_FILES["photos"]["tmp_name"],$path);

    $sql="INSERT INTO `item_information`(`ItemId`,`ItemName`) VALUES('$varItemId','$varItemName')";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Insert"."&nbsp;". $mod->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}




if(isset($_REQUEST["editBtn"]))
{
    if(!empty($varItemId) and !empty($varItemName))
  {
    $path="item_image/$varItemId.jpg";
    @move_uploaded_file($_FILES["photos"]["tmp_name"],$path);
    
    $sql="Replace INTO `item_information` (`ItemId`,`ItemName`) VALUES('$varItemId','$varItemName')";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Update"."&nbsp;". $mod->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}


if(isset($_GET["edtId"]))
{
    $sql="SELECT * FROM `item_information` WHERE `ItemId`='".$_GET['edtId']."'";
    $query=$db->link->query($sql);
    if($query)
    {
      $fetch=$query->fetch_array();
      //print_r($fetch);
      //print $fetchData[0];
    }
}






if(isset($_REQUEST["view"]))
{
    echo "<script>location='view_item.php'</script>";
}

if(isset($_REQUEST["cancelBtn"]))
{
    echo exit();
}









?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Creative - Bootstrap Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Nice <span class="lite">Admin</span></a>
      <!--logo end-->

     
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>




          <li class="sub-menu">
                 <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Item Information</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
            
          </li>


          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Item Information</li>
            </ol>
          </div>
        </div>



    <div class="row">
       <section class="col-sm-10" style="margin-left:100px">
            <form name="" method="post" enctype="multipart/form-data">
                          
                      <div class="form-group">
                        <label for="exampleInputEmail1">Item ID:</label>
                        <input type="text" name="itemId" value="<?php echo $fetch[0] ?>"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                       </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Item Name:</label>
                        <input type="text" name="itemName" value="<?php echo $fetch[1] ?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                       </div>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Item Photos:</label>
                        <input type="file" name="photos"  class="form-control"placeholder="Enter email">
                       </div>

                     <div class="col-sm-6">

                      <button type="submit" name="addBtn" class="btn btn-primary">Submit</button>
                      <button type="submit" name="editBtn" class="btn btn-primary">Update</button>
                      <button type="submit" name="view" class="btn btn-danger">Report</button>
                      <button type="submit" name="cancelBtn" class="btn btn-danger">Close</button>
                    </div>
                      </form>
                      <div class="form-group mb-0">
                    <?php echo $message;?>
                </div>
                      
           

      </section>

          <!--/.col-->

          </div>




          
          
            
                




            <!--/.info-box-->
          
          <!--/.col-->

          
        <!--/.row-->
</div>
          <!--/col-->

     </div>

</section>
      <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
