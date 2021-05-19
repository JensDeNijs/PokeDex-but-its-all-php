<?php
include 'includes/autoloader.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pokeName2 = "";
$input = 1;
if (isset($_GET["inputPoke"])) {
    $input = $_GET["inputPoke"];
}

//First API
$url = 'https://pokeapi.co/api/v2/pokemon/' . $input;
$json = apiData($url);

//Class Pokemon
$pokemon1 = new Pokemon(
    $json["name"],
    $json["id"],
    $json["sprites"]["front_default"],
    $json["moves"]["0"]["move"]["name"],
    $json["moves"]["1"]["move"]["name"],
    $json["moves"]["2"]["move"]["name"],
    $json["moves"]["3"]["move"]["name"]
);

//Second API
$url2 = 'https://pokeapi.co/api/v2/pokemon-species/' . $input;
$json2 = apiData($url2);

if ($json2["evolves_from_species"]) {

    $pokeName2 = $json2["evolves_from_species"]["name"];

    $url3 = 'https://pokeapi.co/api/v2/pokemon/' . $pokeName2;

    //Third API
    $json3 = apiData($url3);

    //Second Pokemon
    $pokemon2 = new Pokemon(
        $json3["name"],
        $json3["id"],
        $json3["sprites"]["front_default"],
        $json3["moves"]["0"]["move"]["name"],
        $json3["moves"]["1"]["move"]["name"],
        $json3["moves"]["2"]["move"]["name"],
        $json3["moves"]["3"]["move"]["name"]
    );
    $pokeName2 = "Evolved from: <br>" . $pokemon2->getName();
    $pokePic2 = $pokemon2->getPic();

} else {
    $pokename2 = "";
    $pokePic2 = "https://seeklogo.com/images/P/pokeball-logo-DC23868CA1-seeklogo.com.png";
}

function apiData($url)
{
    $jsonData = file_get_contents($url);
    return json_decode($jsonData, true);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pokedex php</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<form action="previous versions/index3.php" method="get">
    <p>PokéMon Name/ID:<input type="text" name="inputPoke" value=""></p>
    <input type="submit">
</form>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-5 bg-red p-5 shadow-lg border border-dark rounded-left">
            <div class="col-11 bg-dred px-5 pt-5 shadow-lg rounded-lg">
                <div class=" bg-blue py-3 border border-dark shadow-lg customsize rounded-circle">
                    <p></p>

                </div>

                <div class="row justify-content-center ">
                    <div class="row bg-dblue my-5 p-3 shadow-lg border border-dark rounded-lg">
                        <div class="col-12 bg-blue p-3 shadow-lg border border-dark  text-center">
                            <div class="pokesize">
                                <p><?php echo $pokemon1->getName() ?></p>
                            </div>
                            <div class="pokesize">
                                <img src="<?php echo $pokemon1->getPic() ?>"
                                     alt="PokemonPic" id="pokePicture" class="pokePicture">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-5 bg-red p-5 shadow-lg border border-dark rounded-right">
            <div class="row justify-content-center ">
                <div class="col-12  bg-dark my-5 p-2 shadow-lg border border-dark rounded-lg">
                    <div class="col-12 bg-black p-1 shadow-lg   text-warning ">
                        <div class="row justify-content-center ">
                            <div class="col-12">
                                <p>#<?php echo $pokemon1->getId() ?> <?php echo $pokemon1->getName() ?></p>
                            </div>
                        </div>
                        <div class="row justify-content-center textsmoll">
                            <div class="col-6">
                                <?php echo $pokemon1->getMove1() ?>
                            </div>
                            <div class="col-6">
                                <?php echo $pokemon1->getMove2() ?>
                            </div>
                        </div>
                        <div class="row justify-content-center textsmoll">
                            <div class="col-6">
                                <?php echo $pokemon1->getMove3() ?>
                            </div>
                            <div class="col-6">
                                <?php echo $pokemon1->getMove4() ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="pokesize">
                    <p><?php echo $pokeName2 ?></p>
                </div>
                <div class="pokesize">
                    <img alt="pokePic" id="pokePictureEvolve" class="pokePicture" src="<?php echo $pokePic2 ?>">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
