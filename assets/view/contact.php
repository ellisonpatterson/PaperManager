<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h1><?php echo $title ?></h1>
            </div>

            <div class="jumbotron">
                <h3>Contact Form</h3>
                <hr>
                <form class="form-edit-paper-details form-horizontal" action="<?php echo Helper_Route::loadRoute('contact/process'); ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
    
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="message">Message:</label>
    
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="message" id="message" placeholder="Message"></textarea>
                        </div>
                    </div>
    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Contact</button>
                </form>
            </div>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <script type="text/javascript">document.getElementById("description").value = '<?php echo $paper['abstract']; ?>'; document.getElementById("citation").value = '<?php echo $paper['citation']; ?>';</script>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>