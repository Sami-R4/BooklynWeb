<?php
include ('dbconfig.php');

function sanitizeData($value) {
    return stripslashes(htmlspecialchars(trim($value)));
}

// get author id
session_start();
$author_id = $_SESSION['author_id'];
$author_name = $_SESSION['pen_name'];

if(isset($_POST['add-book'])){
    $book_title = sanitizeData($_POST['bookTitle']);
    $book_price = sanitizeData($_POST['bookPrice']);
    $book_pages = sanitizeData($_POST['bookPages']);
    $book_year = sanitizeData($_POST['bookYear']);
    $book_tags = sanitizeData($_POST['bookTags']);
    $book_desc = sanitizeData($_POST['bookDescription']);

    // Files
    $cover = $_FILES['bookCover'];
    $pdf = $_FILES['bookPdf'];

    // CoverImg info
    $coverName = $cover['name'];
    $coverTmpName = $cover['tmp_name'];
    $coverExt = strtolower(pathinfo($coverName, PATHINFO_EXTENSION));
    $allowedCover = ['jpg', 'png', 'jpeg'];

    // Pdf file info
    $pdfName = $pdf['name'];
    $pdfTmpName = $pdf['tmp_name'];
    $pdfExt = strtolower(pathinfo($pdfName, PATHINFO_EXTENSION));
    $allowedPdf  = ['pdf'];

    // Cover img validation
    if(in_array($coverExt, $allowedCover)){
        $coverPath = 'book-covers/';
        if(!is_dir($coverPath)) mkdir($coverPath);
        $coverLoc = $coverPath.basename($coverName);
    }

    // pdf file validation
    if(in_array($pdfExt, $allowedPdf)){
        $pdfPath = 'book-pdfs/';
        if(!is_dir($pdfPath)) mkdir($pdfPath);
        $pdfLoc = $pdfPath.basename($pdfName);
    }

    // Move cover img
   if(move_uploaded_file($coverTmpName, $coverLoc) && move_uploaded_file($pdfTmpName, $pdfLoc)){
    $sql = "INSERT INTO `books`(`author_id`,`book_title`,`author`,`genre`,`cover_image`,`book_url`,`description`,`published_year`,`price`,`pages`) 
            VALUES ('$author_id','$book_title','$author_name','$book_tags','$coverLoc','$pdfLoc','$book_desc','$book_year','$book_price','$book_pages')";
    $result = mysqli_query($conn, $sql);

    if($result){
       $_SESSION['alert'] = [
        'type' => 'success',
        'title' => 'Success!!!',
        'message' => 'Book Added Successfully!!!',
        'redirect' => '../author/dashboard.php'
       ];

       header('Location: ../pages/author/dashboard.php');
       exit();
    }
}

    

}
?>