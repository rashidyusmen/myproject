<?php require_once('includes/header.php'); ?>

<?php foreach($page as $key => $value) { ?>

    <p>
    <?php echo $value->getTitle(); ?>
    <br>
    <?php echo $value->getContent(); ?>
     </p>
     <br><br>
     <?php } ?>

<?php require_once('includes/footer.php'); ?>