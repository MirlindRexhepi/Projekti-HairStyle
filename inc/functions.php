<?php
session_start();
$dbcon;
dbConnection();
function dbConnection()
{
    global $dbcon;
    $dbcon = mysqli_connect('localhost', 'root', '', 'hairstyle');
    if (!$dbcon) {
        die("Lidhja me DB deshtoi" . mysqli_error($dbcon));
    }
}



function login($email, $fjalekalimi)
{
    global $dbcon;
    $sql = "SELECT klientiid, emri, mbiemri, roli FROM antaret";
    $sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $result = mysqli_query($dbcon, $sql);
    if (mysqli_num_rows($result) == 1) {
        $antariData = mysqli_fetch_assoc($result);
        $antari=array();
        $antari['klientiid']=$antariData['klientiid'];
        $antari['emrimbiemri']=$antariData['emri']. " " . $antariData['mbiemri'];
        $antari['roli']=$antariData['roli'];
        $_SESSION['antari']=$antari;
        header("Location: stilet.php");
    }else{
        echo "Ju lutem shenoni email dhe fjalkalim te sakte";
    }


}
if(isset($_GET['dalja'])){
    logout();
}
function logout(){
    unset($_SESSION);
    session_destroy();
    echo "index.php";
}




function regjistrohu($emri, $mbiemri, $email, $password, $telefoni, $nr_personal, $adresa)
{
    global $dbcon;
    $sql = "SELECT * FROM perdoruesit WHERE email = '$email'";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO perdoruesit(emri, mbiemri, email, password , nrpersonal, telefoni, adresa, role)";
            $sql .= "VALUES('$emri','$mbiemri','$email','$password','$nr_personal', '$telefoni','$adresa','Klient')";
            $result1 = mysqli_query($dbcon, $sql);
            if ($result1) {
                login($email , $password);
            }
        } else {
            echo "<script>alert('Ekziston nje llogari me kete email!');</script>";
        }
    }
}



function merrPerdoruesit()
{
    global $dbcon;
    $sql = "SELECT * FROM perdoruesit";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}


function merrPerdoruesId($perdoruesiId)
{
    global $dbcon;
    $sql = "SELECT * FROM perdoruesit WHERE perdoruesiid=$perdoruesiId";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoPerdorues($emri, $mbiemri, $email, $password, $nr_telefonit, $nrPersonal, $adresa, $roli)
{
    global $dbcon;
    $sql = "INSERT INTO `perdoruesit`
    ( `emri`, `mbiemri`, `email`, `password`, `telefoni`, `nrpersonal`, `adresa`, `role`)
    VALUES
           ('$emri','$mbiemri','$email','$password','$nr_telefonit','$nrPersonal','$adresa','$roli')";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        return true;
    }
    return false;
}

function modifikoPerdorues($perdoruesiId, $emri, $mbiemri, $email, $telefoni, $nr_personal, $adresa, $role){
    global $dbcon;
    $sql = "UPDATE perdoruesit SET emri = '$emri', mbiemri = '$mbiemri', email = '$email', telefoni = '$telefoni',
            nrpersonal = '$nr_personal', adresa = '$adresa', role = '$role' WHERE perdoruesiid = $perdoruesiId ";
    $result = mysqli_query($dbcon, $sql);
     return $result;
}

function fshijPerdorues($perdoruesiid)
{
    global $dbcon;
    $sql = "DELETE FROM perdoruesit WHERE perdoruesiid = $perdoruesiid";
    $result = mysqli_query($dbcon, $sql);
    return  $result;
}