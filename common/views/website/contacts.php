<?php require_once('includes/header.php');?>
        <h2>Contacts</h2>
        <section class="contact-text">
            <h3>Address</h3>
            <address>
            </address>
        </section>
        <section class="contact-form">
            <h3>Contact Form</h3>
            <form action="" method="post">
                <label>
                    <span>Name </span>
                    <input type="text" name="name" value="">
                </label>
                <label>
                    <span>Email </span>
                    <input type="text" name="email" value="">
                </label>
                <label>
                    <span>Phone </span>
                    <input type="text" name="phone" value="">
                </label>
                <label>
                    <span>date </span>
                    <input type="text" name="date" value="<?php echo date('Y.m.d H:i:s') ;?>">
                </label>
                <label>
                    <span>Message</span>
                 </label>
                <label>
                    <textarea rows="10"  cols="50" name="message"></textarea>
                </label>
                <button type="submit">Send</button>
            </form>
         </section>
         <br><br>
         <section class="contact-map">
            <img src="includes/image/address.png">
         </section>
         <br><Br><br>

<?php require_once('includes/footer.php');?>