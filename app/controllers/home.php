<html>
<form method="post" action="">
    <button name="button" value="getall">GetAll</button>
    <hr>
</form>
<form method="post" action="">
    <label>ID</label>
    <input type="text" name="id">
    <button name="button" value="getone">GetOne</button>
    <hr>
</form>   
<form method="post" action="">
    <label>Title</label>
    <input type="text" name="title">
    <label>Description</label>
    <input type="text" name="description">
    <button name="button" value="insert">Insert</button>
    <hr>
</form>
<form method="post" action="">
    <label>ID</label>
    <input type="text" name="id">
    <label>Title</label>
    <input type="text" name="title">
    <label>Description</label>
    <input type="text" name="description">
    <button name="button" value="update">Update</button>
    <hr>
</form>
<form method="post" action="">
    <label>ID</label>
    <input type="text" name="id">
    <button name="button" value="delete">Delete</button>
</form>
</html>

<?php

use App\QueryBuilder;
$posts = new QueryBuilder;

if ($_POST) {
    switch($_POST['button']) {
        case 'getall':
            var_dump($posts->getAll('posts'));
            break;

        case 'getone':
            var_dump($posts->getOne('posts', $_POST['id']));
            break;

        case 'insert':
            $posts->insert('posts', [
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ]);
            break;

        case 'update':
            //var_dump($_POST['id']); die;
            $posts->update('posts', $_POST['id'], [
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ]);
            break;

        case 'delete':
            $posts->delete('posts', $_POST['id']);
            break;
    }
}
?>