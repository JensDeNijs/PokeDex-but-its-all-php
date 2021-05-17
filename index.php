<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pokedex php</title>
</head>
<body>
<form action="index.php" method="get">
    <p>PokéMon Name/ID:<input type="text" name="inputPoke" value=""></p>
    <input type="submit">
</form>
url : <?php echo $_GET["inputPoke"]?>
</body>
</html>


<?php


$ch = curl_init();

$url = "https://pokeapi.co/api/v2/pokemon/2";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
    echo "";
} else {
    $decoded = json_decode($resp, true);
    $pokeName = $decoded["name"];
    $pokeID = $decoded["id"];
    $pokePic = $decoded["sprites"]["front_default"];
    $pokeMove1 = $decoded["moves"]["0"]["move"]["name"];
    $pokeMove2 = $decoded["moves"]["1"]["move"]["name"];
    $pokeMove3 = $decoded["moves"]["2"]["move"]["name"];
    $pokeMove4 = $decoded["moves"]["3"]["move"]["name"];


    print_r($pokeName);
    echo "<br>";
    print_r($pokeID);
    echo "<br>";
    print_r($pokePic);
    echo "<br>";
    print_r($pokeMove1);
    echo "<br>";
    print_r($pokeMove2);
    echo "<br>";
    print_r($pokeMove3);
    echo "<br>";
    print_r($pokeMove4);

}

curl_close($ch);

?>