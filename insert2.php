<?php
            $link = mysql_connect('localhost', 'bettybae', 'talkthings0465');
            if(!$link) die("Could not connect:".mysql_error());
            mysql_query("set names utf8");
            mysql_select_db("bettybae");
            
            if($_POST['secret'] != NULL) {
            mysql_query('insert into secrets values(NULL, "'.$_POST['secret'].'", CURRENT_TIMESTAMP)');
            }
            
           // $query_result = mysql_query("select * from secrets order by TIME desc");

            //while($row = mysql_fetch_assoc($query_result)) 
            //{
               // echo $row['secret'] . "&nbsp;&nbsp;&nbsp;&nbsp;....<i style='font-size:8px;'>" . $row['time'] . "</i>";
               // echo "<br />";
            //}
            
            mysql_close($link);
            header("Location: secret.php");
        ?>