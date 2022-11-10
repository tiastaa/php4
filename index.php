<?php

include 'DBConnect.php';

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$competitorsRepository = new Repository($dbh);

if (!isset($_SESSION)) {
    session_start();
}



$actionToDo = $_POST['action'];

if ($actionToDo == 'add') {
    if (Competitor::validationDataCompetitors($_POST)) {

        $competitorsRepository->createCompetitor($_POST);
    }
} elseif ($actionToDo == 'edit') {
    if (Competitor::validationDataCompetitors($_POST)) {

        $competitorsRepository->updateCompetitor($_POST);
    }
} elseif ($actionToDo == 'delete') {
    $competitorsRepository->deleteCompetitor($_POST);
}


echo Display::displayClients($competitorsRepository->readCompetitors())
?>
<br>

<button onclick="ShowAddForm()"> ADD</button>
<button onclick="ShowEditForm()"> EDIT</button>
<button onclick="ShowDeleteForm()"> DELETE</button>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='addForm'>
    ADD <br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> age:
        <input type='number' name='age'>
    </label><br>
    <label> country:
        <input type='text' name='country'>
    </label><br>
    <label> marks:
        <input type='text' name='marks'>
    </label><br>
    <input type='hidden' name='action' value='add'>
    <input type='submit' value='add'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='editForm'>
    EDIT <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> age:
        <input type='number' name='age'>
    </label><br>
    <label> country:
        <input type='text' name='country'>
    </label><br>
    <label> marks:
        <input type='text' name='marks'>
    </label><br>
    <input type='hidden' name='action' value='edit'>
    <input type='submit' value='edit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='deleteForm'>
    Delete <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <input type='hidden' name='action' value='delete'>
    <input type='submit' value='delete'>
</form>

<br>


<style>
    #addForm {
        display: none;
    }

    #editForm {
        display: none;
    }

    #filterForm {
        display: none;
    }

    #deleteForm {
        display: none;
    }

    table, th, td {
        border: 1px solid;
        text-align: center;
    }

    th {
        width: 100px;
    }

    td {
        height: 50px;
    }
</style>

<script>
    function ShowAddForm() {
        document.querySelector('#addForm').style.display = 'inline';
    }

    function ShowEditForm() {
        document.querySelector('#editForm').style.display = 'inline';
    }


    function ShowDeleteForm() {
        document.querySelector('#deleteForm').style.display = 'inline';
    }

</script>