<!doctype html>
<!-- calculatrice.php -->
<html>
	<head>
		<meta charset="utf-8" />
		<title> Une petite calculatrice </title>
		<style type="text/css"> 
		.calculatrice {
			background-color: blue; 
			color: white;
			font-weight: bold;  
			font-size: 16pt;	
			padding: 10px;
			text-align: center;
			border-radius: 15px;
			margin-top: 10px; 
			margin-bottom: 10px; 
		}
		.h1 {
			background-color: white; 
			color: grey;
			font-weight: bold;  
			font-size: 30pt;	
			padding: 10px;
			border-width:2px;
			border-style:solid;
			border-color:blue;
			text-align: center;
			border-radius: 15px;
			margin-top: 10px; 
			margin-bottom: 10px;
		}
		.p {
			background-color: #40A497; 
			color: white;
			font-weight: bold;
			text-align: center;
		}
		.erreur {
			color: red;
		}
		.nerreur {
			color: white;
		}
		
		</style>
	</head>
 <?php 

	function calculatrice($nb1, $nb2, $op)
{	
    if (is_numeric($nb1) && is_numeric($nb2))
    {
        switch($op)
        {
            case "+":
                $resultat=$nb1 + $nb2;
                break;
            case "-" :
                $resultat=$nb1 - $nb2;
                break;
            case "/" :
                $resultat=$nb1 / $nb2;
                break;
            case "*" :
                $resultat=$nb1 * $nb2;
                break ;
        }
        return $resultat;
    }
    else
    {
        return "Erreur : au moins un des nombres saisi n'est pas un nombre...";
    }
}
?>
	<body>	
		<h1 class="h1"> Calculatrice </h1>
		<p class="p"> Une petite calculatrice minimaliste pour pratiquer la programmation web ! 
		Vous ne pouvez faire qu une operation entre deux nombres. </p>
		<div class="calculatrice">
			 Entrez deux nombres et l'operation choisie : 
			<form name="nom" method="GET" action="calculatrice.php">
				<br />Nombre 1:  <input type="text" name="nombre1" placeholder="entrez un nombre" size="30" maxlength="20" /> <br /> <br />
				<select name="choix">
				<option value="-">-
				<option value="+" SELECTED>+
				<option value="*">*
				<option value="/">/
				</select> <br /> <br />
				Nombre 2:  <input type="text" name="nombre2" placeholder="entrez un nombre" size="30" maxlength="20" /> <br /> <br />
				<input type="submit" name="action" value="calculer"></input>
			</form>
				<?php 
				 
					  if (isset($_GET['action']))
                {
                    $res = calculatrice($_GET['nombre1'], $_GET['nombre2'], $_GET['choix']);
                    
                    /* pour mettre en rouge le message d'erreur */
                    if (strpos($res, "Erreur") === 0)
                    {
                        $pclass =  "class='erreur'";
                    }else {$pclass = "class='nerreur'";}
                    echo "<p $pclass>Le r??sultat de ". $_GET['nombre1']." ". $_GET['choix']." ". $_GET['nombre2']." est $res.</p>";
                }
				 
				?>
        </div>
         
			
		
		<p>
        Les param??tres transmis au serveur via le formulaire sont :<br />
            <?php
                foreach ($_GET as $nom => $valeur)
                {
                    echo "$nom = $valeur <br /> \n ";
                }
            ?>
        </p>
		</body>
</html>	

