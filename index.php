<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------System Created By Malith Deshan Ranaweera - 2022 September--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<link rel="icon" type="image/x-icon" href="">
	<!----------------------CSS------------------------------------------------------------------------------------------------->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!----------------------CSS------------------------------------------------------------------------------------------------->
	<!----------------------JS-------------------------------------------------------------------------------------------------->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/kit.fontawesome.js"></script>
	<!----------------------JS-------------------------------------------------------------------------------------------------->
</head>

<?php 
include("DBconnection.php");	
error_reporting('0');
	
$item_no     = '';
$description = '';               
$unit        = '';
$qty1        = '';               
$rate1       = '';                  
$amount1     = '';            
$qty2        = '';       
$rate2       = '';    
$amount2     = '';        
$remark	     = '';	
$menu	     = '';	
$date	     = '';	
$messege = '';
$messege2 = '';
$real_amount1 = '';
$real_amount2 = '';
$eventname = '';
	
if (isset($_POST['add']))
{
$item_no     = $_POST['item_no']; 
$description = $_POST['description'];               
$unit        = $_POST['unit'];     
$qty1        = $_POST['qty1'];                    
$rate1       = $_POST['rate1'];                      
//$amount1     = $_POST['amount1'];              
$qty2        = $_POST['qty2'];            
$rate2       = $_POST['rate2'];        
//$amount2     = $_POST['amount2'];          
$remark	     = $_POST['remark']; 
	
	
$sql = "INSERT INTO cooking_items "."(item_no, description, unit, qty1, rate1, amount1, qty2,rate2,amount2,remark)"."VALUE('$item_no','$description','$unit','$qty1','$rate1','$amount1','$qty2','$rate2','$amount2','$remark')";
	
	$results = mysqli_query($conn, $sql);
	
	if(!$results) 
	{
	  $messege2 = 'Insert Unsuccessfull!';
	}
	else
	{
	  $messege = 'Insert Successfull!';
	//header('location:index.php');
	}
   	
	
	
}
	
if (isset($_POST['set']))
{
	
$setmenu     = $_POST['setmenu']; 
$date        = $_POST['date'];               
$eventname   = $_POST['eventname'];               

$sql2 = "UPDATE menu SET menu  = '$setmenu' , date  = '$date' , eventname = '$eventname' WHERE id = '1'";
	
	$results = mysqli_query($conn, $sql2);
	
	if(!$results) 
	{
	  $messege2 = 'Insert Unsuccessfull!';
	}
	else
	{
	  $messege = 'Insert Successfull!';
	//header('location:index.php');
	}
   	
	
 		
}	
	
	
	
 $result1= mysqli_query($conn,"SELECT * FROM cooking_items ORDER BY item_no ASC");	

$result2= mysqli_query($conn,"SELECT * FROM menu");	
 
		
	if ( $row = mysqli_fetch_array( $result2 ) )
		{
        $menu = $row[ 'menu' ];
		$date = $row[ 'date' ];
		$eventname = $row['eventname'];
		
		
		}
	 
	

	
if (isset($_POST['delete'])){	 
//	  $update_id = $_POST['update_id'];
	echo $item_no = $_POST['item_no'];

    $sql3 = "DELETE FROM cooking_items WHERE item_no = '$item_no'";
	$results3 = mysqli_query($conn, $sql3);	
	
     if(!$results3)  
	{
	$messege2 = 'Delete Unsuccessfull!';
	}
	else
	{
	header("location:index.php");	
	}
}	

	
if(isset($_POST['update']))
	{
	  echo  $update_id   = $_POST['update_id'];
	    $item_no     = $_POST['item_no']; 
		$description = $_POST['description'];               
		$unit        = $_POST['unit'];     
		$qty1        = $_POST['qty1'];                    
		$rate1       = $_POST['rate1'];                      
		$amount1     = $_POST['amount1'];              
		$qty2        = $_POST['qty2'];            
		$rate2       = $_POST['rate2'];        
		$amount2     = $_POST['amount2'];          
		$remark	     = $_POST['remark'];
	
  	echo $sql1 = "UPDATE cooking_items SET 
										item_no     = '$item_no',
										description = '$description',
										unit        = '$unit',
										qty1        = '$qty1',
										rate1       = '$rate1',
										amount1     = '$amount1',
										qty2        = '$qty2', 
										rate2       = '$rate2',
										amount2     = '$amount2',
										remark      = '$remark' 

	WHERE id = '$update_id'";	
	$results1 = mysqli_query($conn, $sql1);
  
	if(!$results1)  
	{
	$messege2 = 'UPDATED UNSUCCUSSFULL';
	}
	else
	{
	header("location:index.php");	
	}
	}	  	
	
	
