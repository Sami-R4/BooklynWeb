<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<style>
    *{
        font-family: "Manrope";
    }
    @font-face {
        font-family: "Manrope";
        src: url("../fonts/MANROPE-VARIABLEFONT_WGHT.TTF");
    }
    .footer{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        background-color: #000068;
    }
    .footer h2{
        color: #fff;
    }
    .footer p{
        color: #eee;
    }
    .footer .p:hover{
        color: #FCD34D;
        text-decoration: underline;
    }
</style>
<body>
    <footer class="py-5 footer mt-5 container-fluid">
        <div>
            <h2>BOOKLYN</h2>
            <p>Explore, Borrow, Buy</p>
            <p>Your digital gateway to the world of books</p>
        </div>
        <div>
            <h2>Quick Links</h2>
            <p class="p">Home</p>
            <p class="p">About</p>
            <p class="p">Libraries</p>
        </div>
        <div>
            <h2>Contact Us</h2>
            <p>njuhsamuelrichmond@gmail.com</p>
            <p>Douala, Cameroon</p>
        </div>
    </footer>
</body>
</html>