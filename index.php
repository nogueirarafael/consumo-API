<?php include("herois.php"); ?>

<html>

<head>
    <title>Tarefa 06 - Rafael Nogueira</title>
    <link rel="icon" href="css/imagens/logo.png">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
    <main style="width:1250px;" class="mx-auto text-white">
        <div class="container">
            <div class="card border-danger border-2 mt-2 conteudo">
                <nav class="navbar">
                    <div class="container justify-content-center">
                        <a class="navbar-brand row" href="index.php">
                            <img class="col-auto" src="css/imagens/logo2.png" alt="" width="80px" height="70px">
                            <p class="h1 col-auto text-white align-self-center">SUPER HERO!</p>
                            <img class="col-auto" src="css/imagens/logo3.png" alt="" width="80px" height="70px">
                        </a>
                    </div>
                </nav>
            </div>
            <div class="card border-danger border-2 mt-1 mb-5 conteudo pb-3">
                <div class="card-header border-danger border-2 text-danger">
                    <h1 class="col-auto h3 text-white text-center">Descubra seus Super-Heróis favoritos!</h1>
                </div>
                <div class="card-body">
                    <form class="needs-validation" name="formheroi" method="post" action="index.php" novalidate>
                        <div class="form-group row">
                            <div class="row justify-content-center">
                                <label for="nomebusca" class="col-form-label col-2 mx-2">
                                    <h3 class="text-white">Buscar Herói:</h3>
                                </label>
                                <div class="col-form-label col-auto">
                                    <input type="text" class="form-control" name="nome" id="buscanome">                                    
                                </div>
                                <div class="col-form-label col-auto">
                                    <input type="submit" name="botao" class="btn btn-danger" value="Buscar">
                                </div>
                                <div class="col-form-label col-auto">
                                    <input type="submit" name="btsortear" class="btn btn-warning" value="Sortear">
                                </div>                                
                            </div>
                    </form>
                    <div <?php echo $divbusca;?> class="my-5 row justify-content-center m-auto">
                        <h4 class="text-center text-white mb-2 col-12"><?=$msg?></h4>
                        <?php for($c=0;$c<$qtdbusca;$c++){?>
                        <div class="col-auto pt-5">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front rounded-3">
                                        <img src="<?php echo $arraybusca[$c]["imagem"] ?>"
                                            class="rounded-3 border border-5 <?php $sort = rand(0,3); if($sort==0){echo " border-warning";}if($sort==1){echo " border-danger";}if($sort==2){echo " border-success";}if($sort==3){echo " border-primary";}?>"
                                            alt="Imagem do herói" style="width:250px;height:300px;">
                                    </div>
                                    <div class="flip-card-back rounded-3">
                                        <h3 class="h3 mt-5 mb-4"><?php echo $arraybusca[$c]["nome"]; ?></h3>
                                        <p>Nome verdadeiro: <br><?php echo $arraybusca[$c]["realname"]; ?></p>
                                        <p>Categoria: <?php if($arraybusca[$c]["tipo"] == "good"){
                                            echo "Herói";} else {echo "Vilão";} ?></p>

                                        <form action="index.php" method="post">
                                            <input type="hidden" name="mais"
                                                value="<?php echo $arraybusca[$c]["id"];?>">
                                            <input type="submit" name="btmais"
                                                class="btn btn-warning position-absolute bottom-0 end-10 mb-3"
                                                value="Saiba mais...">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>


                    <div class="card-body border border-5 m-5 border-danger" <?php echo $divmais;?>>
                        <h2 class="h1 text-center"><?php echo $arraymais["nome"]?></h2>

                        <div class="row justify-content-center align-items-center" style="height: 400px;">
                            <div class="col-auto border border-3 border-primary mx-2" style="height: 350px;">
                                <img src="<?php echo $arraymais["imagem"] ?>"
                                    class="rounded-3 border border-3 border-warning mt-4" alt="Imagem do herói"
                                    style="width:250px;height:300px;">
                            </div>
                            <div class="col border border-3 border-primary mx-2" style="height: 350px;">
                                <h3 class="h3 text-center mt-4 border p-1 mb-3">Atributos</h3>

                                <div class="row">
                                    <div class="col-2">
                                        <p>Inteligência:</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                role="progressbar"
                                                style="width: <?php echo $arraymais["status"]["inteligencia"]; ?>%"
                                                aria-valuenow="<?php echo $arraymais["status"]["inteligencia"]; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $arraymais["status"]["inteligencia"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <p>Força:</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated"
                                                role="progressbar"
                                                style="width: <?php echo $arraymais["status"]["forca"]; ?>%"
                                                aria-valuenow="<?php echo $arraymais["status"]["forca"]; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $arraymais["status"]["forca"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <p>Velocidade:</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                                role="progressbar"
                                                style="width: <?php echo $arraymais["status"]["velocidade"]; ?>%"
                                                aria-valuenow="<?php echo $arraymais["status"]["velocidade"]; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $arraymais["status"]["velocidade"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <p>Durabilidade:</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated"
                                                role="progressbar"
                                                style="width: <?php echo $arraymais["status"]["durabilidade"]; ?>%"
                                                aria-valuenow="<?php echo $arraymais["status"]["durabilidade"]; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $arraymais["status"]["durabilidade"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <p>Poder:</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
                                                role="progressbar"
                                                style="width: <?php echo $arraymais["status"]["poder"]; ?>%"
                                                aria-valuenow="<?php echo $arraymais["status"]["poder"]; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $arraymais["status"]["poder"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <p>Combate:</p>
                                    </div>
                                    <div class="col">
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-dark progress-bar-animated"
                                                role="progressbar"
                                                style="width: <?php echo $arraymais["status"]["combate"]; ?>%"
                                                aria-valuenow="<?php echo $arraymais["status"]["combate"]; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $arraymais["status"]["combate"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center mb-4" style="height: 365px;">
                            <div class="col-5 border border-3 px-4 border-primary mx-2" style="height: 365px;">
                                <h3 class="h3 text-center my-4 border p-1">Biografia</h3>
                                <p class="fs-6">Nome verdadeiro: <?php echo $arraymais["realname"] ?></p>
                                <p class="fs-6">Local de nascimento: <?php echo $arraymais["nascimento"] ?></p>
                                <p class="fs-6">Primeira aparição: <?php echo $arraymais["firstap"] ?></p>
                                <p class="fs-6">Editora: <?php echo $arraymais["publicado"] ?></p>
                                <p class="fs-6">Tipo: <?php if($arraymais["tipo"] == "good"){
                                            echo "Herói";} else {echo "Vilão";} ?></p>
                            </div>
                            <div class="col border border-3 mx-2 border-primary mx-2" style="height: 365px;">
                                <h3 class="h3 text-center my-4 border p-1">Aparência</h3>
                                <p class="fs-6">Gênero: <?php echo $arraymais["genero"] ?></p>
                                <p class="fs-6">Raça: <?php echo $arraymais["raca"] ?></p>
                                <p class="fs-6">Altura: <?php echo $arraymais["altura"] ?></p>
                                <p class="fs-6">Peso: <?php echo $arraymais["peso"] ?></p>
                                <p class="fs-6">Cor dos olhos: <?php echo $arraymais["olhos"] ?></p>
                                <p class="fs-6">Cor dos cabelos: <?php echo $arraymais["cabelo"] ?></p>
                            </div>
                            <div class="col border border-3 border-primary mx-2" style="height: 365px;">
                                <h3 class="h3 text-center my-4 border p-1">Trabalho</h3>
                                <p class="fs-6">Profissão: <?php echo $arraymais["profissao"] ?></p>
                                <p class="fs-6">Local: <?php echo $arraymais["local"] ?></p>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center mb-5">
                            <div class="col border border-3 px-4 border-primary mx-2">
                                <h3 class="h3 text-center my-4 border p-1">Conexões</h3>
                                <div class="col border border-3 mb-5 p-4 border-warning mx-2">
                                    <h3 class="h4 mb-3">Grupo pertencente:</h3>
                                    <p class="fs-6"><?php echo $arraymais["grupo"] ?></p>
                                </div>
                                <div class="col border border-3 mb-5 p-4 border-warning mx-2">
                                    <h3 class="h4 mb-3">Família:</h3>
                                    <p class="fs-6"><?php echo $arraymais["parentes"] ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
    </main>
    <script>
    </script>
</body>

</html>