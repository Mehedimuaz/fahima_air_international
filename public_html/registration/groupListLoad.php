<?php include_once("dbConnector.php"); ?>

<tr>
    <th>Group Name</th>
    <th>Management</th>
    <th>Leader Name</th>
    <th>Total Pilgrims</th>
    <th>Paid Pilgrim</th>
    <th>Action</th>
</tr>

<!------------------Select all group names--------------->
<?php
    $selectGrpInfo = "SELECT grp_id,management,grp_name,leader FROM groups ORDER BY grp_id DESC";
    $resultGrpInfo = mysqli_query($connection,$selectGrpInfo);
?>

<?php while($rowGrpInfo = mysqli_fetch_assoc($resultGrpInfo)) { ?>

<!----------Select Piligrim Numbers----------->
<?php
    $selectPiligrimCount = "SELECT COUNT(grp_id) AS piligrimNum FROM priligrim_info WHERE grp_id={$rowGrpInfo['grp_id']}";
    $resultPiligrimCount = mysqli_query($connection,$selectPiligrimCount);
    
    $rowPiligrimCount = mysqli_fetch_assoc($resultPiligrimCount);
?>
<!-------------Select Leader Name------------->
<?php
	$selectLeaderName = "SELECT full_name_eng FROM priligrim_info WHERE id={$rowGrpInfo['leader']}";
	$resultLeaderName = mysqli_query($connection,$selectLeaderName);
	
	$rowLeaderName = mysqli_fetch_assoc($resultLeaderName);
?>

<tr>
    <td><?php echo $rowGrpInfo["grp_name"] ?></td>
    <td><?php echo $rowGrpInfo["management"] ?></td>
    <td><?php echo $rowLeaderName["full_name_eng"] ?></td>
    <td><?php echo $rowPiligrimCount["piligrimNum"]; ?></td>
    <td>2</td>
    <td><a class="w3-btn w3-blue w3-round" href="grpMembers.php?grp_id=<?php echo $rowGrpInfo["grp_id"]; ?>"><i class="fa fa-folder-open" aria-hidden="true"></i> Open</a></td>
</tr>  
<?php } ?>  