?>


<body style="overflow-x: hidden; color: black" class="body" background="images/dark_stripes.jpg">
	


	<div align="center" class="header_section">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">BUDGETING SYSTEM</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
					</li>
					<li><a href="#"><i class="fas fa-chair"></i>&nbsp;Seating Arrangement</a>
					</li>

				</ul>
			</div>
		</nav>
	</div>
	<div align="center" class="body_section">
		
		<?php if(!$messege == null){ ?>		
 <div align="center"> <h3 id="alert"  class="alert alert-info"><?=$messege ?></h3></div>
<?php } ?>
	
<?php if(!$messege2 == null){ ?>	
 <div align="center"> <h3 id="alert2" class="alert alert-danger"><?=$messege2 ?></h3></div>
<?php } ?>
		
		
		
		<div class="glass">

			<div align="center" >
				<h4 class="well"><strong><?=$eventname ?> | <?=$date ?> (Budget)</strong></h4>
			</div>
<!--Ruwanwali Maha Saya Monthly Alms-Giving Stall - | 2022-11-30 (Budget)-->
			<table class="table table-bordered table-hover ">
				<thead>
					<tr bgcolor="#FFFD22">
						<th style="border: solid">MENU</th>
						
						<th style="border: solid" colspan="10"><?=$menu ?></th>
						<th hidden="" style="border: solid" colspan="1"><?=$date ?></th>
						<th hidden="" style="border: solid" colspan="1"><?=$eventname ?></th>
						<th style="border: solid" bgcolor="#FFFFFF" colspan="1">
					 
<!--
						 <button type="button" data-toggle="modal" data-target="#model" class="btn btn-primary form-control"> SET &nbsp;<i class="fa fa-wrench"></i>
						 </button>	
-->
							
							<button class="btn btn-success btn-sm editbtntwo"><i class="fa fa-wrench"></i></button>
							
							
						</th>
					    </form>
					</tr>

					<tr bgcolor="#FFFFFF">
						<th style="vertical-align : middle;text-align:center; border: solid" align="center" rowspan="2">Item No</th>
						<th style="vertical-align : middle;text-align:center; border: solid; width: 200px" align="center" rowspan="2" colspan="2">Description</th>
						<th style="vertical-align : middle;text-align:center; border: solid" align="center" rowspan="2">Unit</th>
						<th style="border: solid" colspan="3" bgcolor="#B17D7E">Budgetary Cost</th>
						<th style="border: solid" colspan="3" bgcolor="608FCD">Actual Cost</th>
						<th style="border: solid" colspan="3" bgcolor="#ffffff">Action</th>

					</tr>

					<tr>

						<th style="border: solid" bgcolor="#B17D7E">Qty</th>
						<th style="border: solid" bgcolor="#B17D7E">Rate</th>
						<th style="border: solid" bgcolor="#B17D7E">Amount</th>
						<th style="border: solid" bgcolor="608FCD">Qty</th>
						<th style="border: solid" bgcolor="608FCD">Rate</th>
						<th style="border: solid" bgcolor="608FCD">Amount</th>
						<th style="border: solid" bgcolor="FFFFFF">Remark</th>
						<th style="border: solid" bgcolor="#FFFFFF">Update/ Add/ Delete</th>
					</tr>

					<tr bgcolor="#BC97E5">
						<th bgcolor="#FFFD22" colspan="3">A) Lunch Rice Alms - Giving Stall </td>

							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>

					</tr>


					<tr bgcolor="#6DB580" style="padding: 5px; font-weight: bold; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">

						<form method="post" action="#">

							<th><input type="text" class="form-control" name="item_no" placeholder="Item No" required autofocus>
							</th>
							<th colspan="2"><input type="text" class="form-control" name="description" placeholder="Description" >
							</th>
							<th>
								
