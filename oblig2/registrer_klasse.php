<meta charset="UTF-8">
<?php /* oblig2/registrer_klasse.php */
/*
/*Programmet lager et html-skjema for registrering av ny klasse i databasen
/*Programmet registrerer klassen når skjema er sendt inn
*/
?>

<h2>Registrer ny klasse</h2>
<form method="post" action="registrer_klasse.php">  
    <label for="klassekode">Klassekode:</label>
    <input type="text" id="klassekode" name="klassekode" required><br><br>
    
    <label for="klassenavn">Klassenavn:</label>
    <input type="text" id="klassenavn" name="klassenavn" required><br><br>
    
    <label for="studiumkode">Studiumkode:</label>
    <input type="text" id="studiumkode" name="studiumkode" required><br><br>
    
    <input type="submit" value="Registrer klasse">
</form>

<?php
if (isset($_POST["klassekode"]))
{ 
    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"]; 
    $studiumkode = $_POST["studiumkode"];

    if (!$klassekode || !$klassenavn || !$studiumkode)
    {
        print ("Alle felt m&aring; fylles ut");
    }
    else
    {
    include ('oblig2/db.php');

    $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES ('$klassekode', '$klassenavn', '$studiumkode');";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å registrere data i databasen");
    $antallRader = mysqli_num_rows($sqlResultat);
    
    if ($antallRader==0)
    {
        print ("Klassen er allerede registrert i databasen");
    }
    else 
    {
    $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES ('$klassekode', '$klassenavn', '$studiumkode');";
    Values('$klassekode', '$klassenavn', '$studiumkode');";
    mysqli_query($db, $sqlSetning) or die ("Ikke mulig å registrere data i databasen");
    print ("<h2>Følgende klasse er nå registrert:</h2>");
    print (F&oslash;lgende klasse er n&aring; registrert: <br> Klassekode: $klassekode <br> Klassenavn: $klassenavn <br> Studiumkode: $studiumkode <br>");
    }
    }
    }   
?>