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

           <!--Gross Profit -->
            <?php $gp=$salesbal-$purchasebal;?>
           
         
        
           <!--Other Income -->
          
         
        
           <!--Gross Income -->
            <?php $gi=$gp+$income;?>
           
         
        
           <!--Less Expenses -->
        
         
            <!--//Net Profit/Loss -->
            <?php $net=$gi-$expensebal;?>
            