<!--								<input type="text" class="form-control" name="unit" placeholder="Unit" >-->
								
							 
						<select type="text" name="unit" class="form-control" required/>
						<option value='' hidden>UNIT</option>
						<option value="KG">KG</option>
						<option value="PACKET">PACKET</option>
							</th>
							<th><input type="text" class="form-control" name="qty1" placeholder="Qty" autocomplete="off">
							</th>
							<th><input type="text" class="form-control" name="rate1" placeholder="Rate" autocomplete="off">
							</th>
							<th><!--<input type="text" class="form-control" name="amount1" placeholder="Amount" readonly>-->
							</th>
							<th><input type="text" class="form-control" name="qty2" placeholder="Qty" autocomplete="off">
							</th>
							<th><input type="text" class="form-control" name="rate2" placeholder="Rate" autocomplete="off">
							</th>
							<th><!--<input type="text" class="form-control" name="amount2" placeholder="Amount" readonly>-->
							</th>
							<th><input type="text" class="form-control" name="remark" placeholder="Remark" autocomplete="off">
							</th>
							<th><input type="submit" class="form-control btn btn-primary" value="ADD" name="add"   >
							</th>

						</form>

					</tr>


				</thead>
	
			 
	
	
				<?php
				while ( $row = mysqli_fetch_array( $result1 ) ):


				$id = $row[ 'id' ];
				$item_no = $row[ 'item_no' ];
				$description = $row[ 'description' ];
				$unit = $row[ 'unit' ];
				$qty1 = $row[ 'qty1' ];
				$rate1 = $row[ 'rate1' ];
				//$amount1 = $row[ 'amount1' ];
				$qty2 = $row[ 'qty2' ];
				$rate2 = $row[ 'rate2' ];
				//$amount2 = $row[ 'amount2' ];
				$remark = $row[ 'remark' ];


				?>
<?php  
	$real_amount1 = $qty1 * number_format($rate1, 2) ;
	$real_amount2 = $qty2 * number_format($rate2, 2) ;
?>	

				<tbody bgcolor="#FFFFFF">
					<tr style="padding: 5px; font-weight: bold; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">
						<td hidden=""><?=$id?></td>
						<td bgcolor="#9EA0FF"><?=$item_no?></td>
						<td colspan="2"><?=$description?></td>
						<td bgcolor="#DF8587"><?=$unit?></td>
						<td><?=$qty1?></td>
						<td><?=number_format($rate1, 2)?></td>
						<td bgcolor="#F4F37C"><?=number_format($real_amount1, 2)?></td>
						<td><?=$qty2?></td>
						<td><?=number_format($rate2, 2)?></td>
						<td bgcolor="#F4F37C"><?=number_format($real_amount2, 2)?></td>
						<td><?=$remark?></td>
						<td class="row">

							<div class="col-lg-6"> 
							<button class="btn btn-warning btn-xs editbtn"><i class="fa fa-wrench"></i></button>
							</div>
							
							<div class="col-lg-6"> 
							<form method="post">
								<input type="hidden" name="item_no" value="<?=$item_no?>" readonly>

								<button type="submit" class="btn btn-danger btn-xs " name="delete"><i class="fa fa-remove"></i>
								</button>
							</form>
							</div>
						</td>

					</tr>

				</tbody>

				<?php endwhile; ?>

			</table>
		</div>
	</div>


 

	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<div align="left" class="col-md-12" style="margin-top: 5px">

		<div align="left" class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> &nbsp;UPDATE ITEM</h5>
						<form method="post" action="" enctype="multipart/form-data">
							<button type="button" class="close" data-dismiss="modal">CLOSE</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="update_id" id="update_id" class="form-control" required/>

						<label>ITEM NO</label>
						<input type="text" name="item_no" id="item_no" class="form-control" required/>

						<label>DESCRIPTION</label>
						<input type="text" name="description" id="description" class="form-control"/>

						<label>UNIT</label>
						<select type="text" name="unit" id="unit" class="form-control"/>
						<option hidden>SELECT UNIT TYPE :</option>
						<option value="KG">KG</option>
						<option value="PACKET">PACKET</option>
						
						
						
						</select>

						<label>BUDGETARY COST QUANTITY</label>
						<input type="text" name="qty1" id="qty1" class="form-control" autocomplete="off"/>

						<label>BUDGETARY COST RATE</label>
						<input type="text" name="rate1" id="rate1" class="form-control" autocomplete="off"/>

						<label>BUDGETARY COST AMOUNT</label>
						<input type="text" name="amount1" id="amount1" class="form-control" readonly/>

						<label>ACTUAL COST QUANTITY</label>
						<input type="text" name="qty2" id="qty2" class="form-control" autocomplete="off"/>

						<label>ACTUAL COST RATE</label>
						<input type="text" name="rate2" id="rate2" class="form-control" autocomplete="off"/>

						<label>ACTUAL COST AMOUNT</label>
						<input type="text" name="amount2" id="amount2" class="form-control" readonly/>

						<label>REMARK</label>
						<input type="text" name="remark" id="remark" class="form-control" autocomplete="off"/>


					</div>
					<div class="modal-footer">

						<button type="submit" value="submit" id="update_id" name="update" class="btn btn-primary">UPDATE</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>

					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

 

	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->

	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<div align="left" class="col-md-12" style="margin-top: 5px">

		<div align="left" class="modal fade" id="editmodaltwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> &nbsp;SET MENU</h5>
						<form method="post" action="" enctype="multipart/form-data">
							<button type="button" class="close" data-dismiss="modal">CLOSE</button>
					</div>
					<div class="modal-body">
						
						<label>EVENT NAME</label>
						 
						<input type="text" name="eventname" id="eventname" class="form-control" placeholder="eventname" autocomplete="off">
						 
						<label>SET MENU</label>
						 
						<input type="text" name="setmenu" id="setmenu" class="form-control" placeholder="SET MENU" autocomplete="off">
						
						<label>DATE</label>
						<input type="date" name="date" id="date" class="form-control" placeholder="DATE" autocomplete="off">	

					</div>
					<div class="modal-footer">

						<button type="submit" value="submit" name="set" class="btn btn-primary">SET</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>

					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

 

	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->

	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
	<!-- update model -->
 
 	
