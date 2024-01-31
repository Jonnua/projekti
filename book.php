<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/book.css">
  <title>JO-NA Book</title>
</head>

<body>
<section id="header">
   <div class="header container">
     <div class="nav-bar">
       <div class="brand">
         <a href="index.html">
           <h1><span>J</span>O- <span>N</span>A <span>T</span>RAVEL</h1>
         </a>
       </div>
       <div class="nav-list">
         <div class="hamburger">
           <div class="bar"></div>
         </div>
         <ul>
          <li><a href="afterlogin.html#hero" data-after="Home">Home</a></li>
          <li><a href="afterlogin.html#services" data-after="Service">Transporti</a></li>
          <li><a href="afterlogin.html#projects" data-after="Service">Package</a></li>
          <li><a href="afterlogin.html#about" data-after="About">About</a></li>
          <li><a href="afterlogin.html#contact" data-after="Contact">Contact</a></li>
          <li><a href="index.html" data-after="Book">LogOut</a></li>
         </ul>
       </div>
     </div>
   </div>
 </section>
<div class="heading" style="background:url(img/header-bg-1.png) no-repeat">
   <h1>book now</h1>
</div>

<section class="booking">

   <h1 class="heading-title">book your trip!</h1>

   <form action="book_form.php" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name">
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="enter your email" name="email">
         </div>
         <div class="inputBox">
            <span>phone :</span>
            <input type="number" placeholder="enter your number" name="phone">
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="address">
         </div>
         <div class="inputBox">
            <span>where to :</span>
            <input type="text" placeholder="place you want to visit" name="location">
         </div>
         <div class="inputBox">
            <span>how many :</span>
            <input type="number" placeholder="number of guests" name="guests">
         </div>
         <div class="inputBox">
            <span>arrivals :</span>
            <input type="date" name="arrivals">
         </div>
         <div class="inputBox">
            <span>leaving :</span>
            <input type="date" name="leaving">
         </div>
      </div>

      <input type="submit" value="submit" class="btn" name="send">

   </form>

</section>

<section id="footer">
   <div class="footer container">
     <div class="brand">
       <h1><span>J</span>O <span>-N</span>A</h1>
     </div>
     <div class="social-icon">
       <div class="social-item">
         <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
       </div>
       <div class="social-item">
         <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
       </div>
     </div>
     <p>Copyright © 2023 JO-NA. All rights reserved</p>
   </div>
 </section>

<script src="./js/main.js"></script>

</body>
</html>