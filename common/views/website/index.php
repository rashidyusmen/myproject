<?php require_once('includes/header.php');?>

     	 	 	 <p>
     	 	 	 	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur ante quis hendrerit dignissim. Proin ullamcorper iaculis justo aliquam iaculis. Maecenas ac enim rhoncus, tincidunt libero at, suscipit lorem. Suspendisse porta elit eu convallis pulvinar. Aliquam sollicitudin, dolor sed molestie rutrum, urna diam ornare ipsum, et porta nisi lorem sed nulla. Morbi finibus eget nibh quis vehicula. Sed auctor neque vel nisi volutpat consectetur. Vestibulum ultricies sapien vitae maximus scelerisque.
     	 	 	  </p>
     	 	 <div class="container-tvo">
<?php foreach ($products as $value) { ?>
     	 	 	 <div class="container-tvo-one">
     	 	 	 	<a href="index.php?frontcontroller=products&id=<?php echo $value->getId();?>"><img src="../storage/<?php echo $value->getImage();?>"></a>
     	 	 	 	<a href="index.php?frontcontroller=products&id=<?php echo $value->getId();?>"><h3><?php echo $value->getTitle();?></h3></a>
     	 	 	 	<a href="index.php?frontcontroller=products&id=<?php echo $value->getId();?>"><em>&dollar;<?php echo $value->getPrice();?></em></a>
     	 	 	  </div>
<?php } ?>
                 </div>
<br><br>
                      <div class="container-latest-news">
                      <h2>Latest News</h2>
<?php foreach ($news as $value) { ?>
                           <p>
                                <?php echo $value->getExcerpt();?><a href="index.php?frontcontroller=article&id=<?php echo $value->getId();?>">Read More</a>
                           </p>
<?php } ?>
                      </div>
                      <br><br><br>

<?php require_once('includes/footer.php');?>