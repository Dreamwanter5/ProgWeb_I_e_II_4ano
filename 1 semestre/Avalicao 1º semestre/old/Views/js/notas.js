document.getElementById('addNoteBtn').addEventListener('click', function() {
    window.location.href = 'add_note.php'; // Redirect to add note page
});

document.getElementById('editNoteBtn').addEventListener('click', function() {
    window.location.href = 'edit_notes.php'; // Redirect to edit notes page
});

document.getElementById('removeNoteBtn').addEventListener('click', function() {
    window.location.href = 'remove_notes.php'; // Redirect to remove notes page
});

const notes = [
    { id: 1, title: 'Note 1', content: 'This is the first note.' },
    { id: 2, title: 'Note 2', content: 'This is the second note.' }
];

const notesContainer = document.getElementById('notesContainer');
notes.forEach(note => {
    const li = document.createElement('li');
    li.textContent = `${note.title}: ${note.content}`;
    notesContainer.appendChild(li);
});