<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo Helper_Route::loadRoute(''); ?>"><?php echo Helper_View::getWebsiteName(); ?></a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($user['id']))
                {
                    echo '<li><a href="';
                    echo Helper_Route::loadRoute('login/logout');
                    echo '">Logout</a></li>';
                }
                else
                {
                    echo '<li><a href="';
                    echo Helper_Route::loadRoute('login');
                    echo '">Login</a></li>';
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>