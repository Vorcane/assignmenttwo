<!DOCTYPE html>
<html lang = "en" xmlns = "http://www.w3.org/1999/xhtml" >

<head>
	<title>HeatWave Gaming</title>
	<meta charset="utf-8"></meta>
	<link rel="stylesheet" type="text/css" href="css/styles.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
    <script src="javascript/js.cookie.js"></script>
    <script src="javascript/scripts.js"></script>
</head>

<body onload="checklogin()">
	<div class="outer">
		<!--Code for the header-->
		<header>
		<img src="images/header.jpg" alt="header">
		</header>
		
		<!--Code for the nav and the search bar-->
		<nav>
			<ul>
				<!--Possibly make these drop down lists unless we dont have enough buttons-->
				<!--Example of dropdown would be genre>fps>mmo>rpg etc
				For price could be <20 <30 <30 etc make it easy to find cheap games
				Poissbly add one for on sale and make like 3 games on sale-->
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="#">Price</a>
					<ul>
						<li><a href="#" id="utwent">Under $20</a></li>
						<li><a href="#" id="ufifty">Under $50</a></li>
						<li><a href="#" id="ofifty">Over $50</a></li>
					</ul>
				</li>
				
				<li><a href="#">Genre</a>
					<ul>
						<li><a href="#" id="fps">FPS</a></li>
						<li><a href="#" id="mmo">MMO</a></li>
						<li><a href="#" id="racing">Racing</a></li>
						<li><a href="#" id="adventure">Adventure</a></li>
						<li><a href="#" id="sandbox">Sandbox</a></li>
						<li><a href="#" id="sports">Sports</a></li>
						<li><a href="#" id="action">Action</a></li>
						<li><a href="#" id="rts">RTS</a></li>
						<li><a href="#" id="fighter">Fighter</a></li>
						<li><a href="#" id="rpg">RPG</a></li>
					</ul>
				</li>
				<li><a href="#" id="aboutus">About Us</a></li>
				<li><a href="#">Help</a></li>
				<li><a href="#">Cart</a>
                    <ul>
                        <div id="cart">
                            
                        </div>
                    </ul>
                </li>
				<!--Code for the search bar-->
				<form class="search" name="searchBar" action="javascript:AnyFunction();" method="POST">
					<label>Search: <input type="text" id="search" name="searchbar" placeholder="Enter product name"></input> </label>
					<input type="submit" id="search-submit" value="search"></input>
				</form>
			</ul>
		</nav>
		
		<div class="login-form" id="login-form">
			Username: <input type="text" id="username">
            Password: <input type="password" id="password">
            <input type="submit" value="Login" id="login-submit" onclick="login()">
            <div id="login-data"></div>
            <script login()></script>
		</div>
		
		<!--Code for the section that will contain the products-->
		<section class="mainCont" id="mainCont">
			<div id="search-data">
				<?php
					require "database/connect.php";
					
					$query = mysql_query("SELECT * FROM products");
					
					# Displaying what the query retrieved
					while ($row = mysql_fetch_assoc($query)) {
                        $productID = $row["productID"];
						echo "<div class='prodContainer'>"; # Starting the container
						echo "<p>" . $row["name"] . "</p>";
						echo "<p>$" . $row["price"] . "</p>";
						echo "<p>" . $row["description"] . "</p>";
						echo "<p>" . $row["rating"] . "</p>";
						echo "<form name='addButton' action='' method='POST'><input type='submit' name='addToC' value='Add to Cart' id='$productID' onclick='addtocart($productID)'></input></form>";
						echo "</div>"; # Ending the container
					}
					#echo (mysql_num_rows($query) !== 0) ? mysql_result($query, 0, "name") : "Not found";	
				?>
			</div>
		</section>


		<footer>
			<p>Created by Lachlan + Mitchell</p>
		</footer>
	</div>
	
    <script src="javascript/global.js"></script>		
</body>
</html> 


