<?php

require 'services/db.php';

try {
    $sql = "INSERT INTO addresses (address1, address2, city, state, zip_code) VALUES (?,?,?,?,?)";
    $db->prepare($sql)->execute([$_POST['address1'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['zipCode']]);

    echo 'Address saved successfully!';
} catch (\Exception $e) {
    throw ['error' => $e];
}