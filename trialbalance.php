
<?php
require_once 'includes/init.php';
include 'includes/head.php';
include 'includes/navigation.php';

$sql="SELECT accounttype FROM types";
$process=$db->query($sql);
?>

<!--Bank Balance -->

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
$bankdiff=$tot1-$tot2;
?>
<!--Bank Balance -->
<!-- Debtors balance -->

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
$debtorsdiff=$tot1-$tot2;
?>
<!-- Debtors balance -->
<!--Expense balance-->
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
$expdiff=$tot1-$tot2;
?>
<!--Expense balance-->
<!--Sales balance -->

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
$salesdiff=$tot2-$tot1;
?>
<!-- Sales balance-->
<!-- purchase -->
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
$purdiff=$tot1-$tot2;
?>
<!-- purchase -->

<!-- Creditors -->

<?php 
$sum1="SELECT SUM(debit) FROM creditors";
$sum2="SELECT SUM(credit) FROM creditors";
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
$creditorsdiff=$tot2-$tot1;
?>

<!-- Creditors -->
<!-- Captal -->


<?php 
$sum1="SELECT SUM(debit) FROM capital";
$sum2="SELECT SUM(credit) FROM capital";
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
$capdiff=$tot2-$tot1;
?>
<!-- Captal -->

<!-- Income -->
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
$incdiff=$tot2-$tot1;
?>

<!-- Income -->
<!-- Loan -->
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
$loandiff=$tot2-$tot1;
?>

<!-- Loan -->
<!-- fixed assets-->
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


$fixed=$tot1-$tot2;
?>
<!-- fixed assets-->
<div class="figure">
</div>

<div class="col-md-3">
	
	</div>
	<div class="col-md-6">
	

		<h3 class="text-center"> Trial Balance as at
   <?php echo date('d/m/Y');?>:<?= date('l');?> </h3><hr>
<table class="table table-bordered table-stripped">
	<tr>
		<td><b>Details</b></td>
		<td><b>Debit</b></td>
		<td><b>Credit</b></td>
	</tr>

	<tr>
		<td>Bank</td>
		<td><?=$bankdiff;?></td>
		<td></td>
	</tr>
<td>Debtors</td>
<td><?=$debtorsdiff;?></td>
<td></td>
	<tr>
		<td>Expenses</td>
		<td><?=$expdiff;?></td>
		<td></td>
	</tr>
	<td>Sales</td>
	<td></td>
	<td><?=$salesdiff;?></td>
	<tr>
		<td>Purchases</td>
		<td><?=$purdiff;?></td>
		<td></td>
	</tr>
	<tr>
		<td>Creditors</td>
		<td></td>
		<td><?=$creditorsdiff;?></td>
	</tr>
	<tr>
		<td>Capital</td>
		<td></td>
		<td><?=$capdiff;?></td>
	</tr>
	<tr>
		<td>Income</td>
		<td></td>
		<td><?=$incdiff;?></td>
	</tr>
	<tr>
		<td>Loan</td>
		<td></td>
		<td><?=$loandiff;?></td>
	</tr>
	<tr>
		<td>Fixed Assets </td>
		<td><?=$fixed;?></td>
		<td></td>
	</tr>
	<tr>
		<?php $debitbal=$bankdiff+$debtorsdiff+$expdiff+$purdiff+$fixed;
		$creditbal=$salesdiff+$creditorsdiff+$capdiff+$incdiff+$loandiff;
		?>
		<td><b>Total</b></td>
		<td><b><?=$debitbal;?></b></td>
		<td><b><?=$creditbal;?></b></td>
	</tr>
</table>

</div>
<div class="col-md-3">
	
</div>

<?php
include'includes/footer.php';
?>