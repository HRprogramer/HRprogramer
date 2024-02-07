<?php require('./SQL.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Style/style.css">
        <title>Create a new post</title>
    </head>
    <body>
        <section class="post">
            
            <div class="class_h1">
                <h1>Create a new post</h1>    
            </div>
            <main>    
                <form method = "post">
                    <label for="text">
                        <h3>Title :</h3>
                        <input type="text" name="text1" >
                    </label>
                    <label for="text">
                        <h3>Write your text :</h3>
                        <textarea name="box_text" id="" cols="70" rows="10"></textarea>
                    </label>
                    <label for="text">
                        <h3>Labels :</h3>
                        <input type="text" name="text2" >
                    </label>
                    <label for="submit">
                        <input type="submit" name="Confirm" value="Confirm">
                        <input type="submit" name="Cancel" value="Cancel">
                    </label>
                </form>
            </main>
        </section>
    </body>
</html>

