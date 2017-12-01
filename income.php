<?php
include 'includes/head.php';
include 'includes/navigation.php';
require_once 'includes/init.php';

?>

<!-- Posting Data to Db-->

<?php
	
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['debit']) && !empty($_POST['memo']) && !empty($_POST['timedate'])){


	$name=$_POST['name'];
	$timedate=$_POST['timedate'];
	$description=$_POST['memo'];
	$debit=$_POST['debit'];
	$credit=$debit;
	$query1="INSERT INTO bank (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$query2="INSERT INTO income (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$db->query($query1);
	$db->query($query2);
}else{

	$string="Some field are empty";
}


?>
<!-- end of  Posting Data to Db-->


<!-- Fetching data from Database-->
<?php
$selectdata="SELECT * FROM income";
$dat=$db->query($selectdata);

?>


<!-- end of Fetching data from Database-->


<?php 
$sum1="SELECT SUM(debit) FROM income";
$sum2="SELECT SUM(credit) FROM income";
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
?>


<div class="figure">
</div>

<div class="col-md-3"></div>
<div class="container-fluid">
	<div class="col-md-6">
	   <h3 class="text-center"> Record Income Bal:<?=$diff;?></h3><hr>

<form class="form" method="post" action="income.php">
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
         	<option value=""> Income </option>
         </select>
	</div>
<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save">
</div>
</form>


    </div>
</div>
<div class="col-md-3"></div>

<div class="col-md-6">
	<h3> Account Balance: 12345678 Rwfs, Details Below </h3><hr>
	<table class="table table-bordered table-stripped col-md-6">
		<tr>
			<td><b>Name</b></td>
			<td><b>Description</b></td>
			<td><b>Date</b></td>
			<td><b>Debit</b></td>
			<td><b>Credit</b></td>
			<td><b>Setting</b></td>
		</tr>

		<?php while($data=mysqli_fetch_assoc($dat)):?>
		<tr>
			<td><?=$data['name'];?></td>
			<td><?=$data['description'];?></td>
			<td><?=$data['timedate'];?></td>
			<td><?=$data['debit'];?></td>
			<td><?=$data['credit'];?></td>
			<td>
			<a href="income.php?edit=<?=$data['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="income.php?delete=<?=$data['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
	<?php endwhile;?>
	</table>
</div>
</div>
</div>


<?php
include 'includes/footer.php';
?>