
<a class="menu_color menu_item <?php 
		if($page == 'accueil') {
			echo 'menu_item_selected';
		}
	?>" href="index.php?page=accueil" style="top:0px;">Accueil</a>


<div id="menu_item_club" class="menu_color menu_item <?php 
		if($page == 'organisation' or $page == 'ping'
		or $page == 'reglements' or $page == 'membre'
		or $page == 'entrainements' or $page == 'presse'
                or $page == 'equipes') {
			echo 'menu_item_selected';
		}
	?>" style="top:20px;">Club</div>


<a class="menu_color menu_item <?php 
		if($page == 'evenements') {
			echo 'menu_item_selected';
		}
	?>" href="index.php?page=evenements" style="top:40px;">Ev&eacute;nements</a>


<a class="menu_color menu_item <?php 
		if($page == 'galerie') {
			echo 'menu_item_selected';
		}
	?>" href="index.php?page=galerie" style="top:60px;">Photos</a>


<a class="menu_color menu_item <?php 
		if($page == 'sponsor') {
			echo 'menu_item_selected';
		}
	?>" href="index.php?page=sponsor" style="top:80px;">Sponsoriser</a>


<a class="menu_color menu_item <?php 
		if($page == 'contact') {
			echo 'menu_item_selected';
		}
	?>" href="index.php?page=contact" style="top:100px;">Contact</a>

<a class="menu_color menu_item" href="admin.php" style="top:120px;">Administration</a>



<div id="sub_menu_club">

<a class="menu_color sub_menu_item" href="index.php?page=organisation" style="top:20px;">Organisation</a>


<a class="menu_color sub_menu_item" href="index.php?page=ping"
style="top:35px;">TT ou Ping ?</a>


<a class="menu_color sub_menu_item" href="index.php?page=reglements" style="top:50px;">R&egrave;glements</a>


<a class="menu_color sub_menu_item" href="index.php?page=membre" style="top:65px;">Devenir Membre</a>


<a class="menu_color sub_menu_item" href="index.php?page=entrainements" style="top:80px;">Entra&icirc;nements</a>


<a class="menu_color sub_menu_item" href="index.php?page=equipes" style="top:95px;">Equipes</a>


<a class="menu_color sub_menu_item" href="index.php?page=presse" style="top:110px;">Presse</a>


</div>

<script type="text/javascript">		
	$("#menu_item_club").hover(function(){
	  $("#sub_menu_club").css("display","block");
	  $("#menu_links").css("top","-240px");
	  },function(){
	  $("#sub_menu_club").css("display","none");
	  $("#menu_links").css("top","140px");
	});

	$("#sub_menu_club").hover(function(){
	  $("#sub_menu_club").css("display","block");
	  $("#menu_links").css("top","-240px");
	  },function(){
	  $("#sub_menu_club").css("display","none");
	  $("#menu_links").css("top","140px");
	});
</script>


<div id="menu_links">
        <div id="img_facebook"><a href="https://www.facebook.com/pages/CTT-Rolle/555744644476912" >
          <img src="res/facebook.jpg" />
        </a></div>
        <br/>
        <div id="img_avvf"><a href="http://www.avvf.ch" >
          <img src="res/avvf.gif" />
        </a></div>
        <br/>


	<div id="menu_partners"><h3>Partenaires</h3></div>

	<!-- Partners -->
</div>



