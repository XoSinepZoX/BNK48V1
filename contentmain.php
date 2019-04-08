<?php
	include('dbconn.php');
	session_start();
	$compcount = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="/stylesheets/styles.css" />
    <link type="text/css" rel="stylesheet" href="/stylesheets/style2.css" />	
</head>
<body class="centera bgc-base-color" style = "margin-left:4em">
	<div class = "flex-item">
		<!-- ITEM LOOP BEGIN -->
			<!-- QUARY PART START HERE -->
				<?php
				$q = 'SELECT listings.ItemID,Topic,Pic,Mode,Style,Price,TradeMemName,TradeSetName,TradeStyle,PIC2,PIC3,Username FROM `hopeful-lexicon-236016.mydataset.listings` AS listings LEFT JOIN `hopeful-lexicon-236016.mydataset.buysell` AS buysell ON listings.ItemID=buysell.ItemID LEFT JOIN `hopeful-lexicon-236016.mydataset.trade` AS trade ON listings.ItemID=trade.ItemID LEFT JOIN `hopeful-lexicon-236016.mydataset.users` AS users ON listings.UID=users.UID LEFT JOIN `hopeful-lexicon-236016.mydataset.piccomp` AS piccomp ON listings.ItemID=piccomp.ItemID WHERE Status="Active" ORDER BY DateAdded DESC;';
				$count=0;
				$queryJobConfig = $bigQuery->query($q);
				$job = $bigQuery->startQuery($queryJobConfig);
				$queryResults = $job->queryResults();
				if ($queryResults->isComplete()) {	
				foreach ($queryResults as $row) {
				?>
			<!-- END QUARY PART HERE -->
				<div class ="itemstyle">
					<table width="200" border=0>
					<!-- BANNER BTT START HERE -->
						<tr>
							<td>
								<a  href="item.php?itemid=<?php echo($row['ItemID']) ?>">
								</a>
							</td>
						</tr>
					
					<!-- BANNER BTT START HERE -->
					<!-- PIC PART START HERE -->
						<tr>
							<td>
								<a  href="item.php?itemid=<?php echo($row['ItemID']) ?>">
								<?php  
									if ($row['Style']!='Complete') {
										if ($row['Mode']=='Selling') { ?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="shadowbox-hover" onmouseover="getElementById('selling-btt<?php echo $sellingcount ;?>').src='img/button/selling2.png';" onmouseout="getElementById('selling-btt<?php echo $sellingcount ?>').src='img/button/selling.png';">
										<?php }
										else if ($row['Mode']=='Buying') { ?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="shadowbox-hover" onmouseover="getElementById('buying-btt<?php echo $buyingcount ;?>').src='img/button/buying2.png';" onmouseout="getElementById('buying-btt<?php echo $buyingcount ?>').src='img/button/buying.png';">

										<?php }
										else{ ?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="shadowbox-hover" onmouseover="getElementById('trading-btt<?php echo $tradingcount ;?>').src='img/button/trading2.png';" onmouseout="getElementById('trading-btt<?php echo $tradingcount ?>').src='img/button/trading.png';">
										<?php }
									}
									else{
										if ($row['Mode']=='Selling') { ?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('selling-btt<?php echo $sellingcount ;?>').src='img/button/selling2.png';" onmouseout="getElementById('selling-btt<?php echo $sellingcount ?>').src='img/button/selling.png';">
											<img src="img/member/<?php echo $row['PIC2'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('selling-btt<?php echo $sellingcount ;?>').src='img/button/selling2.png';" onmouseout="getElementById('selling-btt<?php echo $sellingcount ?>').src='img/button/selling.png';">
											<img src="img/member/<?php echo $row['PIC3'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('selling-btt<?php echo $sellingcount ;?>').src='img/button/selling2.png';" onmouseout="getElementById('selling-btt<?php echo $sellingcount ?>').src='img/button/selling.png';">
										<?php }
										else if ($row['Mode']=='Buying') { ?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('buying-btt<?php echo $buyingcount ;?>').src='img/button/buying2.png';" onmouseout="getElementById('buying-btt<?php echo $buyingcount ?>').src='img/button/buying.png';">
											<img src="img/member/<?php echo $row['PIC2'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('buying-btt<?php echo $tradingcount ;?>').src='img/button/buying2.png';" onmouseout="getElementById('buying-btt<?php echo $tradingcount ?>').src='img/button/trading.png';">
											<img src="img/member/<?php echo $row['PIC3'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('buying-btt<?php echo $buyingcount ;?>').src='img/button/buying2.png';" onmouseout="getElementById('buying-btt<?php echo $buyingcount ?>').src='img/button/buying.png';">
										<?php }
										else{ ?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('trading-btt<?php echo $tradingcount ;?>').src='img/button/trading2.png';" onmouseout="getElementById('trading-btt<?php echo $tradingcount ?>').src='img/button/trading.png';">
											<img src="img/member/<?php echo $row['PIC2'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('trading-btt<?php echo $tradingcount ;?>').src='img/button/trading2.png';" onmouseout="getElementById('trading-btt<?php echo $tradingcount ?>').src='img/button/trading.png';">
											<img src="img/member/<?php echo $row['PIC3'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>" onmouseover="getElementById('trading-btt<?php echo $tradingcount ;?>').src='img/button/trading2.png';" onmouseout="getElementById('trading-btt<?php echo $tradingcount ?>').src='img/button/trading.png';">
										<?php } ?>
								</a>
							</td>
						</tr>
						<!-- END PIC PART HERE -->
						<!-- BADGE PART START HERE -->
						<tr>
							<td>
										<div class="itemstyle-change-btt centera shadowbox">
											<div class="itemstyle-left-btt" <?php echo 'onclick="plusDivs'.$compcount.'(-1)"'?>>&#10094;</div>
											<span class="itemstyle-badge itemstyle-badge<?php echo $compcount?>" <?php echo 'onclick="currentDiv'.$compcount.'(1)"'?>>(1)</span>
											<span class="itemstyle-badge itemstyle-badge<?php echo $compcount?>" <?php echo 'onclick="currentDiv'.$compcount.'(2)"'?>>(2)</span>
											<span class="itemstyle-badge itemstyle-badge<?php echo $compcount?>" <?php echo 'onclick="currentDiv'.$compcount.'(3)"'?>>(3)</span>
											<div class="itemstyle-right-btt" <?php echo 'onclick="plusDivs'.$compcount.'(1)"'?>>&#10095;</div>
										</div>
								<?php
									$compcount = $compcount +1;
									}
								?>
							</td>
						</tr>
						<!-- END BADGE PART HERE -->
						<tr>
							<td>Added By: <?php echo $row['Username']; ?> </td>
						</tr>
						<!-- TOPIC PART START HERE -->
						<?php 
							if ($row['Mode']=='Selling') { ?>
						<tr  onmouseover="getElementById('selling-btt<?php echo $sellingcount ;?>').src='img/button/selling2.png';" onmouseout="getElementById('selling-btt<?php echo $sellingcount ?>').src='img/button/selling.png';">
							<td>
								<a  href="item.php?itemid=<?php echo($row['ItemID']) ?>"><b><?php echo $row['Topic']; ?></b></a>
							</td>
						</tr>
							<?php }
							else if ($row['Mode']=='Buying') { ?>
						<tr onmouseover="getElementById('buying-btt<?php echo $buyingcount ;?>').src='img/button/buying2.png';" onmouseout="getElementById('buying-btt<?php echo $buyingcount ?>').src='img/button/buying.png';">
							<td>
								<a  href="item.php?itemid=<?php echo($row['ItemID']) ?>"><b><?php echo $row['Topic']; ?></b></a>
							</td>
						</tr>
							<?php }
							else{ ?>
						<tr onmouseover="getElementById('trading-btt<?php echo $tradingcount ;?>').src='img/button/trading2.png';" onmouseout="getElementById('trading-btt<?php echo $tradingcount ?>').src='img/button/trading.png';">
							<td>
								<a  href="item.php?itemid=<?php echo($row['ItemID']) ?>"><b><?php echo $row['Topic']; ?></b></a>
							</td>
						</tr>
							<?php } ?>
						<!-- END TOPIC PART HERE -->
					</table>
				</div>
				
                                                
				<?php
					$count++;
				}
}
				if ($count%3==2) {
					echo '<table width=200 class ="itemstyle"></table>';
				}
			?>  
		<!-- ITEM LOOP END -->
	</div>

