<?php require('./SQL.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Style/style.css">
        <title>Editing</title>
    </head>

    <body>
        <section class="edit">
            <div>
                <p><?php echo htmlspecialchars($error_edit); ?></p>
            </div>
            <h1>Editing your information</h1>

            <main>
                <div class="edit-box-1">
                    <div class="name">
                        <form method="post">
                            <label for="text">
                                <span>Your Name : <br></span>
                                <input type="text" name="Uname" placeholder="<?php echo htmlspecialchars($Username); ?>">
                            </label>
                        </form>
                    </div>

                    <div class="job">
                        <form method="post">
                            <label for="text">
                                <span>Your Job : <br></span>
                                <input type="text" name="job" placeholder="<?php echo htmlspecialchars($Job); ?>">
                            </label>
                        </form>
                    </div>

                    <div class="pass">
                        <form method="post">
                            <label for="text">
                                <span>Your Password :<br></span>
                                <input type="text" name="pass" placeholder="<?php echo htmlspecialchars($Password); ?>">
                            </label>
                        </form>
                    </div>
                </div>
                <div class="edit-box-2">
                    <div class="email">
                        <form method="post">
                            <label for="text">
                                <span>Your Email :<br></span>
                                <input type="text" name="Email" placeholder="<?php echo htmlspecialchars($Email); ?>">
                            </label>
                        </form>
                    </div>

                    <div class="city">
                        <form method="post">
                            <label for="text">
                                <span>Your City :<br></span>
                                <input type="text" name="place" placeholder="<?php echo htmlspecialchars($City); ?>">
                            </label>
                        </form>
                    </div>

                    <div class="biu">
                        <form method="post">
                            <label for="text">
                                <span>Your Biu :<br></span>
                                <input type="text" name="Biu" placeholder="<?php echo htmlspecialchars($Biu); ?>">
                            </label>
                        </form>
                    </div>
                </div>
            </main> 
            <div class="Save">
                <form method="post" name="form-submit">
                    <label for="submit">
                        <input type="submit" name="submitinsert" value="Save">
                    </label>
                    <label for="submit">
                        <input type="submit" name="cancel" value="Cansel">
                    </label>
                </form>
            </div>
        </section>
    </body>
</html>