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
    <title>Dashboard - Sistema de Tarefas</title>
    
    <?php include_once 'dependencias.php'?>
    <script  ></script>

  </head>
  <body class="bg-light">
    <!-- Navbar -->
    <?php
    include_once 'cabecalho.php'
    ?>
    <!-- Conteúdo Principal -->
    <div v-scope="app" @vue:mounted="carregarTarefas" class="container mt-4">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary">
              <i class="bi bi-speedometer2 me-2"></i>Dashboard de Tarefas
            </h1>
            <a href="cadastro_tarefa.php" class="btn btn-primary">
              <i class="bi bi-plus-circle me-1"></i>Nova Tarefa
            </a>
          </div>

          <!-- Cards de Estatísticas -->
          <div class="row mb-4">
            <div class="col-md-3 mb-3">
              <div class="card border-primary">
                <div class="card-body text-center">
                  <i class="bi bi-list-task display-6 text-primary"></i>
                  <h4 class="card-title">5</h4>
                  <p class="card-text">Total de Tarefas</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card border-success">
                <div class="card-body text-center">
                  <i class="bi bi-check-circle display-6 text-success"></i>
                  <h4 class="card-title">2</h4>
                  <p class="card-text">Concluídas</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card border-warning">
                <div class="card-body text-center">
                  <i
                    class="bi bi-exclamation-circle display-6 text-warning"
                  ></i>
                  <h4 class="card-title">2</h4>
                  <p class="card-text">Pendentes</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card border-danger">
                <div class="card-body text-center">
                  <i class="bi bi-clock display-6 text-danger"></i>
                  <h4 class="card-title">1</h4>
                  <p class="card-text">Atrasadas</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Lista de Tarefas -->
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title mb-0">
                <i class="bi bi-list-task me-2"></i>Minhas Tarefas
              </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Tarefa</th>
                      <th>Tipo</th>
                      <th>Data Prevista</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="badge bg-success">Concluída</span>
                      </td>
                      <td>
                        <div class="fw-bold">Reunião com equipe</div>
                        <small class="text-muted">Projeto Alpha</small>
                      </td>
                      <td>Profissional</td>
                      <td>15/03/2024</td>
                      <td>
                        <div class="btn-group">
                          <a
                            href="editar_tarefa.html"
                            class="btn btn-sm btn-outline-primary"
                          >
                            <i class="bi bi-pencil"></i>
                          </a>
                          <button class="btn btn-sm btn-outline-success">
                            <i class="bi bi-check"></i>
                          </button>
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="badge bg-warning">Pendente</span>
                      </td>
                      <td>
                        <div class="fw-bold">Relatório mensal</div>
                        <small class="text-muted"
                          >Departamento Financeiro</small
                        >
                      </td>
                      <td>Profissional</td>
                      <td>20/03/2024</td>
                      <td>
                        <div class="btn-group">
                          <a
                            href="editar_tarefa.html"
                            class="btn btn-sm btn-outline-primary"
                          >
                            <i class="bi bi-pencil"></i>
                          </a>
                          <button class="btn btn-sm btn-outline-success">
                            <i class="bi bi-check"></i>
                          </button>
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="badge bg-danger">Atrasada</span>
                      </td>
                      <td>
                        <div class="fw-bold">Pagamento de contas</div>
                        <small class="text-muted">Casa</small>
                      </td>
                      <td>Pessoal</td>
                      <td>10/03/2024</td>
                      <td>
                        <div class="btn-group">
                          <a
                            href="editar_tarefa.html"
                            class="btn btn-sm btn-outline-primary"
                          >
                            <i class="bi bi-pencil"></i>
                          </a>
                          <button class="btn btn-sm btn-outline-success">
                            <i class="bi bi-check"></i>
                          </button>
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="badge bg-success">Concluída</span>
                      </td>
                      <td>
                        <div class="fw-bold">Compras do mês</div>
                        <small class="text-muted">Supermercado</small>
                      </td>
                      <td>Pessoal</td>
                      <td>05/03/2024</td>
                      <td>
                        <div class="btn-group">
                          <a
                            href="editar_tarefa.html"
                            class="btn btn-sm btn-outline-primary"
                          >
                            <i class="bi bi-pencil"></i>
                          </a>
                          <button class="btn btn-sm btn-outline-success">
                            <i class="bi bi-check"></i>
                          </button>
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="badge bg-warning">Pendente</span>
                      </td>
                      <td>
                        <div class="fw-bold">Estudar React.js</div>
                        <small class="text-muted">Curso de programação</small>
                      </td>
                      <td>Educacional</td>
                      <td>25/03/2024</td>
                      <td>
                        <div class="btn-group">
                          <a
                            href="editar_tarefa.html"
                            class="btn btn-sm btn-outline-primary"
                          >
                            <i class="bi bi-pencil"></i>
                          </a>
                          <button class="btn btn-sm btn-outline-success">
                            <i class="bi bi-check"></i>
                          </button>
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include_once 'rodape.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
