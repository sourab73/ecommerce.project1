
<?php
include("dbConnection/connect.php");
include("method.php");
$db = new connection();
//echo $db->sms;
$mod= new phpMethod();
$message="";


$fetchData[0]="";
$fetchData[1]="";
$fetchData[2]="";

$selectItem="Select Item";
$message="";

$varItemName=mysqli_real_escape_string($db->link,isset($_POST["itemName"])?$_POST["itemName"]:"");
$varCatId=mysqli_real_escape_string($db->link,isset($_POST["catId"])?$_POST["catId"]:"");
$varCatName=mysqli_real_escape_string($db->link,isset($_POST["catName"])?$_POST["catName"]:"");


if(isset($_REQUEST["addBtn"]))
{
  if(!empty($varItemName) and !empty($varCatId))
  {
    $path="cat_image/$varCatId.jpg";
    @move_uploaded_file($_FILES["picture"]["tmp_name"],$path);
    
    $sql="INSERT INTO `category_information`(`ItemName`, `CatID`, `CatName`) VALUES ('$varItemName','$varCatId','$varCatName')";
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
  if(!empty($varItemName) and !empty($varCatId))
  {
    $sql="Replace INTO `category_information`(`ItemName`, `CatID`, `CatName`) VALUES ('$varItemName','$varCatId','$varCatName')";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Update"."&nbsp;". $mod->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}






if(isset($_REQUEST["dltBtn"]))
{
  if(!empty($varItemName) and !empty($varCatId))
  {
    $sql="DELETE FROM `category_information` WHERE CatID='$varCatId'";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data delete"."&nbsp;". $mod->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}






if(isset($_GET["edtId"]))
{
    $sql="SELECT * FROM `category_information` WHERE `CatID`='".$_GET['edtId']."'";
    $query=$db->link->query($sql);
    if($query)
    {
      $fetchData=$query->fetch_array();
      //print_r($fetch);
      print $fetchData[1];
      
    }
}



if(isset($_GET["dltId"]))
{
    $sql="DELETE FROM `category_information` WHERE `CatID`='".$_GET['dltId']."'";
    $query=$db->link->query($sql);
    if($query)
    {
      echo"Delete success";
    }
}




if(isset($_REQUEST["viewBtn"]))
{
    echo "<script>location='view_category.php'</script>";
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
                          <span>Catagory Info</span>
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
              <li><i class="fa fa-laptop"></i>Category Info</li>
            </ol>
          </div>
        </div>



    <div class="row">
       <section class="col-sm-10" style="margin-left:100px">
            <form name="" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Item Name:</label>
                        <select class="form-control" name="itemName" placeholder="Select One">
                            <option>select one</option>

                              <?php
                                  $sql="SELECT * FROM `item_information`";
                                  $query=$mod->excuteView($sql);
                                  while($fetch=$query->fetch_array())
                                  {
                                ?>
                                      <option><?php echo $fetch[1];?></option>
                                <?php
                                  }
                                ?>


                        </select>
                        <?php echo $nulMessage=isset($nulMessage)?$nulMessage:""; ?>
                       </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Category ID:</label>
                        <input type="text" name="catId" value="<?php echo $fetchData[1];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                       </div>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Category Name:</label>
                        <input type="text" name="catName" value="<?php echo $fetchData[2];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php echo $nulMessage=isset($nulMessage)?$nulMessage:""; ?>
                       </div>

                      <div class="form-group">
                        <label for="exampleFormControlFile1">Photo:</label>
                        <input type="file" name="picture" class="form-control" id="exampleFormControlFile1">
                        <?php echo $nulMessage=isset($nulMessage)?$nulMessage:""; ?>
                      </div>
                    <button type="submit" name="addBtn" class="btn btn-primary">Submit</button>
                      <button type="submit" class="btn btn-primary" name="editBtn">Update</button>
                     <button type="submit" class="btn btn-primary" name="dltBtn">Delete</button>
                     <button type="submit" class="btn btn-primary" name="viewBtn">Report View</button>
                  </form>
                      
           

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
