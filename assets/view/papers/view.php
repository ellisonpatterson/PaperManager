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
                <h2><?php echo (!empty($paper['title']) ? $paper['title'] : 'No title is currently set.') ?></h2>
                <hr>
                <h3>Description</h3>
                <p><?php echo (!empty($paper['abstract']) ? $paper['abstract'] : 'No description is currently set.') ?></p>
                <hr>
                <h3>Keywords</h3>
                <p><?php $keywords = rtrim(implode(', ', $keywords), ', '); if (!empty($keywords)) { echo $keywords; } else { echo 'No keywords are available.'; } ?></p>
                <hr>
                <h3>Emails</h3>
                <p><?php $emails = rtrim(implode(', ', $emails), ', '); if (!empty($emails)) { echo $emails; } else { echo 'No emails are available.'; } ?></p>

                <?php if (isset($user['id']) && in_array($user['id'], $facultyIds)) { ?>
                <p>
                    <a class="btn btn-primary btn-lg" href="<?php echo Helper_Route::loadRoute('papers/edit&paperId=' . $paper['paperId']); ?>" role="button">Edit</a>
                    <a class="btn btn-primary btn-lg" href="<?php echo Helper_Route::loadRoute('papers/delete&paperId=' . $paper['paperId']); ?>" role="button">Delete</a>
                </p>
                <?php } ?>
            </div>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>