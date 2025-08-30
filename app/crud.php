<?php
include("dbconfig.php");
// ======================================================
// Delete Processing
// ======================================================



// Book Delete Process
if(isset($_POST['del'])){
    $id = $_POST['id'];
    $sql_del = "DELETE FROM `books` WHERE book_id ='$id'";
    $qry_del = mysqli_query($conn, $sql_del);
    if($qry_del){
        $alert='<script type="text/javascript">
            if(window.confirm("Book was deleted successfully,")){
                 window.location.href="../pages/author/myBooks.php";
        }
                 </script>';
            echo '<script type="text/JavaScript">alert("ARE YOU SURE YOU WANT TO DELETE? IF YES CLICK OK.")</script>';
                 echo $alert;
    }
}

// Account Delete Process
// if(isset($_POST['del_acc'])){
//     $id = $_POST['id'];
//     $author_id = $_SESSION['author_id'];
//     $sql_del = "DELETE FROM `users` WHERE user_id ='$id'";
//     $qry_del = mysqli_query($conn, $sql_del);
//     $sql_del_auth = "DELETE FROM `authors` WHERE author_id='$author_id'";
//     $qry_del_auth = mysqli_query($conn, $sql_del_auth);
//     if($qry_del) && ($qry_del_auth){
//         $alert='<script type="text/javascript">
//             if(window.confirm("Account was deleted successfully,")){
//                  window.location.href="../pages/author/myBooks.php";
//         }
//                  </script>';
//             echo '<script type="text/JavaScript">alert("NOTE THAT THIS ACTION IS IRREVERSIBLE!! IF YES CLICK OK.")</script>';
//                  echo $alert;
//     }
// }
?>
