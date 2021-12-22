<?php 
    $title = 'Edit Record';
   
    require_once '../includes/header.php'; 
    require_once '../db/conn.php';

    $results = $crud->getservicetype();

    if(!isset($_GET['id']))
    {   
        //echo error messaage
        include '../includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $client = $crud->getClientDetails($id);
    
    

?>
        <h1 class="text-center">Edit Record</h1>
    
        <form method="post" action="success.php">
            <input type="hidden" name="id" value="<?php echo $client['client_id'] ?>" />
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label> 
                <input required type="text" class="form-control" value="<?php echo $client['firstname'] ?>" id="firstname" name="firstname" >
            
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input required type="text" class="form-control" value="<?php echo $client['lastname'] ?>" id="lastname" name="lastname" >
            
            </div>
            <div class="mb-3">
                <label for="aptmntdate" class="form-label">Appointment Date</label>
                <input type="text" class="form-control" value="<?php echo $client['aptmntdate'] ?>" id="aptmntdate" name="aptmntdate" >
            
            </div>
            <div class="mb-3">
                <label for="aptmnttime" class="form-label">Time</label>
                <input type="text" class="form-control"value="<?php echo $client['aptmnttime'] ?>" id="aptmnttime" name="aptmnttime" >
            
            </div>
            <div class="mb-3">
                <label for="servicetype">Services</label>
                <select class="form-control"value="<?php echo $client['servicetype'] ?>" id="servicetype" name="servicetype">
                   <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $r['servicetype_id'] ?>" <?php if($r['servicetype_id'] ==
                         $client['servicetype_id']) echo 'selected' ?>>
                            <?php echo $r['name']; ?>
                      </option>

                     <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="emailadd" class="form-label">Email Address</label>
                <input required type="email" class="form-control" value="<?php echo $client['emailadd'] ?>" id="emailadd" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Your email won't be shared.</small>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" value="<?php echo $client['phone'] ?>" id="phone" name="phone"
                aria-describedby="phoneHelp">
                <small id="phoneHelp" class="form-text text-muted">Your phone number won't be shared.</small>
            </div>
           
            <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Changes</button>
            </div>
    </form>

<?php } ?>    
    
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>



    <?php require_once '../includes/footer.php'; ?>              
