<?php include "include/header.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->
			
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}
  
.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}


</style>
     

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="padding-bottom: 25%;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            List of Buyer/Seller
                            <!-- <small>External User List</small> -->
                        </h1>
                        <br><br>
                       
                        <div class="row" >
                            <?php 
                                    if (isset($_GET['del_user_id'])) {
                                        $del_id = $_GET['del_user_id'];

                                        $select_query = "select user_photo from users where user_id = $del_id ";
                                            $result_query = $db->select($select_query);
                                            if ($result_query) {

                                                $image_row = $result_query->fetch_array();
                                                $item_img = $image_row['user_photo'];
                                                unlink('../assets/img/'.$item_img);
                                                
                                            }

                                        $query = "delete from users where user_id = $del_id";
                                        $del_result = $db->delete($query);
                                        if ($del_result) {
                                            echo "<p style='color:green;text-align:center;font-size:20px;'>User deleted successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete User</p>";
                                        }
                                    }

                                 ?>
                            <div class="col-md-12">
                               <!--  <h2 style="text-align: center;">View List</h2> -->
                                <div class="table-responsive">
								    <div class="panel panel-primary filterable">
                                        <div class="panel-heading" style="height:50px">
                                            <h3 class="panel-title" style="font-size:18px">User List (last 50)</h3>
                                            <div class="pull-right">
                                                <button style="font-size:17px" class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
               
				                            </div>
				
                                        </div>
                                        <table class="table table-bordered table-hover table-striped" id="myTable">

									        <thead>
                                            <tr class="filters" style="background-color:#FAEBD7">
                                                <th><input style="font-size:18px" type="text" class="form-control" placeholder="User ID" disabled></th>
                                                <th><input style="font-size:18px" type="text" class="form-control" placeholder="Email" disabled></th>
                                                <th><input style="font-size:18px" type="text" class="form-control" placeholder="Name" disabled></th>
                                                <th><input style="font-size:18px" type="text" class="form-control" placeholder="Contact" disabled></th>
												 <th class="text-center">Photo</th>
                                                <th class="text-center">Action</th>
					                        </tr>
                                            </thead>
					
                                        
                                         
                                              <?php 
                                                  $query = "SELECT * FROM users order by user_id desc limit 50";
                                                  $select_users =$db->select($query);
                                                    while ($row=mysqli_fetch_assoc($select_users)) {
                                                      $user_id = $row['user_id'];
                                                      $user_email = $row['user_email'];
                                                      $user_name = $row['user_name'];
                                                      $user_phone = $row['user_phone'];             
                                                       $user_photo = $row['user_photo'];

                                                       ?>
													<tbody>
                                                        <tr>
                                                          <td><?php echo $user_id; ?></td>
                                                          <td><?php echo $user_email; ?></td>
                                                          <td><?php echo $user_name; ?></td>
                                                          <td><?php echo $user_phone; ?></td>
                                                          <td> <img width='90px' height='70' src='../assets/img/<?php echo $user_photo; ?>' alt='image'></td>

                                                           <td><a onclick="return confirm('Are you sure to delete?')" href="extrnl_user_mnjmnt.php?del_user_id=<?php echo $user_id; ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>
                                                          
                                                        </tr>
												    </tbody>

                                                      <?php      
                                                      
                                                    }

                                               ?>
                                              

                                             
                                           
                                        </table>
									</div>
                                </div>
                            </div>
                        </div>


                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		
		

<script type="text/javascript">

$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});

//Set limit value

    $(document).ready(function(){
		$("#limitList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'unapprovedorder.php';
			}
			else
			{
				window.location = 'unapprovedorder.php?limit='+$(this).val();
			}
		});
	});
</script>		
		
		
		
		
		
		
		
		
<?php include "include/footer.php" ?>