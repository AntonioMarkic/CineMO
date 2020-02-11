<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">CineMo</h1>
    </a>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 14px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}*/
</style>
<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="index.php">Početna</a></li>
            <li><a href="prijava.php">Prijava</a></li>
			<div class="topnav">
			<div class="search-container">
			<form action="trazi.php" method="GET">
			<input id="search" name="search" type="text" placeholder="Traži film">
			<button id="submit" type="submit"><i class="fa fa-search"></i></button>
			</form>	
			 </div>
			</div>
        </ul>
    </nav>
</div>