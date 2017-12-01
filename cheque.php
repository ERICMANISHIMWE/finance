<?php
include 'includes/head.php';
include 'includes/navigation.php';
require_once 'includes/init.php';

?>
<?php
	
	if (isset($_POST['submit']) && !empty($_POST['expname'])){
		$name=$_POST['expname'];
		$timedate=$_POST['period'];
		$description=$_POST['memorandum'];
		$credit=$_POST['expcredit'];
		$debit=$credit;

		
	$query="INSERT INTO bank (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$query2="INSERT INTO expenses (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$db->query($query);
	$db->query($query2);
	
}else{

}

?>

<?php 

$sum1="SELECT SUM(debit) FROM expenses";
$sum2="SELECT SUM(credit) FROM expenses";
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
<div class="col-md-3">
	
	</div>
	<div class="col-md-6">
	   <h3 class="text-center"> Write A Cheque : Exp-balance:<?=$diff;?></h3><hr>

<form class="form" method="post" action="cheque.php">
	<div class="form-group col-md-4">
	<label for="expnames" >To the order of</label>
         <input type="text" name="expname"  id="expnames" class="form-control">	
	</div>
	
	     <div class="form-group col-md-4"> 
	     	<label for="periods" >Date</label>
         <input type="date" name="period"  id="periods" class="form-control">

	</div>
	<div class="form-group col-md-4"> 
		<label for="memorandums" >Description</label>
         <input type="text" name="memorandum"  id="memorandums" title="Description" class="form-control">

	</div> 
	<!--<div class="form-group col-md-4"> 
<label for="expdebits" >Debit</label>
         <input type="text" name="expdebit"  id="expdebits" class="form-control" hidden="hidden">
	</div>-->
	<div class="form-group col-md-4"> 
<label for="expcredits" >Amount</label>
         <input type="text" name="expcredit"  id="expcredits" class="form-control">
	</div>
	<div class="form-group col-md-4">
		<label>Select Account</label>
		<select name="types" class="form-control">
			<option value=""></option>
			<option value="">Expenses</option>
		</select>
	</div>
<div class="form-group col-md-4">
	<label for="submit"></label><br>
<input type="submit" id="submit" class="btn btn-success" name="submit" value="Save">
</div>
</form>


    </div>
<div class="col-md-3">

</div>


<?php

include 'includes/footer.php';

?>
