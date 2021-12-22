<?Php
    require_once '../db/conn.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $appointment = $_POST['aptmntdate'];
        $aptmnttime = $_POST['aptmnttime'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $servicetype = $_POST['servicetype'];
    
    //Call Crud function
    $result = $crud->editClient($id, $fname, $lname, $appointment,  $aptmnttime, $email, $contact, $servicetype);
    //Redirect to index.php
    if($result == true){
        header("Location: scripts/viewrecords.php");
    }
    else{
        include '../includes/errormessage.php';
    }
}
else{
    include '../includes/errormessage.php';
}


?>