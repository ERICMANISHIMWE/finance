<?php
include 'includes/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
?>
<!-- CLOSED -->

<?php
	
	if (isset($_POST['submit']) && !empty($_POST['currentname'])){
		$name=$_POST['currentname'];
		$timedate=$_POST['currenttimedate'];
		$description=$_POST['currentmemo'];
		$debit=$_POST['currentdebit'];
		$credit=$debit;

		
	$query="INSERT INTO currentasset (name,timedate,description,debit) VALUES ('$name','$timedate','$description','$debit')";
	$query12="INSERT INTO sales (name,timedate,description,credit) VALUES ('$name','$timedate','$description','$credit')";
	$db->query($query);
	$db->query($query12);
	
}else{

}
?>





<div class="figure">
</div>

<div class="col-md-2">
	
</div>

<div class="container-fluid">
	<div class="col-md-8">
	   <h3 class="text-center">Recording Current Asset </h3><hr>

<form class="form" method="post" action="currentasset.php">
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