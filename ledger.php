<?php

include 'includes/navigation.php';
include 'includes/head.php';
include 'includes/init.php';
include 'includes/ledgerbalance.php';
?>

<?php
$salesquery="SELECT * FROM sales";
$salesdb=$db->query($salesquery);
$purchasequery="SELECT * FROM purchase";
$purchasedb=$db->query($purchasequery);
$bankquery="SELECT *FROM bank";
$bankdb=$db->query($bankquery);
$debtorsquery="SELECT * FROM debtors";
$debtorsdb=$db->query($debtorsquery);
$creditorsquery="SELECT * FROM creditors";
$creditorsdb=$db->query($creditorsquery);
$incomequery="SELECT * FROM income";
$incomedb=$db->query($incomequery);
$expensequery="SELECT * FROM expenses";
$expensedb=$db->query($expensequery);
$capitalquery="SELECT * FROM capital";
$capitaldb=$db->query($capitalquery);
$loanquery="SELECT * FROM loan";
$loandb=$db->query($loanquery);
$fixedquery="SELECT * FROM fixedasset";
$fixeddb=$db->query($fixedquery);
?>



<div class="figure">
   
</div>
<div class="col-md-12">
	<h3 class="text-center">Ledger as at
   <?php echo date('d/m/Y');?>:<?= date('l');?></h3>
  <div class="col-md-4">
	<h4 class="text-center">Sales</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($salesdb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal cd:<?=$salesdiff;?></b></td>
				<td><b>Bal bd:<?=$salesdiff;?></b></td>
			</tr>
			
		</table>
</div>

<div class="col-md-4">
	<h4 class="text-center">Purchases</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($purdata= mysqli_fetch_assoc($purchasedb)):?>
			<tr>
				<td><?=$purdata['name'];?></td>
				<td><?=$purdata['debit'];?></td>
				<td><?=$purdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal bd:<?=$purdiff;?></b></td>
				<td><b>Bal cd:<?=$purdiff;?></b></td>
			</tr>
			
		</table>
</div>

<div class="col-md-4">
	<h4 class="text-center">Bank</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($bankdb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal bd:<?=$bankdiff;?></b></td>
				<td><b>Bal cd:<?=$bankdiff;?></b></td>
			</tr>
			
		</table>
</div>
<hr>
<div class="col-md-4">
	<h4 class="text-center">Debtors</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($debtorsdb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal bd:<?=$debtorsdiff;?></b></td>
				<td><b>Bal cd:<?=$debtorsdiff;?></b></td>
			</tr>
			
		</table>
</div>
<div class="col-md-4">
	<h4 class="text-center">Creditors</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($creditorsdb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal cd:<?=$creditorsdiff;?></b></td>
				<td><b>Bal bd:<?=$creditorsdiff;?></b></td>
			</tr>
			
		</table>
</div>

<div class="col-md-4">
	<h4 class="text-center">Expenses</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($expensedb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal bd:<?=$expdiff;?></b></td>
				<td><b>Bal cd:<?=$expdiff;?></b></td>
			</tr>
			
		</table>
</div><hr>

<div class="col-md-4">
	<h4 class="text-center">Income</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($incomedb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal cd:<?=$incdiff;?></b></td>
				<td><b>Bal bd:<?=$incdiff;?></b></td>
			</tr>
			
		</table>
</div>

<div class="col-md-4">
	<h4 class="text-center">Loan</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($loandb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal cd:<?=$loandiff;?></b></td>
				<td><b>Bal bd:<?=$loandiff;?></b></td>
			</tr>
			
		</table>
</div>

<div class="col-md-4">
	<h4 class="text-center">Capital</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($capitaldb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal cd:<?=$capdiff;?></b></td>
				<td><b>Bal bd:<?=$capdiff;?></b></td>
			</tr>
			
		</table>
</div>

<div class="col-md-4">
	<h4 class="text-center">Fixed Asset</h4>


		<table class="table table-bordered">

			<tr>
				<td><b>Name</b></td>
				<td><b>Debit</b></td>
				<td><b>Credit</b></td>
			</tr>
			<?php while($sdata= mysqli_fetch_assoc($fixeddb)):?>
			<tr>
				<td><?=$sdata['name'];?></td>
				<td><?=$sdata['debit'];?></td>
				<td><?=$sdata['credit'];?></td>
			</tr>
			<?php endwhile;?>
			<tr>
				<td><b>Balance</b></td>
				<td><b>Bal bd:<?=$fixed;?></b></td>
				<td><b>Bal cd:<?=$fixed;?></b></td>
			</tr>
			
		</table>
</div>
</div>

<?php
include 'includes/footer.php';

?>