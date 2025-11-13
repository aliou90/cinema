<?php 
//includes HTML Components with function
function html_partials($part){
   return include_once(__DIR__."..\html_comp_".$part.".php");
}


//Website infos
$sitename = "GESTION DE CINÉMA";


//Homepage infos 
$hometitle = "Accueil";


//Contacts 
$contatitle = "Contacts";

//Post infos 
$posttitle = "Publier";

//Connection vars 
$signintitle = "Se connecter";
$signuptitle = "S'inscrire";

//User info
$username = "Aliou";

//Var 
$date = getdate(); 

//includes HTML Components
$home = __DIR__."..\home.php";
$index = __DIR__."..\index.php";
$header = __DIR__."..\html_comp_header.php";
$footer = __DIR__."..\html_comp_footer.php";
$sidebars =__DIR__."..\html_comp_side-bar.php";
$notfound = __DIR__."..\p404.php";
$posts_list = __DIR__."..\posts_list.php";
$html_comp_welcome = __DIR__."..\html_comp_welcome.php";
$comments_list = __DIR__."..\comments_list.php";
$comments_form = __DIR__."..\comments_form.php";
$cherch_form=__DIR__."..\html_comp_cherch.php";
$homepage = __DIR__."..\home.php";
$tm_logo = __DIR__."..\logo_svg.php";
$signup_check = __DIR__."..\signup_check.php";
$signup_reg = __DIR__."..\signup_reg.php";
$signup_info= __DIR__."..\signup_info.php";
$signup_activ = __DIR__."..\signup_activ.php";
$signup_papercut = __DIR__."..\signup_papercut.php";


/*-----------------Bouton avec fonction--------------------*/
$tm_button_primary = "tm_button_primary.php";
/*---------------------Appel de la fonction pour bouton----------
<?php include_once($tm_button_primary);
                tm_button_primary("Envoyer")
?>

-------------------------------------------------------*/

//ALERT VIEW VARS 
$alert_post_success = __DIR__."..\alert_post_success.php";
$alert_post_confirm = __DIR__."..\alert_post_confirm.php";
$alert_post_deleted = __DIR__."..\alert_post_deleted.php";
$alert_post_updated = __DIR__."..\alert_post_updated.php";
$post_view_link = __DIR__."..\post_view.php";




?>