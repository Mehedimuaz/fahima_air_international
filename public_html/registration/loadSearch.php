<?php include_once("dbConnector.php"); ?>

<!-------------------Select List of hajji---------------->
<?php
    $selectListOfHajji = "SELECT id,nid,bc,full_name_eng,grp_id,curr_district FROM priligrim_info ORDER BY id DESC";
    $resultListOfHajji = mysqli_query($connection,$selectListOfHajji);
?>
<tr>
    <th>Serial No</th>
    <th>Tracking ID</th>
    <th>Name</th>
    <th>Voucher</th>
    <th>Group</th>
    <th>Location</th>
    <th>Status</th>
    <th>Action</th>
</tr>
<?php while($rowListOfHajji = mysqli_fetch_assoc($resultListOfHajji)) { ?>

<?php
	$selectGrpName = "SELECT grp_name FROM groups WHERE grp_id='{$rowListOfHajji['grp_id']}'";
	$resultGrpName = mysqli_query($connection,$selectGrpName);
	$rowGrpName = mysqli_fetch_assoc($resultGrpName);
?>

<tr id="hajjiListId">
	<td><?php echo $rowListOfHajji["id"]; ?></td>
	<?php if(!empty($rowListOfHajji["nid"])) { ?>
	<td><?php echo $rowListOfHajji["nid"] ?> (NID)</td>
	<?php } ?>
	<?php if(!empty($rowListOfHajji["bc"])) { ?>
	<td><?php echo $rowListOfHajji["bc"] ?> (BC)</td>
	<?php } ?>
	<td><?php echo $rowListOfHajji["full_name_eng"]; ?></td>
	<td></td>
	<td style="overflow:hidden"><?php echo $rowGrpName["grp_name"]; ?></td>
	<td><?php echo $rowListOfHajji["curr_district"] ?></td>
	<td class="w3-text-red"><i class="fa fa-times" aria-hidden="true"></i> Unpaid</td>
	<td><a id="openBtnId" class="w3-btn w3-blue w3-round" href="hajjiProfile.php?id=<?php echo $rowListOfHajji["id"]; ?>"><i class="fa fa-folder-open" aria-hidden="true"></i> Open</a></td>
</tr>

<?php } ?>