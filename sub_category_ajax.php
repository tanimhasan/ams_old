<?php

include('db_connect.php');
$renterId = $_POST['renterId'];
echo "<option selected disabled>Select Apartment</option>";
/*$res = mysqli_query($con, "SELECT * FROM rent_management WHERE renter_id='$renterId'");*/
$res = mysqli_query($con, "SELECT apartments.apartment_no
FROM rent_management
INNER JOIN apartments
ON apartments.apartment_id=rent_management.apartment_id
WHERE renter_id='$renterId';");
while ($data = mysqli_fetch_array($res)) {
    echo "<option value='" . $data['apartment_id'] . "'>" . $data['apartment_no'] . "</option>";

}
?>
