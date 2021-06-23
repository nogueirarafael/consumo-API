<?php
$heroi = $_POST["nome"] ?? "///";
$url = "https://superheroapi.com/api/10222733962276147/search/{$heroi}";
$buscaheroi = json_decode(file_get_contents($url));
$msg="";
$qtdbusca = 0;
$divmais ='style="display:none;"' ;
$divbusca = ""; 

if(isset($_POST['btmais'])){
    $IDmais = $_POST["mais"] ?? "///";
    $divbusca = 'style="display:none;"' ;
    $divmais = ""; 
    idmais();       
}

if(isset($_POST['botao'])){
    if ($heroi === "" or $heroi === null){
        $msg = "Digite um nome!";
        $feedback = "invalid-feedback";
    } 
    else if ($buscaheroi->response === "success"){
        $msg = "Foram encontrados esses resultados para '".$heroi."':";
        $feedback = "valid-feedback";
        buscarheroi($buscaheroi);
        $divbusca = "";
        $divmais = 'style="display:none;"' ; 
} else { $msg = "O nome '".$heroi."' não possui dados";
}}

if(isset($_POST['btsortear'])){
    $msg = "Esse foi o resultado da busca aleatória:";
    sortearID();
}

load();

function load(){
    global $heroi, $IDmais;    
    if($heroi == "///" and $IDmais == ""){        
        sortearID();
}}

 
function buscarheroi($buscaheroi){
    global $arraybusca, $qtdbusca;
if($buscaheroi->response === "success"){    
    $resultado = $buscaheroi->results;
}
$qtdbusca = count($resultado);   
$i=0;
foreach ($resultado as $key => $value){  
    $aux = (array)$value->biography;  
         $arraybusca[$i] = ["id" => $value->id,
                            "nome" => $value->name,                             
                            "realname" => $aux['full-name'],
                            "tipo" => $value->biography->alignment,
                            "imagem" => $value->image->url
                       ];
  $i++;     
}}



function sortearID(){
global $arraysort, $qtdbusca, $arraybusca;
$i=0;
for ($k=0;$k<8;$k++){
    $i= rand(1,731);
    $urlid = "https://superheroapi.com/api/10222733962276147/{$i}";
    $buscarID = json_decode(file_get_contents($urlid));
    if($buscarID->response = "success"){ 
    $aux = (array)$buscarID->biography;    
    $arraysort[($k)] = ["id" => $buscarID->id,
                        "nome" => $buscarID->name,                           
                        "realname" => $aux['full-name'],
                        "tipo" => $buscarID->biography->alignment,
                        "imagem" => $buscarID->image->url
];
    for ($teste=0; $teste<$k;$teste++){
        if($k != 0){
            if( $arraysort[$k]["id"] == $arraysort[$teste]["id"]){
                $k--;
            }
        }
    }    
}}
$arraybusca = $arraysort;
$qtdbusca = count($arraybusca);
}


function idmais(){
global $IDmais, $arraymais;
$aux =[];
$urlid = "https://superheroapi.com/api/10222733962276147/{$IDmais}";
    $buscarID = json_decode(file_get_contents($urlid));
    if($buscarID->response = "success"){ 
    $aux[0] = (array)$buscarID->biography;
    $aux[1] = (array)$buscarID->appearance; 
    $aux[2] = (array)$buscarID->connections;     
    $arraymais = ["id" => $buscarID->id,
                          "nome" => $buscarID->name, 
                          "status" => ["inteligencia" => $buscarID->powerstats->intelligence,
                                    "forca" => $buscarID->powerstats->strength,   
                                    "velocidade" => $buscarID->powerstats->speed,
                                    "durabilidade" => $buscarID->powerstats->durability,
                                    "poder" => $buscarID->powerstats->power,
                                    "combate" => $buscarID->powerstats->combat
                        ],
                      "realname" => $aux[0]['full-name'],
                      "nascimento" => $aux[0]['place-of-birth'],
                      "firstap" => $aux[0]['first-appearance'],
                      "publicado" => $aux[0]['publisher'],
                      "genero" => $buscarID->appearance->gender,
                      "raca" => $buscarID->appearance->race,
                      "altura" => $aux[1]['height'][1],
                      "peso" => $aux[1]['weight'][1],
                      "olhos"=> $aux[1]['eye-color'],
                      "cabelo" => $aux[1]['hair-color'],
                      "profissao" => $buscarID->work->occupation,
                      "local" => $buscarID->work->base,
                      "grupo" => $aux[2]['group-affiliation'],
                      "parentes" => $aux[2]['relatives'],                     
                      "tipo" => $buscarID->biography->alignment,
                      "imagem" => $buscarID->image->url
];
}}