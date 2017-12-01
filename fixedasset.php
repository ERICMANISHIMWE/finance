<?php
include 'includes/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
?>


<?php
	
	if (isset($_POST['submit']) && !empty($_POST['currentname'])){
		$name=$_POST['currentname'];
		$timedate=$_POST['currenttimedate'];
		$description=$_POST['currentmemo'];
		$debit=$_POST['currentdebit'];
		$credit=$debit;

		
	$query="INSERT INTO fixedasset (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$bankquery="INSERT INTO bank (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$db->query($query);
	
	$db->query($bankquery);
	
}else{

}
?>

<?php 

$sum1="SELECT SUM(debit) FROM fixedasset";
$sum2="SELECT SUM(credit) FROM fixedasset";
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

<div class="col-md-2">
	
</div>

<div class="container-fluid">
	<div class="col-md-8">
	   <h3 class="text-center">Recording Fixed Asset, Balance:<?=$diff;?></h3><hr>

<form class="form" method="post" action="fixedasset.php">
	<div class="form-group col-md-4">
	<label for="names" >From</label>
         <input type="text" name="currentname"  id="names" class="form-control">	
	</div>
	
	     <div class="form-group col-md-4"> 
	     	<label for="timedates" >Date</label>
         <input type="date" name="currenttimedate"  id="timedates" class="form-control">

	</div>
	<div class="form-group col-md-4"> 
		<label for="memos" >Description</label>
         <input type="text" name="currentmemo"  id="memos" title="Description" class="form-control">

	</div> 
	<div class="form-group col-md-4"> 
<label for="debits" >Amount</label>
         <input type="text" name="currentdebit"  id="debits" class="form-control">
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
</div>


<div class="col-md-2">
	
</div>



<?php
include 'includes/footer.php';
?>