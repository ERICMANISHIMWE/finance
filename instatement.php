
<?php
include 'includes/init.php';
include 'includes/head.php';
include 'includes/navigation.php';

$sql="SELECT accounttype FROM types";
$process=$db->query($sql);
?>

<!-- Sales Balance-->


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
$salesbal=$tot2-$tot1;
?>

<!-- Sales Balance-->
<!-- purchase balance -->

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
$purchasebal=$tot1-$tot2;
?>

<!-- purchase balance -->
<!-- Income bal-->


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
$income=$tot2-$tot1;
?>


<!-- Income bal-->
<!--total expenses -->

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

$expensebal=$tot1-$tot2;
?>

<!--total expenses -->

<div class="figure">
</div>
<div class="col-md-3">
	
	</div>
	<div class="col-md-6">
	

		<h3 class="text-center">Income Statement as at
   <?php echo date('d/m/Y');?>:<?= date('l');?></h3><hr>

<table class="table table-bordered table-stripped">
         <tr>
            <td><b>Details</b></td>
            <td><b>Amount</b></td>
         </tr>
         
         <tr>
            <td>Sales</td>
            <td><?=$salesbal;?></td>
         </tr>
         <tr>
            <td><b>Net Sales</b></td>
            <td><?=$salesbal;?></td>
         </tr>
         
         <tr>
            <td></td>
            <td></td>
         </tr>
         
         <tr>
            <td>Purchase</td>
            <td><?=$purchasebal;?></td>
         </tr>
         
         <tr>
            <td><b>Cost of Goods Sold</b></td>
            <td><?=$purchasebal;?></td>
         </tr>
         <tr>
            <td><b>Gross Profit</b></td>
            <?php $gp=$salesbal-$purchasebal;?>
            <td><?=$gp;?></td>
         </tr>
         <tr>
            <td>Other Income</td>
            <td><?=$income;?></td>
         </tr>
         <tr>
            <td><b>Gross Income</b></td>
            <?php $gi=$gp+$income;?>
            <td><?=$gi;?></td>
         </tr>
         <tr>
            <td>Less Expenses</td>
            <td><?=$expensebal;?></td>
         </tr>
            <td><b>Net Profit/Loss</b></td>
            <?php $net=$gi-$expensebal;?>
            <td><b><?=$net;?></b></td>
         </tr>
      </table>


</div>


<div class="col-md-3">
	
</div>
<?php include 'includes/footer.php';?>