<main>
	<table style="width:100%;text-align:center">
  <tr>
    <th style="width: 300px;">Date</th>
    <th>Montant</th> 
    <th>Détails</th>
  </tr>



<?php 
$bdd=ConnectionDataBase();
$count_orders=$bdd->query("SELECT *,count(*) as count FROM orders WHERE user_id=".$_SESSION["id"]." AND type='ORDER'")->fetch();
$count=$count_orders["count"];
$orders=$bdd->query("SELECT * FROM orders WHERE user_id=".$_SESSION["id"]." AND type='ORDER' ORDER BY created_at");
if($count>0) {
	foreach($orders as $row) {?>
		

		<tr>
		    <td><?php echo $row["created_at"];?></td>
		    <td><?php echo $row["amount"];?></td> 
		    <td>
		    	<form method="post" action="index.php?page=order">
		    		<input type="hidden"  name="order_id" value=<?php echo $row["id"]; ?>>
		    		<input type="submit" value="Details">
		    	</form>

		    </td>
	
		</tr>
	<?php
	}
}	?>
</table>
<?php 
if($count==0) {
	echo "<br><center>Aucune commande à afficher.</center>";
}
?>


</main>

