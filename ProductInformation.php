
<?php
include("dbConnection/connect.php");
include("method.php");
$db = new connection();
//echo $db->sms;
$mod= new phpMethod();

$message="";
$filloutcat="";
$fetchData[0]="";
$fetchData[1]="";
$fetchData[2]="";
$fetchData[3]="";
$fetchData[4]="";
$fetchData[5]="";
$fetchData[6]="";
$fetchData[7]="";

$selectItem="Select Item";
$selectCat="Select Category";




$varItemName=mysqli_real_escape_string($db->link,isset($_POST["itemName"])?$_POST["itemName"]:"");
$varCatName=mysqli_real_escape_string($db->link,isset($_POST["CatName"])?$_POST["CatName"]:"");
$varPdtId=mysqli_real_escape_string($db->link,isset($_POST["pdtID"])?$_POST["pdtID"]:"");
$varPdtName=mysqli_real_escape_string($db->link,isset($_POST["pdtName"])?$_POST["pdtName"]:"");
$varPdtPrice=mysqli_real_escape_string($db->link,isset($_POST["pdtPrice"])?$_POST["pdtPrice"]:"");
$varPdtStock=mysqli_real_escape_string($db->link,isset($_POST["pdtStock"])?$_POST["pdtStock"]:"");
$varPdtDetails=mysqli_real_escape_string($db->link,isset($_POST["pdtDetails"])?$_POST["pdtDetails"]:"");


if(isset($_REQUEST["addBtn"]))
{
  if(!empty($varItemName) and !empty($varCatName))
  {
   $path="productImage/$varPdtId.jpg";
   @move_uploaded_file($_FILES["picture"]["tmp_name"],$path);

    $sql="INSERT INTO product_information(`item_name`,`catagory_name`,`product_id`,`product_name`,`product_price`,`product_stock`,`product_details`) VALUES ('$varItemName','$varCatName','$varPdtId','$varPdtName','$varPdtPrice','$varPdtStock','$varPdtDetails')";
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
  if(!empty($varPdtId) and !empty($varPdtPrice))
  {
    $path="productImage/$varPdtId.jpg";
    @move_uploaded_file($_FILES["picture"]["tmp_name"],$path);

    $sql="Replace INTO `product_information`(`item_name`,`catagory_name`,`product_id`,`product_name`,`product_price`,`product_stock`,`product_details`) VALUES ('$varItemName','$varCatName','$varPdtId','$varPdtName','$varPdtPrice','$varPdtStock','$varPdtDetails')";
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
    if(!empty($varPdtId) and !empty($varPdtPrice))
  {
    $sql="DELETE FROM `product_information` WHERE `product_id`='$varPdtId'";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Delete"."&nbsp;". $mod->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}










if(isset($_GET["edtId"]))
{
    $sql="SELECT * FROM `product_information` WHERE `product_id`='".$_GET['edtId']."'";
    $query=$db->link->query($sql);   
    if($query)
    {
      $fetchData=$query->fetch_array();

      $selectItem=$fetchData[0];
      $selectCat=$fetchData[1];
      //print_r($fetch);
      //print $fetchData[0];
    }
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
 



<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function()
  {
    var checking_html = '<img src="loading.gif" /> Checking...';
    $('#ItemName').change(function() //id of item name
    {
      //alert("ok");
      $('#item_result').html(checking_html);
        check_availability();
    }); 
  });
//function to check username availability 
function check_availability()
{
    var item_name = $('#ItemName').val();
    //alert(item_name);
    $.post("check_category_name.php", { item: item_name },  // item is a varriable and item_name of top line
      function(result){
        //if the result is 1
        if(result !=null )
        {
          //show that the username is available
          $('#CatName').html(result);
          $('#item_result').html("");
          $('#category_result').html('');
        }
        else
        {
          //show that the username is NOT available
          $('#category_result').html('No Category Name Found');
          $('#item_result').html("");
          $('#select').html('');
        }
    });

}  

</script>


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
                          <span>Product Informattion</span>
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
              <li><i class="fa fa-laptop"></i>Product Info</li>
            </ol>
          </div>
        </div>



    <div class="row">
       <section class="col-sm-10" style="margin-left:100px">
            <form name="" method="post" action="" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Item Name:</label>
                        <select  name="itemName" class="form-control"  id="ItemName">
                            <option>
                              <?php 
                                    if($fetchData[0]==$selectItem)
                                    {
                                      echo $fetchData[0];
                                    }
                                    else
                                    {
                                      echo $selectItem;
                                    }
                                    ?>
                            </option>

                              <?php
                                  $sql ="SELECT * FROM `item_information`";
                                  $query=$mod->excuteView($sql);
                                   while($fetch=$query->fetch_array())
                                    {
                                  ?>
                                  <option><?php echo $fetch[1];?></option>
                                  <?php
                                    }
                                 ?>

                            
                        </select>
                        
                       </div>


                       <div class="form-group">
                        <label for="exampleInputEmail1">Category Name:</label>
                        <select  name="CatName" class="form-control"  id="CatName">
                            <option>
                                <?php 
                                if($fetchData[0]==$selectCat)
                                {
                                  echo $fetchData[0];
                                }
                                else
                                {
                                  echo $selectCat;
                                }
                                ?>
                      </option>
                        </select>
                        <?php print $filloutcat?> <span id="category_result"></span>
                       </div>

                    

                       <div class="form-group">
                        <label for="exampleInputEmail1">Product ID:</label>
                        <input type="text" name="pdtID" value="<?php echo $fetchData[2];?>"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                       </div>


                        <div class="form-group">
                        <label for="exampleInputEmail1">Product Name:</label>
                        <input type="text" name="pdtName" value="<?php echo $fetchData[3];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                       </div>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Product Price:</label>
                        <input type="text" name="pdtPrice" value="<?php echo $fetchData[4]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                       </div>


                       <div class="form-group">
                        <label for="exampleInputEmail1">Product Stock:</label>
                        <input type="text" name="pdtStock" value="<?php echo $fetchData[5]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                       </div>


                       <div class="form-group">
                        <label for="exampleInputEmail1">Product Details:</label>
                        <textarea class="form-control" name="pdtDetails" value="<?php echo $fetchData[6];?>"> </textarea>
                        
                       </div>

                       

                      <div class="form-group"?>
                        <label for="exampleFormControlFile1">Photo:</label>
                        <input type="file" name="picture" class="form-control" id="exampleFormControlFile1">
                        </div>

                    <button type="submit" name="addBtn" class="btn btn-primary">Submit</button>
                      <button type="submit" class="btn btn-primary" name="editBtn">Update</button>
                     <button type="submit" class="btn btn-primary" name="dltBtn">Delete</button>
                     <button type="submit" class="btn btn-primary" name="viewBtn">Report View</button>
                  </form>
                </section>

                <div class="form-group mb-0">
                    <?php echo $message;?>
                </div>

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
