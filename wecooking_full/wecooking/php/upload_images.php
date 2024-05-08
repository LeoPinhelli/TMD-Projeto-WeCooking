<?php
require_once('./conn.php');

$id = $_POST['id'];
$access = $_POST['access'];
$allFileNames = "";

if (isset($_FILES["files"]["name"])) {
    $countFiles = count($_FILES['files']['name']);
    //var_dump($countFiles);
    for ($i = 0; $i < $countFiles; $i++) {
        // File name
        $filename = $_FILES['files']['name'][$i];
        //var_dump($filename);
        // Location
        if ($access === "#admin") {
            $location = "../receipts/" . $id . "/";
        } else if ($access === "#user") {
            $location = "../receipts_user/" . $id . "/";
        }
        if (!file_exists($location)) {
            mkdir($location);
        }
        $uploadPath = $location . basename($filename);
        // File size
        $filesize = $_FILES['files']['size'][$i];
        // Maximum file size in bytes
        $max_size = 4000000; // 20MB
        if ($filesize > $max_size) {
            // Return response
            echo json_encode("The file exceeds the maximum file size of 2 MB.");
            exit;
        }
        // Extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        // Allowed file extensions 
        $acceptfile_ext = array("jpeg", "jpg", "png");
        // Check file extension 
        if (in_array($extension, $acceptfile_ext)) {
            // Upload file
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $uploadPath)) {
                // Return response
                $response['status'] = 1;
                $response['msg'] = "File uploaded successfully.";
                echo json_encode($response);
            }
        } else {
            // Return response
            $response['status'] = 0;
            $response['msg'] = "Invalid file extension.";
            echo json_encode($response);
            exit;
        }
        $allFileNames = $allFileNames . "," . $filename;
    }
    ;
}

$sql = "UPDATE receipts SET receipt_images = '$allFileNames' WHERE receipt_id = '$id'";

if (mysqli_query($conn, $sql)) {
} else {
    echo "Erro no upload do banco!";
}
?>