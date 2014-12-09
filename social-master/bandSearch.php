

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php 
		session_start();
		include 'header.php';
		require 'dbHelper.php';
        $dbo = new db();
        $in=0; ?>
		<hr>
            <center>
            <form action="" method="get">
			<div class="span3 well" style="margin-left:500px">
                Search Band : <input type="text" class="search-query" placeholder="Search Band" name="term">
				<br/>
				<br/>
				<select id="musicCat" name="musicCat">
				<option value="">-Select Music Category-</option>
				 <?php 
				 $query1 =$dbo->getAllMusicCategory(); 
				 while ($row1 = $query1->fetch(PDO::FETCH_ASSOC))
				 {
				 ?>
				 <option value=<?php echo $row1['catId'] ?>><?php echo $row1['catName'] ?></option>
				 <?php } ?>
				</select>
				<br/>
				<br/>
				<button type="submit" class="btn btn-primary btn-large" value="search" name="submit">Search</button>
				</div>
            </form>
            </center>
            
        <div class="container">
        <?php
            
            if (isset($_GET['term']))
            {
                $in=1;
                $term = $_GET['term'];
                $musicCat = $_GET['musicCat'];
				
				$queryAll = $dbo->searchBand($term,$musicCat,-1, -1); //Used for counting rows

                $numResults = $queryAll->rowCount();

                $resultsPerPage = 2;
                $numPages = ceil($numResults / $resultsPerPage);

                if (isset($_GET['page']) && (int)$_GET['page'] <= $numPages && $_GET['page'] != '')
                    $page = (int)$_GET['page'];
                else
                    $page = 1;

                $startFrom = ($page - 1) * $resultsPerPage;

                $query = $dbo->searchBand($term,$musicCat, $startFrom, $resultsPerPage);

            }
         ?>
        
        <?php
        if($in==1)
        {   
        ?>
            <center>
		    <h4>Your search for <?php
            $plural = $numResults != 1 ? "results" : "result";
             echo "'$term' returned ". $numResults . ' ' . $plural ?></h4>
             <h4>Showing <?php echo $resultsPerPage ?> results per page</h4>
         </center>
             <?php

            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {?>
                <a href="./profile?user=<?php echo $row['bandName']?>">
                    <div class="row-fluid" style="margin-top: 20px;">
                        <div class="span5 well">
                            <img src="<?php echo $dbo->getProfilePhoto($row['bandId']);?>" />
                        </div>
                        <div class="span7 well">
                            <h4><font size="3"><b><a href="bandProfile?user=<?php echo $row['userName'] ?>"><?php echo $row['bandName'] ?></a></b></font></h4>
							<h4><?php echo $row['bandDesc']; ?></h4>
                            <p>Home: <?php echo $row['originCity'].', '.$row['originCountry']; ?></p>
                            <p>Average Rating: <?php echo $row['avgRating']; ?></p>
                            <p>Concerts Performed: <?php echo $row['concertCnt'] ?></p>
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
                    echo "<li><a href='./bandSearch?page=$previousPage&term=$term&musicCat=$musicCat'>Prev</a></li>";
                }


                for ($i=1; $i < $numPages+1; $i++)
                {
                    $theClass = '';
                    if($i == $page)
                        $theClass = 'active';
                    echo "<li class='$theClass'><a href='./bandSearch?page=$i&term=$term&musicCat=$musicCat'>$i</a></li>";
                }

                if ($page == $numPages)
                    echo "<li class='disabled'><a href='#'>Next</a></li>";
                else
                {
                    $nextPage = $page+1;
                    echo "<li><a href='./bandSearch?page=$nextPage&term=$term&musicCat=$musicCat'>Next</a></li>";
                }

                ?>
              </ul>
            </div>
		<?php
        }
        ?>







        </div> <!-- /container -->
        <?php include 'footer.php'; ?>
    </body>
</html>
