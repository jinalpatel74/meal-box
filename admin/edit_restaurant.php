<?php include 'header.php';?>
<?php include 'sidebar.php';?>

    
<?php
	
	$id=$_REQUEST["id"];

	$query="select * from restaurant where Restaurant_id='".$id."'";
	$ans=mysqli_query($con,$query);
	$row=mysqli_fetch_array($ans);
	
	if(isset($_POST["update_btn"]))
	{
		$id1=$_REQUEST["id"];
		
		$name=$_POST["name"];
	  	$email=$_POST["email"];
	  	$contact=$_POST["contact"];
	  	$address=$_POST["address"];
		$state=$_POST["state"];
		$city=$_POST["city"];
		if(isset($_FILES['image'])){
		     $errors= array();
		      $file_name = uniqid().$_FILES['image']['name'];
		     $file_size =$_FILES['image']['size'];
		     $file_tmp =$_FILES['image']['tmp_name'];
		     $file_type=$_FILES['image']['type'];
		   
		     
		    if(empty($errors)==true){
		        move_uploaded_file($file_tmp,"images/".$file_name);
		    }
		
	 	$query2="update restaurant set `Restaurant_name`='".$name."',`Restaurant_email` ='".$email."',`Restaurant_contact` ='".$contact."',`Restaurant_address` ='".$address."', `State`='".$state."', `City`='".$city."', `Restaurant_image`='".$file_name."' where `Restaurant_id`='".$id1."'";
		}
		else{
	 	$query2="update restaurant set `Restaurant_name`='".$name."',`Restaurant_email` ='".$email."',`Restaurant_contact` ='".$contact."',`Restaurant_address` ='".$address."', `State`='".$state."', `City`='".$city."' where `Restaurant_id`='".$id1."'";
		}
		$result=mysqli_query($con,$query2);
			echo "ok";	
		if($result==1)
		{
     		$_SESSION["update"]=true;
			echo("<script>location.href = '/mealbox/admin/restaurants.php';</script>");	
			header("Location:restaurants.php");
		}
	}	
?>
<div class="content-page">
    <div class="content">
		<div class="container-fluid">
		    <div class="row page-title">
		        <div class="col-md-12">
		            <h4 class="mb-1 mt-0">Edit Restaurants</h4>
		            
		        </div>
		    </div>
			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-body">
			                <!-- <h4 class="header-title mt-0 mb-1">Bootstrap Validation - Normal</h4> -->
			                <p class="sub-header">	</p>
			                <form class="needs-validation" novalidate method="post"enctype="multipart/form-data">>
			                	<div class="row">
				                	<div class="col">
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Name</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" value="<?php echo $row['Restaurant_name']?>" id="validationCustom01" placeholder=" name" name="name"  required>
					                        
					                        </div>
					                    </div>
					                   
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Contact</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="<?php echo $row['Restaurant_contact']?>" placeholder="" name="contact"  required>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">State</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="<?php echo $row['State']?>" placeholder="" name="state"  required>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Image</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="file" class="form-control" id="validationCustom01" name="image"  required>
					                        
					                        </div>
					                    </div>
					                    
					                  </div>
					                <div class="col">
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Email</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="<?php echo $row['Restaurant_email']?>" placeholder="" name="email"  required>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Address</label>
					                        <div class="col-lg-10">
					                        	
					                        	<textarea 	 class="form-control" name="address"><?php echo $row['Restaurant_address']?></textarea>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">City</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" name="city"  required  value="<?php echo $row['City']?>">
					                        
					                        </div>
					                    </div>
					                    
					                   
					                  </div>
					                   
					                </div>
					                <div class="row"> 
					                	<div class="col-6">
			                    				<button class="btn btn-primary" type="submit" name="update_btn">Update</button>

					                	</div>
					                </div>
				                </div>
			                </form>

			            </div> <!-- end card-body-->
			        </div> <!-- end card-->
			    </div> <!-- end col-->

			</div>
		</div>
	</div>
</div>