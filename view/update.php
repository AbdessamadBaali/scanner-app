<?php
if (!isset($_SESSION['login'])) {
    header("location: ../index.php");
}
?>
<form class="row g-3 m-auto container my-4" action="index.php" method="post">
    <h2>Update QR Code</h2>
    <div class="col-md-6">
        <label for="name" class="form-label">Nom de Fichier:</label>
        <input type="text" class="form-control" id="name" name="filename" 
        value="<?php if(isset($idfile)) echo $name_file;?>" readonly> 
    </div>
    <div class="col-md-6">
         <label for="id" class="form-label">ID fichier:</label>
         <input type="text" class="form-control" value="<?php if(isset($idfile)) echo $idfile;?>" id="id" name="idFile" readonly>
        </div>
    <div class="col-md-6">
         <label for="etage" class="form-label">Etage:</label>
         <input type="number" class="form-control" id="etage" name="etage"
         value="<?php if(isset($etage)) echo $etage;?>"> 
    </div>
    <div class="col-md-6">
        <label for="column" class="form-label">Column:</label>
        <input type="number" class="form-control" id="column" name="column"
        value="<?php if(isset($column)) echo $column;?>"> 

    </div>
    <div class="col-md-6">
         <label for="typeF" class="form-label">Type Fichier:</label>
         <input type="text" class="form-control" id="typeF" name="typeF" readonly
         value="<?php if(isset($type)) echo $type;?>"> 

        </div>
    <div class="col-md-6">
         <label for="groupe" class="form-label">Groupe:</label>
         <input type="text" class="form-control" id="groupe" name="groupe" readonly
         value="<?php if(isset($groupe)) echo $groupe;?>"> 

        </div>
    <div class="col-md-6">
         <label for="stagiaire" class="form-label">Stagiaire:</label>
         <input type="text" class="form-control" id="stagiaire" name="stagiaire" readonly
         value="<?php if(isset($stg)) echo $stg;?>"> 

        </div>
    <div class="col-md-6">
         <label for="saison" class="form-label">Saison:</label>
         <input type="text" class="form-control" id="saison" name="saison" readonly
         value="<?php if(isset($season)) echo $season;?>"> 

        </div>
    <div class="col-12">
        <button type="submit" name="update">Update </button>
    </div>
</form>