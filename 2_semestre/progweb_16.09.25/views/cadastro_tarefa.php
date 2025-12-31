<?php
session_start();
if (!isset($_SESSION['id'])){
  header("location: login_usuario.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro - Sistema de Tarefas</title>
    <!-- Bootstrap e JS inclusos -->
    <?php include_once 'dependencias.php' ?>

    <script src="js/cadastro_tarefa"></script>
  </head>
  <body class="bg-light">
    <!-- Navbar -->
    <?php include_once 'cabecalho.php'?>

    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title mb-0">
                <i class="bi bi-plus-circle me-2"></i>Cadastrar Nova Tarefa
              </h5>
            </div>
            <div class="card-body">
              <!-- INICIO DO FORM -->
              <form v-scope="FormApp" @vue.mounted="carregarTipoTarefa" @submit.prevent="cadastrarTarefa">
                <div class="mb-3">
                  <label for="nomeTarefa" class="form-label"
                    >Nome da Tarefa <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="nomeTarefa"
                    placeholder="Digite o nome da tarefa"
                    v-model="formData.nome"
                    required
                  />
                </div>
<!-- alterar as formdatas ainda -->
                <div class="mb-3">
                  <label for="tipoTarefa" class="form-label"
                    >Tipo de Tarefa <span class="text-danger">*</span></label
                  >
                  <select class="form-select"
                   id="tipoTarefa" 
                   required
                   v-scope="formData.tipo">
                    <option value="" selected disabled>
                      Selecione o tipo de tarefa
                    </option>
                    <option v-for="tipo in tiposTarefa" :value="tipo.id">{{tipo.nome}}</option>
                    <option value="pessoal">Pessoal</option>
                    <option value="profissional">Profissional</option>
                    <option value="educacional">Educacional</option>
                    <option value="saude">Saúde</option>
                    <option value="casa">Casa</option>
                    <option value="outro">Outro</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="dataPrevista" class="form-label"
                    >Data Prevista de Finalização
                    <span class="text-danger">*</span></label
                  >
                  <input
                    type="date"
                    class="form-control"
                    id="dataPrevista"
                    required
                    v-scope="formData.dataPrevista"
                  />
                </div>

                <div class="mb-3">
                  <label for="descricao" class="form-label"
                    >Descrição da Tarefa</label
                  >
                  <textarea
                    class="form-control"
                    id="descricao"
                    rows="3"
                    placeholder="Descreva detalhes sobre a tarefa"
                    v-scope="formData.descricao"
                  ></textarea>
                </div>

                <div class="mb-3">
                  <label for="imagemAjuda" class="form-label"
                    >Imagem de Ajuda (Opcional)</label
                  >
                  <input
                    type="file"
                    class="form-control"
                    id="imagemAjuda"
                    accept="image/*"
                    @change="uploadImagem"
                    />
                  <div class="form-text">
                    Adicione uma imagem que ajude na execução da tarefa
                  </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="index.html" class="btn btn-secondary me-md-2">
                    <i class="bi bi-arrow-left me-1"></i>Voltar
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>Cadastrar Tarefa
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light mt-5 py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5>Sistema de Tarefas</h5>
            <p class="mb-0">
              Organize suas tarefas de forma simples e eficiente
            </p>
          </div>
          <div class="col-md-6 text-md-end">
            <p class="mb-0">
              &copy; Sistema de Tarefas. Todos os direitos reservados.
            </p>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
