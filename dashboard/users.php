<?php
session_start(); 

// Kontrolloni nëse përdoruesi është i kyçur në sesion, nëse jo, ridrejtohuni në faqen e hyrjes (login)
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

include '../config/config.php'; // Përfshijeni skedarin e konfigurimit për të vendosur një lidhje me bazën e të dhënave

$usersQuery = $conn->query("SELECT * FROM users");

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $deleteQuery = $conn->prepare("DELETE FROM users WHERE id = ?");
    $deleteQuery->bind_param("i", $userId);
    $deleteQuery->execute();
}

if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $userId = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $userType = $_POST['user_type'];

    $updateQuery = $conn->prepare("UPDATE users SET name = ?, surname = ?, email = ?, user_type = ? WHERE id = ?");
    $updateQuery->bind_param("ssssi", $name, $surname, $email, $userType, $userId);
    $updateQuery->execute();
}

$usersQuery = $conn->query("SELECT * FROM users");
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/users.css">
    <title>Dashboard</title>
</head>

<body>
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="dashboard.php">
                        <h1><span>JO</span>-NA</h1>
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

    <section id="users">
    <div class="users container">
        <h1>All Users</h1>
        <form method="POST" action="add_user.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="user_type">User Type:</label>
            <input type="text" name="user_type" required>
            <button type="submit">Add User</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $usersQuery->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['user_type']; ?></td>
                        <td>
                            <a href="users.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="users.php?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this user?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>

                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
                    $userId = $_GET['id'];
                    $userQuery = $conn->prepare("SELECT * FROM users WHERE id = ?");
                    $userQuery->bind_param("i", $userId);
                    $userQuery->execute();
                    $result = $userQuery->get_result();
                    $user = $result->fetch_assoc();
                    ?>
                    <form method="post">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" value="<?php echo $userId; ?>">
                        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
                        <input type="text" name="surname" value="<?php echo $user['surname']; ?>" required>
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                        <input type="text" name="user_type" value="<?php echo $user['user_type']; ?>" required>
                        <button type="submit">Update User</button>
                    </form>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1><span>JO</span>-NA</h1>
            </div>
            <div class="social-icon">
            </div>
            <p>&copy; 2023 JO-NA. All rights reserved</p>
        </div>
    </section>

    <script src="../js/main.js"></script>
</body>

</html>
