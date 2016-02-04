<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h1>Add Paper</h1>
            </div>

            <div class="jumbotron">
                <h3>Add Paper Details</h3>
                <hr>
                <form class="form-edit-paper-details form-horizontal" action="<?php echo Helper_Route::loadRoute('papers/add/process'); ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
    
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Description:</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="description" id="description" placeholder="Description" required></textarea>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="citation">Citations:</label>
    
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="citation" id="citation" placeholder="Citations"></textarea>
                        </div>
                    </div>
    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Save Paper Details</button>
                </form>
            </div>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>