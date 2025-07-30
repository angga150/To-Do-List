<ul class="list-group">
    <?php foreach( $data['task'] as $task ) :  ?>
        <li class="list-group-item">
            Title = <?= $task['title']; ?>
        </li>
        <li class="list-group-item">
             Description = <?= $task['description']; ?>
        </li>
        <li class="list-group-item">
            Priority = <?= $task['priority']; ?>
        </li>
        <br>
    <?php endforeach; ?>
</ul>


<form action="<?=BASEURL;?>home/tambah" method="post">
    Add Task
    <br>
    <input type="text" name="title" id="title">
    <br>
    <input type="text" name="description" id="description">
    <br>
    <input type="checkbox" name="priority" id="priority" value="red">
    <input type="checkbox" name="priority" id="priority" value="green">
    <input type="checkbox" name="priority" id="priority" value="blue">
    <br>    
    <button type="submit">add Task</button>
</form>
