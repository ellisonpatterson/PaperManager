<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h1>View Paper - <?php echo $paper['title']; ?></h1>
            </div>

            <div class="jumbotron">
                <h2>Delete <?php echo $paper['title']; ?>?</h2>
                <hr>
                <p>You are deleting the paper titled '<?php echo $paper['title']; ?>'. Once this is performed it cannot be undone.</p>

                <p>
                    <a class="btn btn-primary btn-lg" href="<?php echo Helper_Route::loadRoute('papers/delete/process&paperId=' . $paper['paperId']); ?>" role="button">Delete Paper</a>
                </p>
            </div>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>