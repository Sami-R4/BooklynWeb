<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booklyn | Author Books</title>
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"></head>
<!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
<!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    .wrapper{
        margin-top: 20px;
    }
    .main{
        margin: 20px 25px 20px 25px;
    }
    .dash-header{
        margin: 0 25px;
    }
    .dash-header h2{
        color: #3B82F6;
    }
    .filter{
        display: grid;
        grid-template-columns: 45% 20% 20% 10%;
        gap: 10px;
    }
    .search-bar{
        display: flex;
        gap: 5px;
        justify-center: center;
        align-items: center;
        border: 1px solid #3b82f6;
        width: 100%;
        background: #fff;
        border-radius: 30px;
        padding: 4px 8px;
    }
    .search-bar input{
        border: none;
        background: #fff; 
        border-radius: 30px;
        width: 100%;
        outline: none;
    }
    .search-bar input::placeholder{
        font-size: 15px;
    }
    .search-bar i{
        margin-left: auto;
        background: #3b82f6;
        color: white;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .search-bar i:hover{
        transform: scale(1.05);
    }
    .search-bar:focus-within{
        box-shadow: 0 0 6px #3b82f6;
    }
    .filter select{
        border-radius: 30px;
        padding: 10px;
        background: #fff;
        border: 1px solid #3b82f6;
        outline: none;
    }
    .filter select:focus{
        box-shadow: 0 0 6px #3b82f6;
    }
    .filter button{
        border-radius: 30px;
        background: #3b82f6;
        border: none;
        color: #fff;
    }
    .filter select option[value=""][hidden]{
        color: #fdfdfd;
    }
    .filter select option{
        color: #333;
    }
    .main{
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }
    table{
        margin-top: 10px;
        width: 100%;
        background: #fff;
    }
    table thead{
        background: linear-gradient(to right, #1e293b, #3b82f6);
        color: #fff;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    table thead th{
        padding: 10px 0;
    }
    table thead th:first-child{
        border-top-left-radius: 10px;
        padding-left: 15px;
    }
    table thead th:last-child{
        padding-right: 15px;
        border-top-right-radius: 10px;
    }
    table tr:hover td{
        background: whitesmoke;
    }
    table button{
        background: white;
        color: #3b83f6;
        border: none;
        background: #e8effaff;
        border-radius: 6px;
    }
</style>
<body>

<?php include ('user-navbar.php') ?>

<div class="wrapper">
    <div class="dash-header">
        <h2>My Books</h2>
        <div class="filter">
        <div class="search-bar">
            <input type="text" name="search" id="search" placeholder="Search by name,catergory,date,.............">
            <i class="fas fa-search"></i>
        </div>
            <select name="filterStatus" id="filterStatus">
                <option value="" hidden>Filter By Status</option>
                <option value="draft">Draft</option>
                <option value="pending">Pending</option>
                <option value="uploaded">Uploaded</option>
            </select>
            <select name="filterCategory" id="filterCategory">
                <option value="" hidden>Filter By Category</option>
                <option value="horror">Horror</option>
                <option value="thriller">Thriller</option>
            </select>
            <button>Filter <i class="fas fa-filter"></i></button>
</div>
    </div>
    <div class="main">
        <!-- Table -->
         <table>
            <thead>
                <th>Book Cover</th>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Downloads/Sales</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>
                 <?php include ('../../app/dbconfig.php');
                 $author_id = $_SESSION['author_id'];
            $sql = "SELECT * FROM books WHERE `author_id` = '$author_id'";
            $qry = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($qry)){
                $id =  $result['book_id'];
                $cover = $result['cover_image'];
                $title  = $result['book_title'];
                $category = $result['genre'];
                $price = $result['price'];
             ?>
                <tr>
                    <td><img src="../../app/<?php echo $cover ?>" width="50" alt="image cover"></td>
                    <td><?php echo $title ?></td>
                    <td><?php echo $category ?></td>
                    <td>XAF <?php echo $price ?></td>
                    <td>110</td>
                    <td class="status">Pending</td>
                    <td>
                        <button class="view"><i class="fas fa-eye"></i></button>
                        <button class="edit"><i class="fas fa-pen-to-square"></i></button>
                        <button class="del"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
             <?php
            }
            ?>
         </table>
    </div>

</body>
</html>
