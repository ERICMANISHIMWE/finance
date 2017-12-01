<?php
include 'includes/head.php';
include 'includes/navigation.php';
require_once 'includes/init.php';

?>




<?php
	
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['credit']) && !empty($_POST['memo']) && !empty($_POST['timedate'])){


	$name=$_POST['name'];
	$timedate=$_POST['timedate'];
	$description=$_POST['memo'];
	$credit=$_POST['credit'];
	$debit=$credit;
	
	$query1="INSERT INTO sales (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$query2="INSERT INTO debtors (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$db->query($query1);
	$db->query($query2);
}else{

	$string="Some field are empty";
}


?>


<?php 
$sum1="SELECT SUM(debit) FROM sales";
$sum2="SELECT SUM(credit) FROM sales";
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
$diff=$tot2-$tot1;
$sales="SELECT * FROM sales";
$salesquery=$db->query($sales);
?>





<div class="figure">
</div>

<div class="container-fluid">
	<div class="col-md-6">
	   <h3 class="text-center">Record Sales </h3><hr>

<form class="form" method="post" action="sales.php">
	<div class="form-group col-md-4">
	<label for="names" >Debtor Name</label>
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
<label for="cr" >Amount</label>
         <input type="text" name="credit"  id="cr" class="form-control">
	</div>
	<div class="form-group col-md-4"> 
<label>Select Account</label>
         <select class="form-control">
         	<option value=""></option>
         	<option value="">Sales </option>
         </select>
	</div>

<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save and Submit">
</div>
<div class="col-md-4">
  	<a href="disallowed.php" class=" btn btn-success">Discount</a>
    <a href="returnin.php" class=" btn btn-success">Return</a>
  </div>
</form>
    </div>
    
<div class="col-md-6">
	<h3> Balance:<?=$diff;?>Rwfs, Details Below </h3><hr>
	<table class="table table-bordered table-stripped">
		<tr>
			<td><b>Name</b></td>
			<td><b>Description</b></td>
			<td><b>Date</b></td>
			<td><b>Debit</b></td>
			<td><b>Credit</b></td>
			<td><b>Setting</b></td>
		</tr>
		<?php while($row=mysqli_fetch_assoc($salesquery)):?>
		<tr>
			<td><?=$row['name'];?></td>
			<td><?=$row['description'];?></td>
			<td><?=$row['timedate'];?></td>
			<td><?=$row['debit'];?></td>
			<td><?=$row['credit'];?></td>
			<td>
			<a href="" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
	<?php endwhile;?>
	</table>
</div>
</div>


<?php

include 'includes/footer.php';

?>
