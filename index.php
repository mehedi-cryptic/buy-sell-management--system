
<?php


$connection = mysqli_connect("localhost","root","","kenabecha");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}


$sql1="select count(post_id) as total from post where post_category_id='9' and post_status='1' and selling_status='0'";
$result1 =  mysqli_query($connection,$sql1);
$value1 = mysqli_fetch_assoc($result1);
$total_mobile = $value1['total'];

$sql2="select count(post_id) as total from post where post_category_id='10' and post_status='1' and selling_status='0'";
$result2 =  mysqli_query($connection,$sql2);
$value2 = mysqli_fetch_assoc($result2);
$total_pc = $value2['total'];

$sql3="select count(post_id) as total from post where post_category_id='11' and post_status='1' and selling_status='0'";
$result3 =  mysqli_query($connection,$sql3);
$value3 = mysqli_fetch_assoc($result3);
$total_vehicle = $value3['total'];

$sql4="select count(post_id) as total from post where post_category_id='12' and post_status='1' and selling_status='0'";
$result4 =  mysqli_query($connection,$sql4);
$value4 = mysqli_fetch_assoc($result4);
$total_property = $value4['total'];

$sql5="select count(post_id) as total from post where post_category_id='15' and post_status='1' and selling_status='0'";
$result5 =  mysqli_query($connection,$sql5);
$value5 = mysqli_fetch_assoc($result5);
$total_electronic = $value5['total'];


$sql7="select count(post_id) as total from post where post_category_id='14' and post_status='1' and selling_status='0'";
$result7 =  mysqli_query($connection,$sql7);
$value7 = mysqli_fetch_assoc($result7);
$total_pets = $value7['total'];



?>


<?php



$sql1="select count(post_id) as total from post where post_status='1' ";
$result1 =  mysqli_query($connection,$sql1);
$value1 = mysqli_fetch_assoc($result1);
$total_post = $value1['total'];

$percent_mobile=number_format(($total_mobile/$total_post)*100);

$percent_pc=number_format(($total_pc/$total_post)*100);

$percent_vehicle=number_format(($total_vehicle/$total_post)*100);

$percent_property=number_format(($total_property/$total_post)*100);

$percent_electronic=number_format(($total_electronic/$total_post)*100);


$percent_pets=number_format(($total_pets/$total_post)*100);




?>



<script type="text/javascript">

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "AD counter chart"
	},
	axisY: {
		title: "Number of post",
	
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "Mobile",  y: <?php echo $total_mobile ;?> },
			{ label: "PC & Laptop", y: <?php echo $total_pc ;?>  },
			{ label: "Vehicle", y: <?php echo $total_vehicle ;?>  },
			{ label: "Property",  y: <?php echo $total_property ;?>  },
			{ label: "Electronics",  y: <?php echo $total_electronic ;?> },
			{ label: "Pets & Animals",  y: <?php echo $total_pets ;?> }
		]
	}
	]
});

chart.render();

}

</script>





<?php include "includes/header.php" ?>
 
 
<body>


	<section id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
				
                    <h2>top marketplace trends</h2>
					
                </div>

    			 <?php 
    			 global $connection;
                    $query = "SELECT * FROM categories LIMIT 5";
                    $cat_result = mysqli_query($connection,$query);
                    if ($cat_result) {
                        $i=0;
                        while ($row = mysqli_fetch_assoc($cat_result)) {
                            $cat_id[$i] = $row['cat_id'];
                            $cat_title[$i] = $row['cat_title'];
                            $cat_logo[$i] = $row['cat_logo'];

                        $i++;}

                    }

                 ?>
                <div class="col-md-6">
                    <div class="categories-item">
                        <div class="single-categories-item item1">
                            <div class="item-content">
                                <a href="ads.php?p_id=<?php echo $cat_id[0]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[0]; ?>" alt="">
                                <h3><?php echo $cat_title[0]; ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="single-categories-item item3">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[1]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[1]; ?>" alt="">
                                <h3><?php echo $cat_title[1]; ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="single-categories-item item4">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[2]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[2]; ?>" alt="">
                                <h3><?php echo $cat_title[2]; ?></h3>
                                 </a>
                            </div>
                        </div>
                        <div class="single-categories-item item5">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[3]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[3]; ?>" alt="">
                                <h3><?php echo $cat_title[3]; ?></h3>
                                 </a>
                            </div>
                        </div>
                        <div class="single-categories-item item6">
                            <div class="item-content">
                            	<a href="ads.php?p_id=<?php echo $cat_id[4]; ?>">
                                <img src="assets/img/<?php echo $cat_logo[4]; ?>" alt="">
                                <h3><?php echo $cat_title[4]; ?></h3>
                                 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	
	<br><br><br><br>

<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="canvasjs.min.js"></script>


	<br><br><br><br>
	

<!-- ======= Counts Section ======= --> 
 
<section class="counts section-bg">
	
    <div class="container">
	  
	    <div class="section-title">
          <br><h2 style="  font-family:Segoe Script;">AD counter</h2>
		</div>

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="5">
            <div class="count-box">
              <i class="icofont-smart-phone" style="color: #20b38e;"></i>
			  Total AD
              <span data-toggle="counter-up"><?php echo $total_mobile;?></span>	
              AD Percentage			  
              <span ><?php echo $percent_mobile;?>%</span>
			  <br>
              <h4><b>Mobile</b></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="10">
            <div class="count-box">
              <i class="icofont-computer" style="color: #c042ff;"></i>
			  Total AD
              <span data-toggle="counter-up"><?php echo $total_pc;?></span>
			   AD Percentage		
			  <span ><?php echo $percent_pc;?>%</span>
			  <br>
              <h4><b>PC & Laptop</b></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="15">
            <div class="count-box">
              <i class="icofont-car" style="color: #46d1ff;"></i>
			   Total AD
              <span data-toggle="counter-up"><?php echo $total_vehicle;?></span>
			   AD Percentage
			  <span ><?php echo $percent_vehicle;?>%</span>
			  <br>
              <h4><b>Vehicle</b></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="20">
            <div class="count-box">
              <i class="icofont-building" style="color: #ffb459;"></i>
			  Total AD
              <span data-toggle="counter-up"><?php echo $total_property;?></span>
			  AD Percentage
			  <span ><?php echo $percent_property;?>%</span>
			  <br>
              <h4><b>Property</b></h4>
            </div>
          </div>
		 
		   <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="10">
            <div class="count-box">
              <i class="icofont-tools" style="color: #666633;"></i>
			   Total AD
              <span data-toggle="counter-up"><?php echo $total_electronic;?></span>
			  AD Percentage
              <span ><?php echo $percent_electronic;?>%</span>
			  <br>
              <h4><b>Electronics</b></h4>
            </div>
          </div>
		  
		  <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="15">
            <div class="count-box">
              <i class="icofont-dog" style="color: #b33c00;"></i>
			   Total AD
              <span data-toggle="counter-up"><?php echo $total_pets;?></span>
			   AD Percentage
              <span ><?php echo $percent_pets;?>%</span>
			  <br>
              <h4><b>Pets & Animals</b></h4>
            </div>
          </div>
		  
        </div>
    </div>
</section><!-- End Counts Section -->	
  
</body>
	
	
	
	
	
	<?php include "includes/footer.php" ?>	