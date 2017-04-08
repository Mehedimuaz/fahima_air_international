
<!-----------Retrieving top 5 recent news---------->
<?php
	$SelectNews5 = "SELECT id,heading FROM recent_news ORDER BY id DESC LIMIT 5";
	$ResultNews5 = mysqli_query($connection,$SelectNews5);
?>

<div class="footer" id="newsId">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Rules</h2>
                <a href="terms&Conditions.php">Terms & Conditions</a><br/>
                <a href="paymentMethods.php">Payment Methods</a><br/>
                <a href="hajjRules.php">Hajj Rules</a><br/>
            </div>
            <div class="col-md-4">
                <h2>Queries</h2>
                <a href="faq.php">FAQ</a><br/>
            </div>
            <div class="col-md-4">
                <h2>Recent News</h2>
                <?php while($RowNews5 = mysqli_fetch_assoc($ResultNews5)) { ?>
                <a href="fullNews.php?newsId=<?php echo $RowNews5['id']; ?>"><?php echo substr($RowNews5["heading"],0,40) . "..."; ?></a> <br/>
                <?php }?>
                <a style="color:black;" class="btn btn-default" href="newsList.php">All News</a>
            </div>
        </div>
    </div>
</div>