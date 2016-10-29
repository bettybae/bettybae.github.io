<!DOCTYPE html>
<html>
<style>
body {background-color:#E0FDFF;}
div#main {font-family: helvetica; font-size: 20px; text-align: center; margin-left: 50px; margin-right: 50px; margin-top: 30px}
div#posts {font-family: helvetica; font-size: 15px; margin-left: 200px; margin-right: 200px}
.textarea {
    border:2px solid #ccc; 
-webkit-border-radius: 5px;
    border-radius: 5px; 
    width: 250px;
    height: 75px;
}
.button {
    border: 1px solid #006;
    background: #9cf;
}

</style>

</head>
<body>
<div id="main">
Share with your friends, secretly.</br>
</br>
Speak freely. </br>
</br>
- Secret</br>
</br>
A place to be candid and connected.</br>
</br>
- Matter</br>
</br>
No profile, no password, it’s all anonymous.</br>
</br>
Ride the Yak.</br>
</br>
- Yik Yak</br>
</br>
Share Secrets, Express Yourself, Meet New People</br>
</br>
- Whisper</br>
</br>
Ask and answer. Find out what people want to know about you!</br>
</br>
- Ask.fm</br>
</br>
What would you say if there were no repercussions? </br>
</br>
No one spying on you, no responsibility?</br>
</br>
Can social be social without a face to put to a profile?</br>
</br>
Would you say something inspiring... or spew vitriol just because you can?</br>
</br>
Anonymity is the backbone of the internet. But as more and more people use it to connect, social services with friend connections have emerged to represent the "internet" to the public. These services tend towards self-curated posts, which means you consciously curtail what you post to make yourself look better and more impressive. This has been known to cause problems with self-image and even lead to online depression. What if we brought back sharing, but with anonymous hand-holding? Wouldn't it make people more sincere with whatever they're sharing?
</br><br>
Anonymous sharing with no frills. Try it out for yourself.</br>
<br>
Disclaimer: I don't keep records of where you post from, nor your name. Only your post along with the timestamp is stored in my database.
</br></br></br>

<form action="insert.php" method="POST">
Something you would like to share? <br><br>
<textarea type="text" name="secret" class="textarea"> </textarea>
<input type="submit" class="button" />
</form>

</div>

</br></br></br></br></br></br>

<div id="posts">
<?php
$link = mysql_connect('localhost', 'bettybae', 'talkthings0465');
            if(!$link) die("Could not connect:".mysql_error());
            mysql_query("set names utf8");
            mysql_select_db("bettybae");
$query_result = mysql_query("select * from secrets order by TIME desc");
while($row = mysql_fetch_assoc($query_result)) 
            {
                echo $row['secret'] . "&nbsp;&nbsp;&nbsp;&nbsp;....<i style='font-size:10px;'>" . $row['time'] . "</i>";
                echo "<br /><br />";
            }
            
            ?>
</div>



</body>
</html>