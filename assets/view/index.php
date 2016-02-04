<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h3><?php if (!empty($user['id']) && isset($user['id'])) { echo 'Hello '; echo $user['fName']; echo ' '; echo $user['lName']; echo '!'; } ?></h3>

                <?php if (!empty($user['id']) && isset($user['id'])) { ?><a href="<?php echo Helper_Route::loadRoute('papers/add'); ?>"><button class="btn btn-lg btn-primary pull-right" type="button">Add Paper</button></a><?php } ?>

                <h1>Search for Papers</h1>
            </div>

            <div id="search">
                <form action="<?php echo Helper_Route::loadRoute('search'); ?>" method="post">
                    <input type="search" name="keyword" placeholder="type keyword here" autocomplete="off" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <?php if (isset($user['id']) && !empty($papers)) { ?>
                <h3>My Papers</h3>
                <table class="table table-striped">
                	<thead>
                		<tr>
                			<th>Title</th>
                			<th>Description</th>
                			<th>View Count</th>
                			<th>Actions</th>
                		</tr>
                	</thead>
        
                    <tbody>
                        <?php
                            foreach ($papers as $paper)
                            {
                                echo '<tr>';
                                echo '<td class="tableTitle">' . $paper['title'] . '</td>';
                                echo '<td class="tableDescription">' . $paper['abstract'] . '</td>';
                                echo '<td class="tablePageViews">' . $paper['page_view'] . ' View(s)</td>';
                                echo '<td class="tableAction"><a href="' . Helper_Route::loadRoute('papers/view&paperId=' . $paper['id']) . '"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></a></td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>