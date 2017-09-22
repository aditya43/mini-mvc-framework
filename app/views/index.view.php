<?php

use Adi\Core\App;

require 'partials/head.php';
?>

    <h1>Home Page</h1>
    <h1>Add New Task</h1>
    <form method="POST" action="<?=App::get('doc_root');?>tasks">
        <input type="text" name="desc" placeholder="Task description">
        <input type="submit">
    </form>
<?php require 'partials/footer.php';?>