</body>
	<script>
		var compcount = "<?php echo $compcount ?>";
		<?php
			for ($i=0; $i < $compcount; $i++) { 
				echo 'var slideIndex'.$i.' = 1;
				var SIV'.$i.' = document.getElementById("itemstyle-badge'.$i.'");
				showDivs'.$i.'(slideIndex'.$i.');

				function plusDivs'.$i.'(n'.$i.') {
				showDivs'.$i.'(slideIndex'.$i.' += n'.$i.');
				}

				function currentDiv'.$i.'(n'.$i.') {
				showDivs'.$i.'(slideIndex'.$i.' = n'.$i.');
				}
				function showDivs'.$i.'(n'.$i.') {
					var i'.$i.';
					var x'.$i.' = document.getElementsByClassName("itemstyle-slides'.$i.'");
					var dots'.$i.' = document.getElementsByClassName("itemstyle-badge'.$i.'");
					if (n'.$i.' > x'.$i.'.length) {slideIndex'.$i.' = 1}    
					if (n'.$i.' < 1) {slideIndex'.$i.' = x'.$i.'.length}
					for (i = 0; i < x'.$i.'.length; i++) {
						x'.$i.'[i].style.display = "none";  
					}
					for (i = 0; i < dots'.$i.'.length; i++) {
						dots'.$i.'[i].style.color = "dodgerblue"; 
					}
					x'.$i.'[slideIndex'.$i.'-1].style.display = "block";  
					dots'.$i.'[slideIndex'.$i.' -1].style.color = "#ea709a";
				}
				'
				;
			}
			for ($i=0; $i <$sellingcount ; $i++) { 
				
			}
		?>
	</script>
	<!-- DISABLE RIGHT CLICK SCRIPT START HERE -->
	<script>
		window.addEventListener("contextmenu", e => {
 		 e.preventDefault();
		});
	</script>
	<!-- END DISABLE RIGHT CLICK SCRIPT HERE -->
</html>
