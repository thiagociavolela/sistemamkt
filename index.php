<?php
/*
Autor: Thiago Ciavolela
Data: 18/10/2023
Descrição: Projeto OpenSource trabalhado emcima da EvolutionApi, para disparos em Massa.
*/
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
    
    <style>
      div.img {
        margin: 5px;
        float: left;
        width: 180px;

      }


      div.img img {
        width: 100%;
        height: 180px;
        border-radius: 12px;
      }

      div.desc {
        padding: 15px;
        text-align: center;
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
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                      <div class="card-body">
                          <h5 class="card-title text-primary"> Bem Vindo ao Sistema MKT 🎉</h5>
                          <p class="mb-4">
                            Sistema <span class="fw-bold">MKT</span> é um disparador de mensagens em massa para <span class="fw-bold">WhatsApp</span> e foi desenvolvido visando sempre ajudar a comunidade, o projeto é <span class="fw-bold">OpenSource</span>, e é trabalhado emcima da <span class="fw-bold"><a href="https://github.com/EvolutionAPI/evolution-api" target="_blank">EvolutionApi</a></span> e você é livre para modificar e usar como quiser, 
                            tentaremos mante-lo sempre atualizado e funcional.<br><br>
                            </p><h5 class="card-title text-primary">Como Configurar?</h5>
                            Para configurar você deve editar o arquivo <span class="fw-bold">config.php</span>, e alterar as <span class="fw-bold">URL</span> de conexão correspondentes a instalação da sua <a href="https://github.com/EvolutionAPI/evolution-api" target="_blank">EvolutionApi</a>.<br><br>
                            <span class="fw-bold">Apoie o Projeto, Faça uma doação via Pix.</span><br>
                            Fale Conosco: <span class="fw-bold">(11)91708-0051</span><br>
                            <img src="qrcode_pix.png" width="200px" height="200px">
                          <p></p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <p style="text-align: center;">Desenvolvido por: <a href="http://localhost/evolution/#">QiTecnologia Soluções Digitais</a></p>
                </div>
              </div>
              <!--Adicionar CARD aqui-->
            </div>
            <!-- / Content -->
            

            <div class="content-backdrop fade">
              
            </div>
          </div>
          <!-- Content wrapper -->

                </div>
              </div>
            </div>
          </div>
          

          <!-- Core JS -->
          <!-- build:js assets/vendor/js/core.js -->
          <script src="assets/vendor/libs/jquery/jquery.js"></script>
          <script src="assets/vendor/libs/popper/popper.js"></script>
          <script src="assets/vendor/js/bootstrap.js"></script>
          <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

          <script src="js/custom1.js"></script>

          <script src="assets/vendor/js/menu.js"></script>
          <!-- endbuild -->

          <!-- Vendors JS -->

          <!-- Main JS -->
          <script src="assets/js/main.js"></script>

          <!-- Page JS -->

          <!-- Place this tag in your head or just before your close body tag. -->
          <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>

  </html>