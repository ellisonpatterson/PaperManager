<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h1>Edit Paper - <?php echo $paper['title']; ?></h1>
            </div>

            <div class="jumbotron">
                <h3>Edit Paper Details</h3>
                <hr>
                <form class="form-edit-paper-details form-horizontal" action="<?php echo Helper_Route::loadRoute('papers/edit/details'); ?>" method="post">
                    <input type="hidden" name="paperId" value="<?php echo $paper['id']; ?>" />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
    
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $paper['title']; ?>" placeholder="Title" required>
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

            <div class="jumbotron">
                <h3>Add Paper Keywords</h3>
                <hr>
                <p><?php $keywords = rtrim(implode(', ', $keywords), ', '); if (!empty($keywords)) { echo $keywords; } else { echo 'No keywords are available.'; } ?></p>
                <hr>
                <p>Separate each keyword by a comma.</p>
                <form class="form-edit-paper form-horizontal" action="<?php echo Helper_Route::loadRoute('papers/edit/keywords'); ?>" method="post">
                    <input type="hidden" name="paperId" value="<?php echo $paper['id']; ?>" />

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="keywords">Keywords:</label>
    
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Keywords">
                        </div>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Save Keywords</button>
                </form>
            </div>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <script type="text/javascript">document.getElementById("description").value = '<?php echo $paper['abstract']; ?>'; document.getElementById("citation").value = '<?php echo $paper['citation']; ?>';</script>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>