<?php require_once('includes/header.php'); ?>

<div class="chat">
    <textarea id="chatcontainer" readonly="readonly" rows="10" cols="80">Loading...</textarea>
    <br><br>
    <input type="text" id="msg" placeholder="New Message..." size="60">
    <input type="hidden" id="username" value="<?php echo $username; ?>">
    <button type="button" id="chatsend">Send</button>
</div>

<?php require_once('includes/footer.php'); ?>