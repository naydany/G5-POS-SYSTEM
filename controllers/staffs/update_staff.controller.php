<?php
require '../../database/database.php';
require '../../models/staff.model.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    if ($_POST['cas_id'] !== '' && $_POST['name'] !=='' && $_POST['number'] !=='' && $_POST['email'] !=='' && $_POST['password'] !=='' && $_POST['address'] !=='') {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $id = $_POST['cas_id'];
        
        $update = updateStaffs($id, $name, $number, $email, $password, $address);

        header('location:/staffs');
    }
}