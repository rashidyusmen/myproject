<?php require_once('includes/header.php'); ?>

<div class="chat">
    <button type="button" id="webrtc">video</button>
    <br><br>
    <textarea id="chatcontainerweb" readonly="readonly" rows="10" cols="80">Loading...</textarea>
    <br><br>
    <input type="text" id="msgweb" placeholder="New Message..." size="60">
    <input type="hidden" id="webusername" value="<?php if (isset($_SESSION['user_id'])) {echo $_SESSION['user_id']; } else {echo '';} ?>">
    <button type="button" id="webchatsend">Send</button>
</div>

<?php require_once('includes/footer.php'); ?>