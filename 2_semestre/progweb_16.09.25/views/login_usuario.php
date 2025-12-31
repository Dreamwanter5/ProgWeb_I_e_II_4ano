<!DOCTYPE html>
<html lang="en"data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
    <?php include_once 'dependencias.php'?>  
    <script src="js/validar_usuario.js" defer></script>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary" v-scope="FormApp">
    <!-- Coisas que preciso fazer para o login usuário:
     1. Implementar a tela de login do usuário do bootstrap -->
        <main class="w-100 m-auto form-container">
        
            <form @submit.prevent="autenticar">
                <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="icone-bootstrap" class="mb-4" height="57" width="72">
                <h1 class="h3 mb-3 fw-normal">Insira suas informações</h1>
                <!-- Email -->
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput formEmail" placeholder="seuemail@lobotomia.com"
                        v-model="formData.email"
                        @blur="validarEmail"
                        :class="{'is-invalid': errors.email}" />
                    <label for="floatingInput">E-mail</label>
                    <div class="invalid-feedback">{{errors.email}}</div>
                </div>
                <!-- Senha -->
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput formSenha" placeholder="senha"
                        v-model="formData.senha"
                        @blur="validarSenha"
                        :class="{'is-invalid': errors.senha}" />
                    <label for="floatingInput">Senha</label>
                    <div class="invalid-feedback">{{errors.senha}}</div>
                </div>
                <!-- Lembre-se de mim -->
                <div class="form-check text-start my-3">
                    <input type="checkbox" class="form-check-input" id="flexCheckDefault formRemember">
                    <label class="form-check-label" for="flexCheckDefault">Lembre-se de mim</label>
                </div>
                <!-- Botão -->
                 <button class="btn btn-primary w-100 py-2" type="submit">Enviar</button>
                 <p class="text-body-secondary mt-5 mb-13">Progweb II - 2025</p>
            </form>
            <p>Não possui uma conta? <a href="cadastrar_usuario.html">registrar-se</a></p>
        </main>

     <!-- 2. Com sucesso ligar o javascript com o front-end, fazer com que o javascript consiga interpretar os dados inseridos no HTML
     3. Comparar as varíaveis no JS com o banco de dados e Efetuar um login
     4. Exibir mensagens de alerta para isso.
     5. no máximo, trazer o código com erros para a aula seguinte --> 
    
     <!-- Fim do import do bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>