<?php
include('../../connexion.php');


if (isset($_GET['del_id'])) {
    $deletwithid = $_GET['del_id'];
    echo  $deletwithid;
    $query = "DELETE FROM compte WHERE ID = (SELECT ID_compte FROM etudiant WHERE ID_etudiant = '$deletwithid')";
    mysqli_query($connect, $query);
    header("location:../administrateur-etudiant.php");
}
