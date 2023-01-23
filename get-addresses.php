<?php

require 'services/db.php';

try {
    $addresses = $db->query("SELECT * FROM addresses ORDER BY id DESC")->fetchAll();
    foreach ($addresses as $address) {
        echo "
            <tr>
                <td>{$address['address1']}</td>
                <td>{$address['address2']}</td>
                <td>{$address['city']}</td>
                <td>{$address['state']}</td>
                <td>{$address['zip_code']}</td>
            </tr>
        ";
    }
} catch (\Exception $e) {
    throw ['error' => $e];
}
