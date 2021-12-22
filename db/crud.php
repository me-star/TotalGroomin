<?php
   class crud{
        //private database object\
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
           $this->db = $conn;
        }
    
        //function to insert a new record into the attendee database
        public function insertClient($fname, $lname, $appointment, $email, $aptmnttime, $contact, $servicetype){
           try{
               $sql = "INSERT INTO client (firstname,lastname,aptmntdate, aptmnttime, emailadd,phone,servicetype_id) VALUES (:fname, :lname, :appointment, :email, :aptmnttime, :contact, :servicetype)";
               //prepare the sql statement for execution
               $stmt = $this->db->prepare($sql);
               //bind all placeholder to the actual values

               $stmt->bindparam(':fname',$fname);
               $stmt->bindparam(':lname',$lname);
               $stmt->bindparam(':appointment',$appointment);
               $stmt->bindparam(':email',$email);
               $stmt->bindparam(':aptmnttime',$aptmnttime);
               $stmt->bindparam(':contact',$contact);
               $stmt->bindparam(':servicetype',$servicetype);

               $stmt->execute();
               return true;

           }  catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
        }

        public function editClient($id,$fname, $lname, $appointment, $email, $aptmnttime, $contact, $servicetype){
           try{
           
           $sql = "UPDATE `client` SET `firstname`=:fname,`lastname`=:lname,`aptmntdate`=
           :appointment, aptmnttime'=:aptmnttime`, emailadd`=:email,`phone`=:contact,`servicetype_id`=:servicetype WHERE client_id = :id";  

           $stmt = $this->db->prepare($sql);
           //bind all placeholder to the actual values
           $stmt->bindparam(':id',$id);
           $stmt->bindparam(':fname',$fname);
           $stmt->bindparam(':lname',$lname);
           $stmt->bindparam(':aptmntdate',$appointment);
           $stmt->bindparam(':email',$email);
           $stmt->bindparam(':aptmnttime',$aptmnttime);
           $stmt->bindparam(':contact',$contact);
           $stmt->bindparam(':servicetype',$servicetype);
       
           $stmt->execute();
           return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;

        }
        
    }

        public function getClient(){
            try{
                $sql = "SELECT * FROM `client` c inner join servicetype s on c.servicetype_id = s.servicetype_id ";
                $result = $this->db->query($sql);
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;

        }

            
       
        }

        public function getClientDetails($id){
            try{
                $sql = "select * from client c inner join servicetype s on c.servicetype_id =
                 s.servicetype_id where client_id = :id";
                 $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                 $result = $stmt->fetch();
                 return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;

        }
            

        }

        public function deleteClient($id){
           try{
                $sql = "DELETE FROM `client` WHERE client_id = :id"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
           }catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
           }
        }


        public function getservicetype(){
            try{
                $sql = "SELECT * FROM `servicetype`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false; 
               }
            
            
        }

        
    }

?>