<?php
session_start(); 

// Kontrolloni nëse përdoruesi është i kyçur në sesion, nëse jo, ridrejtohuni në faqen e hyrjes (login)
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pageslogin.php");
    exit();
}

include '../config/config.php'; // Përfshijeni skedarin e konfigurimit për të vendosur një lidhje me bazën e të dhënave

$bookingsQuery = $conn->query("SELECT * FROM bookings"); // Marrja e të gjitha prenotimeve nga tabela 'bookings'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bookings.css">
    <title>Dashboard</title>
</head>

<body>
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="dashboard.php">
                        <h1><span>JO</span>- NA</h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="dashboard.php" data-after="Dashboard">Dashboard</a></li>
                        <li><a href="users.php" data-after="Users">Users</a></li>
                        <li><a href="bookings.php" data-after="Bookings">Bookings</a></li>
                        <li><a href="../config/logout.php" data-after="Logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="bookings">
    <div class="bookings container">
        <h1>All Bookings</h1>
        <form method="POST" action="add_booking.php">
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" required>
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="surname">Surname:</label>
    <input type="text" name="surname" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" required>
    <label for="address">Address:</label>
    <input type="text" name="address" required>
    <label for="location">Location:</label>
    <input type="text" name="location" required>
    <label for="guests">Guests:</label>
    <input type="number" name="guests" required>
    <label for="arrival_date">Arrival Date:</label>
    <input type="date" name="arrival_date" required>
    <label for="leaving_date">Leaving Date:</label>
    <input type="date" name="leaving_date" required>
    <button type="submit">Add Booking</button>
</form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Guests</th>
                    <th>Arrival Date</th>
                    <th>Leaving Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $bookingsQuery->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['guests']; ?></td>
                        <td><?php echo $row['arrival_date']; ?></td>
                        <td><?php echo $row['leaving_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1><span>JO</span>- NA</h1>
            </div>
            <div class="social-icon">
            </div>
            <p>&copy; 2023 JO-NA. All rights reserved</p>
        </div>
    </section>

    <script src="../js/main.js"></script> <!-- Lidhja e skedarit të skriptit JavaScript -->
</body>

</html>
