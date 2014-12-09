<?php
	session_start();
	if (! isset($_SESSION['username']))
        {
            
            header('Location: ./logout');
        }
    if (isset($_GET['term']))
    {
        $term = $_GET['term'];
        require 'dbHelper.php';
        $dbo = new db();
        $queryAll = $dbo->searchUsers($term, -1, -1); //Used for counting rows

        $numResults = $queryAll->rowCount();

        $resultsPerPage = 2;
        $numPages = ceil($numResults / $resultsPerPage);

        if (isset($_GET['page']) && (int)$_GET['page'] <= $numPages && $_GET['page'] != '')
            $page = (int)$_GET['page'];
        else
            $page = 1;

        $startFrom = ($page - 1) * $resultsPerPage;

        $query = $dbo->searchUsers($term, $startFrom, $resultsPerPage);

    }
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search</title>
    </head>

    <body>
        <?php include 'header.php'; ?>
        <div class="container">
            <h3>Your search for <?php
            $plural = $numResults != 1 ? "results" : "result";
             echo "'$term' returned ". $numResults . ' ' . $plural ?></h3>
             <h4>Showing <?php echo $resultsPerPage ?> results per page</h4>
           <?php

            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {?>
                <a href="./profile?user=<?php echo $row['userName']?>">
                    <div class="row-fluid" style="margin-top: 20px;">
                        <div class="span5 well">
                            <img src="<?php echo $dbo->getProfilePhoto($row['userId']);?>" width="320" height="240"/>
                        </div>
                        <div class="span7 well">
                            <h4><?php echo $row['fName'] . ' ' . $row['lName']; ?></h4>
                            <p>Location: <?php echo $row['originCity'].', '.$row['originCountry']; ?></p>
                            <p>Gender: <?php echo $row['sex']; ?></p>
                            <p>About: <?php echo $row['about'] ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <div class="pagination">
              <ul>

                <?php
                if ($page == 1)
                    echo "<li class='disabled'><a href='#'>Prev</a></li>";
                else
                {
                    $previousPage = $page - 1;
                    echo "<li><a href='./search?page=$previousPage&term=$term'>Prev</a></li>";
                }


                for ($i=1; $i < $numPages+1; $i++)
                {
                    $theClass = '';
                    if($i == $page)
                        $theClass = 'active';
                    echo "<li class='$theClass'><a href='./search?page=$i&term=$term'>$i</a></li>";
                }

                if ($page == $numPages)
                    echo "<li class='disabled'><a href='#'>Next</a></li>";
                else
                {
                    $nextPage = $page+1;
                    echo "<li><a href='./search?page=$nextPage&term=$term'>Next</a></li>";
                }

                ?>
              </ul>
            </div>
        </div> <!-- /container -->
        <?php include 'footer.php'; ?>
    </body>
</html>
