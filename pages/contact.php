<p class="title">Contact</p>

<p class="text_paragraph">
Ce formulaire donne la possibilit&eacute; de contacter le club afin de poser n'importe quelle question. Celle-ci sera adress&eacute;e au comit&eacute; directeur du club.
Dans le cas o&ugrave; il n'est pas possible d'utiliser ce formulaire (probl&egrave;me de navigateur, ...) vous pouvez envoyer un mail &agrave; un des membres du comit&eacute; 
(leur adresse mail &eacute;tant disponible dans la section Pr&eacute;sentation du club).<br/><br/>
</p>

<div id="contact_form">
        <div id="contact_text">
			<div class="contact_grill">Membre du Comit&eacute;</div>
			<div class="contact_grill">Votre Nom:</div>
			<div class="contact_grill">Votre Adresse Email:</div>
			<div class="contact_grill">Votre No. de T&eacute;l&eacute;phone:</div>
			<div class="contact_grill">Message:</div>
        </div>

        <?php
                $msg_status = 0;
                $nom = "";
                $email = "";
                $msg = "";
                $comite = "";
		$tel="";

                if(isset($_POST['contact_form_nom']) 
								and isset($_POST['contact_form_email']) 
								and isset($_POST['contact_form_msg']) 
								and isset($_POST['contact_form_comite']) 
								and isset($_POST['contact_form_tel'])) 
								{

                        $nom = htmlspecialchars($_POST['contact_form_nom']);
                        $email = htmlspecialchars($_POST['contact_form_email']);
                        $msg = htmlspecialchars($_POST['contact_form_msg']);
                        $comite = htmlspecialchars($_POST['contact_form_comite']);
                        $tel = htmlspecialchars($_POST['contact_form_tel']);

                        if(strlen($nom) == 0) {
                                $msg_status = -1;
                        }
                        elseif((strlen($email) == 0) or (preg_match("/^.+@.+\..+$/", $email) == 0)) {
                                $msg_status = -2;
                        }
                        elseif(strlen($msg) == 0) {
                                $msg_status = -3;
                        }
                        elseif(strlen($comite) == 0) {
                                $msg_status = -4;
                        }
                        elseif((strlen($tel) == 0) or (preg_match("/^([0-9]| )+$/", $tel) == 0)) {
                                $msg_status = -5;
                        }
                        else {
                                $subject = '[CTT Rolle] Message de '.$nom;

																switch($comite)
																{
																case 'president':
                                	$to = 'odobert@gmail.com';
																	break;
 																case 'secretaire':
                                	$to = 'colette.goel@gmail.com';
																	break;
                  							case 'caissier':
                                	$to = 'janekolly@bluewin.ch';
																	break;
                  							case 'jeunesse':
                                	$to = 'colette.goel@gmail.com';
																	break;
                  							case 'site':
																default:
                                	$to = 'jonny.quarta@epfl.ch';
																}

                                
                                if(SendMail($mail_config, $email, $to, $subject, $msg) == true) {
                                        $msg_status = 1;
                                }
                                else {
                                        $msg_status = -10;
                                }
                        }
                }
        ?>

        <div id="contact_fields"><form action="index.php?page=contact" method="post">
                <div class="contact_grill"><select name="contact_form_comite">
                  <option value="president" <?php if($msg_status != 1 and $comite == "president"){ echo "selected"; } ?>>Pr&eacute;sident</option>
                  <option value="secretaire" <?php if($msg_status != 1 and $comite == "secretaire"){ echo "selected"; } ?>>Secr&eacute;taire</option>
                  <option value="caissier" <?php if($msg_status != 1 and $comite == "caissier"){ echo "selected"; } ?>>Tr&eacute;sori&egrave;re</option>
                  <option value="jeunesse" <?php if($msg_status != 1 and $comite == "jeunesse"){ echo "selected"; } ?>>Resp. Jeunesse</option>
                  <option value="site" <?php if($msg_status != 1 and $comite == "site"){ echo "selected"; } ?>>Resp. Site Web</option>
                </select></div>
                <div class="contact_grill"><input type="text" name="contact_form_nom" size="40" value="<?php if($msg_status != 1){ echo $nom; }?>" /></div>
                <div class="contact_grill"><input type="text" name="contact_form_email" size="40" value="<?php if($msg_status != 1){ echo $email; }?>" /></div>
				<div class="contact_grill"><input type="text" name="contact_form_tel" size="40" value="<?php if($msg_status != 1){ echo $tel; }?>" /></div>
                <div class="contact_grill"><textarea name="contact_form_msg" rows=10 cols=60 ><?php if($msg_status != 1){ echo $msg; }?></textarea></div>
                <div class="contact_grill_submit"><input type="submit" value="Envoyer"> </div>
                <?php
                        switch($msg_status)
		        						{ 
                        case 1:
                                echo '<p style="color:green;">Votre message a &eacute;t&eacute; correctement envoy&eacute;</p>';
                                break;
                        case -1:
                                echo '<p style="color:red;">Erreur: veuillez ins&eacute;rer un nom!</p>';
                                break;
                        case -2:
                                echo '<p style="color:red;">Erreur: veuillez ins&eacute;rer une adresse email valable!</p>';
                                break;
                        case -3:
                                echo '<p style="color:red;">Erreur: veuillez ins&eacute;rer un message!</p>';
                                break;
                        case -5:
                                echo '<p style="color:red;">Erreur: veuillez ins&eacute;rer un num&eacute;ro de t&eacute;l&eacute;phone!</p>';
                                break;
                        case -10:
                                echo '<p style="color:red;">Votre message n\'a pas pu &ecirc;tre correctement envoy&eacute;</p>';
                                break;
                        default:
                                break;
                        }
                ?>
        </form></div>
</div>


<div id="contact_map_h">
<h2>Carte</h2>
        <div id="contact_map">
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA86iqNkixNybQFahM0JmjeQYEfNKuIZmM"></script>

                <script type="text/javascript">
                        function initialize() {
                                var myLatlng = new google.maps.LatLng(46.458422, 6.340714);

                                var mapOptions = {
                                        center: myLatlng, 
                                        zoom: 18
                                };

                                var map = new google.maps.Map(document.getElementById("contact_map"), mapOptions);

                                var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        title: 'Locaux du CTT Rolle'
                                });

                        }


                        google.maps.event.addDomListener(window, 'load', initialize);
                </script>

        </div>
</div>



<div id="contact_info">
<h2>Locaux</h2>
Salle Comunale 1<br/>
1180 Rolle<br/><br/>
<h3>Adresse Postale</h3>
Case postale 19<br/>
1180 Rolle<br/><br/>
</div>


