<h3>Edit Task</h3>
<form action="<?= BASEURL ?>home/update" method="POST">
    <input type="hidden" name="id" value="<?= $data['editTask']['id']; ?>">
    
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= $data['editTask']['title']; ?>" required><br><br>
    
    <label>Description:</label><br>
    <textarea name="description" required><?= $data['editTask']['description']; ?></textarea><br><br>
    
    <label>Priority:</label><br>
    <input type="text" name="priority" value="<?= $data['editTask']['priority']; ?>" required><br><br>
    
    <button type="submit">Simpan Perubahan</button>
</form>
