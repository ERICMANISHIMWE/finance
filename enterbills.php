
<?php
include 'includes/head.php';
include 'includes/navigation.php';
require_once 'includes/init.php';

?>




<?php
	
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['debit']) && !empty($_POST['des']) && !empty($_POST['timedate'])){


	$name=$_POST['name'];
	$timedate=$_POST['timedate'];
	$des=$_POST['des'];
	$debit=$_POST['debit'];
	$credit=$debit;

	
	$query1="INSERT INTO purchase (name,timedate,description,debit) VALUES ('$name','$timedate','$des','$debit')";
	$query2="INSERT INTO creditors (name,timedate,description,credit) VALUES ('$name','$timedate','$des','$credit')";
	$db->query($query1);
	$db->query($query2);
}else{

	$string="Some field are empty";
}


?>


<?php 
$sum1="SELECT SUM(debit) FROM purchase";
$sum2="SELECT SUM(credit) FROM purchase";
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



<div class="figure">
</div>

<div class="container-fluid">
	<div class="col-md-6">
	   <h3 class="text-center">Entering Bills/Purchase Order Bal:<?=$diff;?></h3><hr>

<form class="form" method="post" action="enterbills.php">
	<div class="form-group col-md-4">
	<label for="names" >Creditor Name</label>
         <input type="text" name="name"  id="names" class="form-control">	
	</div>
	
	     <div class="form-group col-md-4"> 
	     	<label for="timedates" >Date</label>
         <input type="date" name="timedate"  id="timedates" class="form-control">

	</div>
	<div class="form-group col-md-4"> 
		<label for="memos" >Description</label>
         <input type="text" name="des"  id="memos" title="Description" class="form-control">

	</div> 
	<div class="form-group col-md-4"> 
<label for="cr" >Amount</label>
         <input type="text" name="debit"  id="cr" class="form-control">
	</div>
	<div class="form-group col-md-4"> 
<label>Select Account</label>
         <select class="form-control">
         	<option value=""></option>
         	<option value="">Purchases </option>
         </select>
	</div>

<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save andSubmit">
</div>
<div class="col-md-4">
	<a href="disreceived.php" class=" btn btn-success">Discount</a>
    <a href="returnout.php" class=" btn btn-success">Return</a>
</div>
</form>


    </div>
</div>

<?php
include 'includes/footer.php';
?>