<div align="center">
		<footer class="footer">
			<div class="container">
				<p class="text-capitalize">DEVELOPED BY - MALITH DESHAN RANAWEERA | 2022 </p>
			</div>
		</footer>
	</div> 


 

</body>
<script>
	$( document ).ready( function () {
		$( '.editbtn' ).on( 'click', function () {
			$( '#editmodal' ).modal( 'show' );
			$tr = $( this ).closest( 'tr' );

			var data = $tr.children( "td" ).map( function () {

				return $( this ).text();
			} ).get();

			console.log( data );
			$( '#update_id' ).val( data[ 0 ] );
			$( '#item_no' ).val( data[ 1 ] );
			$( '#description' ).val( data[ 2 ] );
			$( '#unit' ).val( data[ 3 ] );
			$( '#qty1' ).val( data[ 4 ] );
			$( '#rate1' ).val( data[ 5 ] );
			$( '#amount1' ).val( data[ 6 ] );
			$( '#qty2' ).val( data[ 7 ] );
			$( '#rate2' ).val( data[ 8 ] );
			$( '#amount2' ).val( data[ 9 ] );
			$( '#remark' ).val( data[ 10 ] );



		} );
	} );
</script>
<script>
	$( document ).ready( function () {
		$( '.editbtntwo' ).on( 'click', function () {
			$( '#editmodaltwo' ).modal( 'show' );
			$tr = $( this ).closest( 'tr' );

			var data = $tr.children( "th" ).map( function () {

				return $( this ).text();
			} ).get();

			console.log( data );
			$( '#setmenu' ).val( data[ 1 ] );
			$( '#date' ).val( data[ 2 ] );
			$( '#eventname' ).val( data[ 3 ] );
			



		} );
	} );
</script>


 <script type="text/javascript">
        setTimeout(function () {
  
            // Adding the class dynamically
            $('#alert').addClass('hide');
        }, 2000);
    </script>

	 <script type="text/javascript">
        setTimeout(function () {
  
            // Adding the class dynamically
            $('#alert2').addClass('hide');
        }, 2000);
    </script>
<script>
$(function() {
    $('input').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
$(function() {
    $('textarea').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
$(function() {
    $('select').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
</script>
</html>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------System Created By Malith Deshan Ranaweera - 2022 September--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->