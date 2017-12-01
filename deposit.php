<?php
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/init.php';

?>


<?php
	
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['debit']) && !empty($_POST['memo']) && !empty($_POST['timedate'])){


	$name=$_POST['name'];
	$timedate=$_POST['timedate'];
	$description=$_POST['memo'];
	$debit=$_POST['debit'];
	$credit=$debit;
	$query1="INSERT INTO bank (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$query2="INSERT INTO capital (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$db->query($query1);
	$db->query($query2);
}else{

	$string="Some field are empty";
}
?>
<?php 
$selectdata="SELECT * FROM bank";
$fetch=$db->query($selectdata);
$sum1="SELECT SUM(debit) FROM bank";
$sum2="SELECT SUM(credit) FROM bank";
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
$diff=$tot1-$tot2;
?>
<!-- Body -->
<div class="figure">
</div>

<div class="container-fluid">
	<div class="col-md-6">
	   <h3 class="text-center">Deposit into Bank Account </h3><hr>

	
<form class="form" method="post" action="deposit.php">
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
<label>Select Account</label>
         <select class="form-control">
         	<option value=""></option>
         	<option value="">Sales Income</option>
         	<option value="">Other Deposit</option>
         	<option value="">Owners Equity</option>
         </select>
	</div>
<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save">
</div>
</form>


    </div>
<div class="col-md-6">
	<h3> Account Balance:<?=$diff;?>Rwfs, Details Below </h3><hr>
	<table class="table table-bordered table-stripped">

		<tr>
			<td><b>Name</b></td>
			<td><b>Description</b></td>
			<td><b>Date</b></td>
			<td><b>Debit</b></td>
			<td><b>Credit</b></td>
			<td><b>Setting</b></td>
		</tr>
		<?php while($record=mysqli_fetch_assoc($fetch)):
					
		?>

		<tr>
			<td><?=$record['name'];?></td>
			<td><?=$record['description'];?></td>
			<td><?=$record['timedate'];?></td>
			<td><?=$record['debit'];?></td>
			<td><?=$record['credit'];?></td>
			<td>
			<a href="deposit.php?edit=<?=$record['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="deposit.php?delete=<?=$record['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		</tr>
	<?php endwhile;?>
	</table>
	
</div>
</div>
<!-- end of the body -->



<?php  include 'includes/footer.php' ?>