<div>
            <form method="post" action="blog.php">
                <div>
                    <input type="text" name="query" placeholder="Rechercher un article ..." value="<?php if(isset($_POST['query'])) echo $_POST['query'] ?>">
                </div>
                <div>
                    <input type="submit" value="OK!">
                </div>
            </form>
        </div>