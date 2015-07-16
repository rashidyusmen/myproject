<?php require_once('includes/header.php');?>


            <form action="" method="post" enctype="multipart/form-data">
                <label>
                    Name
                    <input type="text" name="name" value="">
                </label>
                <br><br>
                <label>
                    Email
                    <input type="text" name="email" value="">
                </label>
                <br><br>
                <label>
                    Phone
                    <input type="text" name="phone" value="">
                </label>
                <br><br>
                <label>
                    date
                    <input type="text" name="date" value="<?php echo date('Y.m.d H:i:s') ;?>">
                </label>
                <br><br>
                    Message
                <br>
                    <textarea rows="10"  cols="50" name="message"></textarea>
                <br><br>
                <button type="submit">Dobavi</button>
            </form>
         <br><br>

<?php require_once('includes/footer.php');?>