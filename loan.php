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
	$query2="INSERT INTO loan (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$db->query($query1);
	$db->query($query2);
}else{

	$string="Fill emptys";
}


?>


<?php 
$sum1="SELECT SUM(debit) FROM loan";
$sum2="SELECT SUM(credit) FROM loan";
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




<!-- Body -->
<div class="figure">
</div>

<div class="col-md-3"></div>
<div class="container-fluid">
	<div class="col-md-6">
	   <h3 class="text-center">Deposit Loan into Bank Account bal:<?=$diff;?></h3><hr>

<form class="form" method="post" action="loan.php">
	<div class="form-group col-md-4">
	<label for="names" >From</label>
         <input type="text" name="name"  id="names" class="form-control" value="">	
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
         	<option value="">Bank</option>
         </select>
	</div>
<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save">
</div>
</form>


    </div>
</div>
<!-- end of the body -->
<div class="col-md-3"></div>


<?php  include 'includes/footer.php' ?>