<?php
    $conn =  mysqli_connect("localhost","root","","paper_creation");
    $f_pointer=fopen("C:/Users/User/Downloads/pincode_master.csv","r"); // file pointer
    while(! feof($f_pointer)){
        $arr=fgetcsv($f_pointer);
        $sql =  "INSERT INTO pincode_master (pincode, country_code, state,city)VALUES ('".$arr[1]."', '".$arr[2]."', '".$arr[3]."','".preg_replace('/[\W\s\/]+/', '',$arr[4])."')";
        echo $sql."\n";
        if (mysqli_query($conn, $sql)) {
            echo "Pincode Data Inserted Successfully !"."\n";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
?>
