

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
            <form  action="" method="get">
				<div class="span6 well" style="margin-left:300px">
                Search Concert : <input type="text" class="search-query" placeholder="Search Concerts" name="term">
				<br/>
				<br/>
				<table>
				<tr><td>
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
				</td>
				<td>
				<select id="band" name="band">
				<option value="">-Select Band-</option>
				 <?php 
				 $query1 =$dbo->getAllBand(); 
				 while ($row1 = $query1->fetch(PDO::FETCH_ASSOC))
				 {
				 ?>
				 <option value=<?php echo $row1['bandId'] ?>><?php echo $row1['bandName'] ?></option>
				 <?php } ?>
				</select>
				</td>
				<tr>
				<td>
					From Date<input type="date" class="input-block-level" placeholder="From Date" name="fromDate">
				</td>
				<td>
				To Date<input type="date" class="input-block-level" placeholder="To Date" name="toDate">
				</td>
				</tr>
				</table>
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
				$bandId = $_GET['band'];
				$fromDate = $_GET['fromDate'];
				$toDate = $_GET['toDate'];
                $queryAll = $dbo->searchConcert($term,$musicCat,$bandId,$fromDate,$toDate, -1, -1); //Used for counting rows

                $numResults = $queryAll->rowCount();

                $resultsPerPage = 2;
                $numPages = ceil($numResults / $resultsPerPage);

                if (isset($_GET['page']) && (int)$_GET['page'] <= $numPages && $_GET['page'] != '')
                    $page = (int)$_GET['page'];
                else
                    $page = 1;

                $startFrom = ($page - 1) * $resultsPerPage;

                $query = $dbo->searchConcert($term,$musicCat,$bandId,$fromDate,$toDate, $startFrom, $resultsPerPage);

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
                <a href="./profile?user=<?php echo $row['conName']?>">
                    <div class="row-fluid" style="margin-top: 20px;">
                        <div class="span7 well">
                            <h4><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId'] ?>"><?php echo $row['conName'] ?></a> by <a href="bandProfile?user=<?php echo $row['userName'] ?>"><?php echo $row['bandName'] ?></a></b></font></h4>
							<h4><?php echo $row['conDesc']; ?></h4>
                            <b><p>Performed At : </b><?php echo $row['vCity'].', '.$row['vName']; ?></p>
                            <b><p>Attendance  : </b><?php echo $row['rsvpCnt']; ?></p>	
                            <iframe width="320" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $row['vAddr']; ?>&output=embed"></iframe></font>

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
                    echo "<li><a href='./concertSearch?page=$previousPage&term=$term&musicCat=$musicCat&band=$bandId&fromDate=$fromDate&toDate=$toDate'>Prev</a></li>";
                }


                for ($i=1; $i < $numPages+1; $i++)
                {
                    $theClass = '';
                    if($i == $page)
                        $theClass = 'active';
                    echo "<li class='$theClass'><a href='./concertSearch?page=$i&term=$term&musicCat=$musicCat&band=$bandId&fromDate=$fromDate&toDate=$toDate'>$i</a></li>";
                }

                if ($page == $numPages)
                    echo "<li class='disabled'><a href='#'>Next</a></li>";
                else
                {
                    $nextPage = $page+1;
                    echo "<li><a href='./concertSearch?page=$nextPage&term=$term&musicCat=$musicCat&band=$bandId&fromDate=$fromDate&toDate=$toDate'>Next</a></li>";
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
