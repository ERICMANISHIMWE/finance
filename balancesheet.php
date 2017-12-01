<?php
include 'includes/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
?>
<?php include 'includes/netprofit.php';?>
<div class="figure">
</div>
<!-- Fixed assets -->

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

<!-- Fixed assets -->
<!--Debtors -->

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


$debtors=$tot1-$tot2;
?>
<!-- Debtors-->
<!-- bank balance -->

<?php 
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
$bank=$tot1-$tot2;
?>

<!-- bank balance -->

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

<div class="col-md-2"></div>
<div class="col-md-8">
	<h3 class="text-center">Balancesheet as at
   <?php echo date('d/m/Y');?>:<?= date('l');?></h3><hr>
	<table class="table table-bordered">
		<tr>
			<td><b>Assets</b></td>
			<td><b>Amount</b></td>
			<td><b>Liabilities</b></td>
			<td><b>Amount</b></td>
		</tr>
		<tr>
		<td>Fixed</td>
		<td><?=$fixed;?></td>
		<td>Owner Equity</td>
		<td><?=$capdiff;?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Net Profit/Loss</td>
			<td><?=$net;?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
		<td><b>Current Assets</b></td>
		<td></td>
		<td><b>Current Liability</b></td>
		<td></td>
		</tr>
		<tr>
			<td>Debtors</td>
			<td><?=$debtors;?></td>
			<td>Creditors</td>
			<td><?=$creditorsdiff;?></td>
		</tr>
		<tr>
			<td>Bank</td>
			<td><?=$bank;?></td>
			<td>Loan</td>
			<td><?=$loandiff;?></td>
		</tr>
		<tr>
			<?php $totassets=$fixed+$bank+$debtors;
				  $totliab=$capdiff+$net+$creditorsdiff+$loandiff;
			?>
			<td><b>Total Asset</b></td>
			<td><b><?=$totassets;?></b></td>
			<td>Total Liabilities</td>
			<td><b><?=$totliab;?></b></td>
		</tr>

	</table>

</div>
<?php include 'includes/netprofit.php';?>
<div class="col-md-2"></div>

<?php
include 'includes/footer.php';
?>