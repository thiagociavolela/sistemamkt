<?php
/*
Autor: Thiago Ciavolela
Data: 18/10/2023
Descrição: Projeto OpenSource trabalhado emcima da EvolutionApi, para disparos em Massa.
*/

include "config.php";

if (isset($_POST['submit'])) {
    // Verifica se o arquivo foi enviado
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        // Abre o arquivo em modo de leitura
        $handle = fopen($_FILES['file']['tmp_name'], "r");

        // Verifica se o arquivo foi aberto com sucesso
        if ($handle !== FALSE) {

            // URL da API
            $url = $url_api_image;

            // Dados do cabeçalho (headers)
            $headers = array(
                "Content-Type: application/json",
                "apikey: " . $apiKey
            );

            // Recebendo o texto da mensagem via post
            $mensagem = $_POST['mensagem'];
            $imagem = $_POST['imagem'];

            // Loop para ler cada linha do arquivo CSV
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                // O número de telefone está na primeira coluna do CSV
                $phoneNumber = $data[0];

                // Dados do corpo da requisição (body)
                $data = array(
                  "number" => $phoneNumber,
                  "mediaMessage" => array(
                  "mediatype" => "image",
                  "caption" => $mensagem,
                  "media" => $imagem,
                    )
                );

                // Converte os dados em JSON
                $data_json = json_encode($data);

                // Inicializa a sessão cURL
                $ch = curl_init($url);

                // Define as opções da requisição
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                // Executa a requisição e obtém a resposta
                $response = curl_exec($ch);

                // Verifica por erros
                if (curl_errno($ch)) {
                    echo 'Erro na requisição cURL: ' . curl_error($ch);
                }

                // Add delay para enviar próxima mensagem
                sleep($delay);

                // Fecha a sessão cURL
                curl_close($ch);
            }
            echo "<script type='text/javascript'>alert('Mensagens enviadas com Sucesso!');";
            echo "window.location='enviar_msg_imagem.php';</script>";


            // Fecha o arquivo CSV
            fclose($handle);
        } else {
            echo "Erro ao abrir o arquivo CSV.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sistema - MKT</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .containerbox {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .emoji {
            font-size: 30px;
            position: relative;
            cursor: pointer;
            margin-left: 10px;
        }

        .emoji>span {
            padding: 10px;
            border: 1px solid transparent;
            transition: 100ms linear;
        }

        .emoji span:hover {
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #e7e7e7;
            box-shadow: 0 7px 14px 0 rgb(0 0 0 / 12%);
        }

        #emoji-picker {
            padding: 6px;
            font-size: 20px;
            z-index: 1;
            position: absolute;
            display: none;
            width: 189px;
            border-radius: 4px;
            top: 53px;
            right: 0;
            background: #fff;
            border: 1px solid #e7e7e7;
            box-shadow: 0 7px 14px 0 rgb(0 0 0 / 12%);
        }

        #emoji-picker span {
            cursor: pointer;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            padding-top: 4px;
        }

        #emoji-picker span:hover {
            background-color: #e7e7e7;
            border-radius: 4px;
        }

        .emoji-arrow {
            position: absolute;
            width: 0;
            height: 0;
            top: 0;
            right: 18px;
            box-sizing: border-box;
            border-color: transparent transparent #fff #fff;
            border-style: solid;
            border-width: 4px;
            transform-origin: 0 0 0;
            transform: rotate(135deg);
        }



        /******************************/

        .creator {
            position: fixed;
            right: 5px;
            top: 5px;
            font-size: 13px;
            font-family: sans-serif;
            text-decoration: none;
            color: #111;
        }

        .creator:hover {
            color: deeppink;
        }

        .creator i {
            font-size: 12px;
            color: #111;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
    </style>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include "menu.php"; ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Páginação (Exibindo Todos os Números Cadastrados) -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="container">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Importar /</span> Enviar Mensagem com Imagem em massa</h4>
                            <form class="form-horizontal" action="" method="post" id="formCadastro" enctype="multipart/form-data" name="cadastrar">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="center">
                                            <div class="containerbox">
                                                <div class="input-group" style="padding-bottom: 10px;">
                                                    <span class="input-group-text">Mensagem</span>
                                                    <textarea id="text-area" class="form-control" name="mensagem" aria-label="With textarea" placeholder="Digite a mensagem...."></textarea>
                                                </div>
                                                <div class="emoji">
                                                    <span>🙂</span>
                                                    <div id="emoji-picker">
                                                        <div class="emoji-arrow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">Url da Imagem</span>
                                            <input type="text" class="form-control" name="imagem" id="basic-url3" aria-describedby="basic-addon34">
                                        </div><br>
                                        <div class="input-group" style="padding-bottom: 10px;">

                                            <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04" name="submit">Carregar & Enviar</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- End Paginação -->

            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script>
        var emojiPicker = function() {
            var i = null;
            var index = null;
            var emojiCode = [
                128526, 128565, 129299, 129322, 128516, 128517, 128518, 128519, 128520,
                128521, 128522, 128523, 128524, 128525, 128526, 128527, 128528, 128529,
                128530, 128531, 128532, 128533, 128534, 128535, 128536, 128537, 128538,
                128539, 128540, 128741, 128542, 128543, 128544, 128545, 128546, 128547,
                128548, 128549, 129297, 129395, 128070, 128073, 128226, 128227
            ];

            for (index = 0; index <= emojiCode.length - 1; index++) {
                document.querySelector("#emoji-picker").innerHTML += "<span class='my-emoji'>" + "&#" + emojiCode[index] + "</span>";
            }

            $(document).on("click", ".my-emoji", function() {
                var textArea = $('#text-area');
                textArea.val(textArea.val() + $(this).text());
                $("#emoji-picker").hide();
                textArea.focus();
            });
        }

        emojiPicker();

        $(".emoji").click(function(e) {
            e.preventDefault();
            $("#emoji-picker").toggle();
        });
    </script>

    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="js/custom.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>