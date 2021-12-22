<?php 
    $title = 'View Record';

    require_once '../includes/header.php'; 
    require_once '../db/conn.php';

    //Function to get attendee by id
    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check details and try again</h1>";
    } 
    else{
        $id = $_GET['id'];
        $result = $crud->getClientDetails($id);
    
?>
       <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">
            <?php echo  $result['firstname'] . ' ' . $result['lastname'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted"> 
            <?php echo  $result['name'];?>
            </h6>
            <p class="card-text">
                Appointment Date: <?php echo $result['aptmntdate'];?> 
            </p>
            <p class="card-text">
                Time: <?php echo $result['aptmnttime'];?> 
            </p>
            <p class="card-text">
                Email Address: <?php  echo $result['emailadd'];?> 
            </p>
            <p class="card-text">
                Contact: <?php echo $result['phone'];?> 
            </p>

        </div>
    </div> 
     </div>
    </br>
            <a href="viewrecords.php" class="btn btn-info">Back to list</a>
            <a href="edit.php?id=<?php echo $result['client_id']  ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');" 
             href="delete.php?id=<?php echo $result['client_id']  ?>" class="btn btn-danger">Delete</a>
        <?php } ?>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <?php require_once '../includes/footer.php'; ?>   

   