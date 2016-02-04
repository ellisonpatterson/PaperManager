<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h1>Search Results</h1>
            </div>

            <?php if (!empty($papers)) { ?>
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
                                echo '<td class="tableTitle">' . (!empty($paper['title']) ? $paper['title'] : 'No title is currently set.') . '</td>';
                                echo '<td class="tableDescription">' . (!empty($paper['abstract']) ? $paper['abstract'] : 'No description is currently set.') . '</td>';
                                echo '<td class="tablePageViews">' . $paper['page_view'] . ' View(s)</td>';
                                echo '<td class="tableAction"><a href="' . Helper_Route::loadRoute('papers/view&paperId=' . $paper['id']) . '"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></a></td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            <?php }
                else
                {
                    echo '<h3>No papers were found!</h3>';
                }
            ?>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>