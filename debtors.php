<?php
include 'includes/head.php';
include 'includes/navigation.php';
require_once 'includes/init.php';

?>



<?php
	
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['debit']) && !empty($_POST['memo']) && !empty($_POST['timedate'])){


	$name=$_POST['name'];
	$timedate=$_POST['timedate'];
	$description=$_POST['memo'];
	$debit=$_POST['debit'];
	$returnin=$_POST['returnin'];
	$re=$returnin;
	$credit=$debit;
	
	$query1="INSERT INTO  bank (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$query2="INSERT INTO debtors (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	//$query3="INSERT INTO sales (returnin,) VALUES ('')";
    //$db->query($query0);
	$db->query($query1);
	$db->query($query2);
}else{

	$string="Some field are empty";
}


?>


<?php 

$sum1="SELECT SUM(debit) FROM debtors";
$sum2="SELECT SUM(credit) FROM debtors";
$bal1=$db->query($sum1);
$bal2=$db->query($sum2);
while ($record1=mysqli_fetch_assoc($bal1)) {
	$tot1=0;
$tot11=array_sum($record1);
$tot1=$tot1+$tot11;
}
while ($record2=mysqli_fetch_assoc($bal2)) {
	$tot2=0;
$tot22=array_sum($record2);
$tot2=$tot2+$tot22;
}  
global $bankdiff;

$bankdiff=$tot1-$tot2;
?>

<div class="figure">
</div>

<div class="container-fluid">
	<div class="col-md-6">
	   <h3 class="text-center">Sales Receipt </h3><hr>

<form class="form" method="post" action="debtors.php">
	<div class="form-group col-md-4">
	<label for="names" >From</label>
         <input type="text" name="name"  id="names" class="form-control">	
	</div>
	
	     <div class="form-group col-md-4"> 
	     	<label for="timedates" >Date</label>
         <input type="date" name="timedate"  id="timedates" class="form-control">

	</div>
	<div class="form-group col-md-4"> 
		<label for="memos" >Description</label>
         <input type="text" name="memo"  id="memos" title="Description" class="form-control">

	</div> 
	<div class="form-group col-md-4"> 
<label for="debits" >Amount</label>
         <input type="text" name="debit"  id="debits" class="form-control">
	</div>
<div class="form-group col-md-4"> 
<label for="returnin" >Return in</label>
         <input type="text" name="returnin"  id="returnin" class="form-control">
	</div>

	<div class="form-group col-md-4"> 
<label>Select Account</label>
         <select class="form-control">
         	<option value=""></option>
         	<option value="">Bank</option>
         	
         </select>
	</div>

<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save">
</div>
</form>


    </div>
<div class="col-md-6">
	<h3> Account Balance:<?=$bankdiff;?> Rwfs, Details Below </h3><hr>
	<table class="table table-bordered table-stripped">
		<tr>
			<td><b>Name</b></td>
			<td><b>Description</b></td>
			<td><b>Type</b></td>
			<td><b>Debit</b></td>
			<td><b>Credit</b></td>
			<td><b>Setting</b></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>
			<a href="" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
	</table>
</div>
</div>




<?php

include 'includes/footer.php';

?>
