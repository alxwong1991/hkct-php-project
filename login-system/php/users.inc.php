<?php
// user.php
class User{
    protected $db;
    protected $user_name;
    protected $user_email;
    protected $user_pass;
    protected $hash_pass;
    
    function __construct($db_connection){
        $this->db = $db_connection;
    }

// FIND USER BY ID
function find_user_by_id($id){
    try{
        $find_user = $this->db->prepare("SELECT * FROM `users` WHERE usersId = ?");
        $find_user->execute([$id]);
        if($find_user->rowCount() === 1){
            return $find_user->fetch(PDO::FETCH_OBJ);
        }
        else{
            return false;
        }
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
}
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    function all_users($id){
        try{
            $get_users = $this->db->prepare("SELECT usersId, usersName FROM `users` WHERE usersid != ?");
            $get_users->execute([$id]);
            if($get_users->rowCount() > 0){
                return $get_users->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>