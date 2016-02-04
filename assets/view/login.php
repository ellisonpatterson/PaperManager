<!DOCTYPE html>

<html>
    <?php echo $this->loadFile('assets/view/include/head.php'); ?>

    <body>
        <?php echo $this->loadFile('assets/view/include/navigation.php'); ?>

        <div class="container">
            <div class="page-header">
                <h1>Login</h1>
            </div>

            <form class="form-login" action="<?php echo Helper_Route::loadRoute('login/process'); ?>" method="post">
                <label for="email" class="sr-only">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required autofocus>

                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

                <div class="checkbox">
                    <label><input type="checkbox" name="ldap">Use RIT Login</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>

        <?php echo $this->loadFile('assets/view/include/footer.php'); ?>
        <?php echo $this->loadFile('assets/view/include/javascript.php'); ?>
    </body>
</html>