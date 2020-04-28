<style>
  .header {
  overflow: hidden;
  background-color: rgba(2,86,94,.6);
  padding: 20px 10px;
  width: 100%;
 
}

/* Style the header links */
.header a {
  float: left;
  text-transform: uppercase;
  color: #fff;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 20px;
  font-family : 'Raleway', sans-serif;
  letter-spacing: 2px;
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */

.header a.logo {
  font-size: 25px;
  font-weight: bold;

}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #A20352;
  color: #fff;
}

/* Style the active/current link*/
.header a.active {
  background-color: #1E90FF;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
#banner h2 {
			color: #ffffff;
			display: inline-block;
			font-size: 3.5em;
			line-height: 1.35;
			margin-bottom: 0.5em;
		}

#banner p {
			color: #aaa;
			font-size: 1.5em;
			margin-bottom: 1.75em;
			text-transform: uppercase;
		}
    </style>

<?php
 require 'util.php';
 init_php_session();
 
 ?>
    
    <div class="header">
 <img src="public/logo-telethon-2.png" alt="" height="70px" 
    width="70px"/>
  <a class="logo">Téléthon St Colomban</a>
  <div class="header-right">
    <a href="index.php">Menu</a>
    <a  href="public/index_1.php">Inscription</a>
    <a href="login.php">Espace Membre</a>
    <a href="maps_contact.php">Contact</a>
  <?php if(is_admin()){ ?> <a href="deconnexion.php">Se déconnecter</a> <?php } ?>
  <?php if(is_superviseur()){ ?> <a href="deconnexion.php">Se déconnecter</a> <?php } ?>

  </div>
</div>


	


























