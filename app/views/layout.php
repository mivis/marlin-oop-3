<html>
  <head>
    <title><?=$this->e($title)?></title>
  </head>
  <body>
    <a href="/home">Home</a>
    
    <?=$this->section('content')?>

    <form method="post" action="actions">
        <button name="button" value="getall">GetAll</button>
        <hr>
    </form>
    <form method="post" action="actions">
        <label>ID</label>
        <input type="text" name="id">
        <button name="button" value="getone">GetOne</button>
        <hr>
    </form>   
    <form method="post" action="actions">
        <label>Title</label>
        <input type="text" name="title">
        <label>Description</label>
        <input type="text" name="description">
        <button name="button" value="insert">Insert</button>
        <hr>
    </form>
    <form method="post" action="actions">
        <label>ID</label>
        <input type="text" name="id">
        <label>Title</label>
        <input type="text" name="title">
        <label>Description</label>
        <input type="text" name="description">
        <button name="button" value="update">Update</button>
        <hr>
    </form>
    <form method="post" action="actions">
        <label>ID</label>
        <input type="text" name="id">
        <button name="button" value="delete">Delete</button>
    </form>

  </body>
</html>