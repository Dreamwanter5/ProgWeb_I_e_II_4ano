document.addEventListener('DOMContentLoaded', function() {
    window.deleteNote = function(id) {
        if (confirm('Tem certeza que deseja deletar esta nota?')) {
            fetch('../public/delete_note.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + id
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) location.reload();
                else alert('Erro ao deletar');
            });
        }
    }
});