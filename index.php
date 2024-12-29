<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIU Academic Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            flex-wrap: wrap;
        }

        .header img {
            width: 150px;
            height: auto;
        }

        .header h1 {
            font-size: 1.8rem;
            color: #00695c
        }

        .logout-button {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .logout-button:hover {
            background: #c0392b;
        }

        /* Menu */
        .menu {
            background: #00695c;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 15px;
        }

        .menu-items {
            display: flex;
            justify-content: center;
        }

        .menu-item {
            position: relative;
        }

        .menu-link {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .menu-link:hover {
            background: #00695c;
        }

        /* Welcome Section */
        .welcome-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .welcome-section h2 {
            font-size: 2.5rem;
            color: #00695c
            margin-bottom: 15px;
        }

        .welcome-section p {
            font-size: 1.1rem;
            color: #34495e;
        }

        /* Features */
        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            padding: 40px 20px;
        }

        .feature-card {
            flex: 1;
            min-width: 280px;
            max-width: 350px;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .feature-card svg {
            width: 60px;
            height: 60px;
            fill: #3498db;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #00695c;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .feature-card p {
            font-size: 1rem;
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .feature-card button {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .feature-card button:hover {
            background: #00695c;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background: #00695c;
            color: white;
            font-size: 0.9rem;
            border-radius: 0 0 20px 20px;
            margin-top: 40px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                margin: 10px;
                padding: 10px;
            }

            .header {
                flex-direction: column;
                text-align: center;
            }

            .header h1 {
                margin: 10px 0;
            }

            .menu-toggle {
                display: block;
            }

            .menu-items {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #00695c;
                z-index: 1000;
            }

            .menu-items.active {
                display: flex;
            }

            .menu-item {
                width: 100%;
                margin: 0;
            }

            .menu-link {
                padding: 15px;
            }

            .features {
                flex-direction: column;
                align-items: center;
            }

            .feature-card {
                width: 100%;
            }

            .welcome-section h2 {
                font-size: 2rem;
            }

            .welcome-section p {
                font-size: 1rem;
            }
        }

        @media screen and (max-width: 480px) {
            .header img {
                width: 100px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .welcome-section h2 {
                font-size: 1.8rem;
            }

            .feature-card {
                padding: 20px;
            }

            .feature-card h3 {
                font-size: 1.3rem;
            }

            .feature-card p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://daffodilvarsity.edu.bd/template/images/diulogoside.png" alt="DIU Logo">
            <h1>Welcome, <?= $username ?>!</h1>
            <form action="logout.php" method="POST">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

        <div class="menu">
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <div class="menu-items">
                <div class="menu-item">
                    <a href="index.php" class="menu-link">Home</a>
                </div>
                <div class="menu-item">
                    <a href="semester_result.php" class="menu-link">Results</a>
                </div>
                <div class="menu-item">
                    <a href="totalcgpa.php" class="menu-link">CGPA Calculator</a>
                </div>
                <div class="menu-item">
                    <a href="about.php" class="menu-link">About</a>
                </div>
            </div>
        </div>

        <div class="welcome-section">
            <h2>Welcome to the DIU Academic Portal</h2>
           <p>Your one-stop solution for academic results, GPA calculations, and more!</p>
        </div>
        <div class="features">
            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                </svg>
                <h3>View Results</h3>
                <p>Access your semester results quickly and easily.</p>
                <button onclick="window.location.href='semester_result.php'">Check Results</button>
            </div>
            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
                <h3>CGPA Calculator</h3>
                <p>Calculate your Cumulative Grade Point Average with ease.</p>
                <button onclick="window.location.href='totalcgpa.php'">Calculate CGPA</button>
            </div>
            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                </svg>
                <h3>About Us</h3>
                <p>Learn more about DIU and our academic programs.</p>
                <button onclick="window.location.href='about.php'">Learn More</button>
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            const menuItems = document.querySelector('.menu-items');
            menuItems.classList.toggle('active');
        }

               // Close menu when clicking outside
               document.addEventListener('click', function(event) {
            const menu = document.querySelector('.menu');
            const menuItems = document.querySelector('.menu-items');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (!menu.contains(event.target) && menuItems.classList.contains('active')) {
                menuItems.classList.remove('active');
            }
        });
    </script>
    <div class="footer">
        &copy; <?= date('Y') ?> Daffodil International University. Developed by Tahsin Hamim. All Rights Reserved.
    </div>
</body>
</html>
