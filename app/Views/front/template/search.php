<form method="GET" action="blog">
                <div>
                    <input type="search" name="query" placeholder="Rechercher un article ..." value="<?php if(isset($_GET['query'])) echo $query ?>">
                </div>
                <div>
                    <input type="submit" value="Go!">
                </div>
            </form>