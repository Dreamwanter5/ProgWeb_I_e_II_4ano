<?php
session_start();

if (!isset($_SESSION["id"])) {
    header('Location: login.html');
    exit();
}

require_once('../../../Daos/baseDao.php');
require_once('../../../Daos/notaDao.php');
require_once('../../../Daos/categoriaDao.php');
require_once('../../../Entidades/Usuario.php');

$categoriaDAO = new CategoriaDAO();
$categorias = $categoriaDAO->buscarPorUsuario($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Anotações - Garden Journal</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    
    <!-- Milkdown com editor completo -->
    <script src="https://cdn.jsdelivr.net/npm/@milkdown/core"></script>
    <script src="https://cdn.jsdelivr.net/npm/@milkdown/plugin-commonmark"></script>
    <script src="https://cdn.jsdelivr.net/npm/@milkdown/preset-gfm"></script>
    <script src="https://cdn.jsdelivr.net/npm/@milkdown/plugin-listener"></script>
    
    <style>
        .editor-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            height: 60vh;
        }
        
        #editor {
            height: 100%;
            padding: 15px;
            background-color: #fff;
            outline: none;
        }
        
        .editable-title {
            border: none;
            border-bottom: 2px solid #eee;
            font-size: 2rem;
            font-weight: bold;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }
        
        .editable-title:focus {
            border-color: #28a745;
            outline: none;
        }
        
        .tagify__tag {
            background: #e8f5e9;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <?php include('partialsmenu.php'); ?>

    <div class="container mt-4">
        <!-- Título editável -->
        <input type="text" 
               id="titulo" 
               class="editable-title" 
               value="Nova anotação"
               placeholder="Dê um título à sua anotação">
        
        <!-- Categorias -->
        <div class="mb-4">
            <label class="form-label">Categorias (pressione Enter para adicionar)</label>
            <input id="categorias" 
                   class="form-control" 
                   value="<?= htmlspecialchars(implode(',', array_column($categorias, 'nome'))) ?>">
        </div>
        
        <!-- Editor -->
        <div class="editor-container">
            <div id="editor"></div>
        </div>
        
        <!-- Feedback automático -->
        <div id="feedback" class="alert alert-info mt-3" style="display: none;">
            Salvando alterações...
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        // ========== CONFIGURAÇÃO DO EDITOR ==========
        let editorInstance;
        let lastSavedContent = '';
        let savingInProgress = false;
        
        // Inicialização do Milkdown
        const initEditor = async () => {
            const { createEditor } = await import('@milkdown/core');
            const { gfm } = await import('@milkdown/preset-gfm');
            const { listener } = await import('@milkdown/plugin-listener');
            
            editorInstance = await createEditor()
                .use(gfm)
                .use(listener)
                .create();
                
            // Foca automaticamente no editor
            setTimeout(() => {
                editorInstance.focus();
            }, 500);
        };
        
        // ========== CONFIGURAÇÃO DO TAGIFY ==========
        const tagify = new Tagify(document.getElementById('categorias'), {
            whitelist: <?= json_encode(array_column($categorias, 'nome')) ?>,
            dropdown: { 
                maxItems: 10,
                enabled: 1,
                highlightFirst: true
            },
            enforceWhitelist: false, // Permite novas tags
            editTags: true,
            originalInputValueFormat: values => values.map(item => item.value).join(',')
        });
        
        // ========== SALVAMENTO AUTOMÁTICO ==========
        let saveTimer;
        
        function saveNote() {
            if (savingInProgress) return;
            
            savingInProgress = true;
            document.getElementById('feedback').style.display = 'block';
            
            const titulo = document.getElementById('titulo').value;
            const categorias = tagify.value.map(tag => tag.value);
            const conteudo = editorInstance.getMarkdown();
            
            // Verifica se houve mudanças reais
            if (titulo + conteudo === lastSavedContent) {
                savingInProgress = false;
                document.getElementById('feedback').style.display = 'none';
                return;
            }
            
            fetch('../../../../Controllers/salvar-nota.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    titulo,
                    categorias,
                    conteudo
                })
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    lastSavedContent = titulo + conteudo;
                    document.getElementById('feedback').textContent = 'Alterações salvas com sucesso!';
                    
                    // Atualiza título da página
                    document.title = titulo + ' - Garden Journal';
                    
                    // Esconde o feedback após 2 segundos
                    setTimeout(() => {
                        document.getElementById('feedback').style.display = 'none';
                    }, 2000);
                } else {
                    document.getElementById('feedback').textContent = 'Erro: ' + result.message;
                }
            })
            .catch(error => {
                document.getElementById('feedback').textContent = 'Erro de rede: ' + error.message;
            })
            .finally(() => {
                savingInProgress = false;
            });
        }
        
        // ========== EVENT LISTENERS ==========
        document.getElementById('titulo').addEventListener('input', () => {
            clearTimeout(saveTimer);
            saveTimer = setTimeout(saveNote, 1000);
        });
        
        tagify.on('change', () => {
            clearTimeout(saveTimer);
            saveTimer = setTimeout(saveNote, 1000);
        });
        
        // Inicialização
        window.addEventListener('DOMContentLoaded', () => {
            initEditor().then(() => {
                // Monitora alterações no editor
                editorInstance.listener.on('markdown-updated', () => {
                    clearTimeout(saveTimer);
                    saveTimer = setTimeout(saveNote, 1000);
                });
            });
        });
    </script>
</body>
</html>