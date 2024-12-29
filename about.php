<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DIU Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #004d40, #009688);
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Header Section */
        .header {
            text-align: center;
            padding: 20px 20px;
            background: #ffffff;
            color: #00695c;
        }
        .header img {
            width: 120px;
            margin-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 2rem;
        }

               /* Dropdown Menu Styles */
               .menu {
            position: relative;
            display: flex;
            justify-content: center;
            background: #00695c;
            padding: 0;
            flex-wrap: wrap;
        }

        .menu-item {
            position: relative;
            display: inline-block;
        }

        .menu-link {
            display: block;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 15px 20px;
            transition: background-color 0.3s;
        }

        .menu-link:hover {
            background: #004d40;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #00695c;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1000;
            border-radius: 0 0 4px 4px;
        }

        .menu-item:hover .dropdown {
            display: block;
        }

        .dropdown-link {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dropdown-link:hover {
            background: #004d40;
        }

        /* Mobile Menu Styles */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            padding: 10px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .menu {
                flex-direction: column;
                align-items: stretch;
                padding: 0;
            }

            .menu-toggle {
                display: block;
                width: 100%;
                background: #00695c;
                text-align: right;
                padding: 15px;
            }

            .menu-items {
                display: none;
                width: 100%;
            }

            .menu-items.active {
                display: block;
            }

            .menu-item {
                display: block;
                width: 100%;
            }

            .menu-link {
                padding: 15px;
                border-top: 1px solid rgba(255,255,255,0.1);
            }

            .dropdown {
                position: static;
                background: #005448;
                box-shadow: none;
                width: 100%;
            }

            .dropdown-link {
                padding-left: 40px;
            }
        }

        /* About Content Section */
        .about-content {
            padding: 30px;
            line-height: 1.8;
            color: #555;
        }
        .about-content h2 {
            font-size: 1.8rem;
            color: #004d40;
            margin-bottom: 20px;
            text-align: center;
        }
        .about-content p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .about-content .developer-section {
            margin-top: 30px;
            text-align: center;
        }
        .developer-section h3 {
            font-size: 1.5rem;
            color: #00695c;
            margin-bottom: 15px;
        }
        .developer-section p {
            color: #444;
            font-size: 1rem;
        }

        /* Footer Section */
        .footer {
            background: #004d40;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header Section -->
    <div class="header">
        <img src="https://daffodilvarsity.edu.bd/template/images/diulogoside.png" alt="DIU Logo">
        <h1>About the DIU Academic Portal</h1>
    </div>

      <!-- Replace your existing menu with this structure -->
      <div class="menu">
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <div class="menu-items">
            <div class="menu-item">
                <a href="index.php" class="menu-link">Home</a>
            </div>
            <div class="menu-item">
                <a href="semester_result.php" class="dropdown-link">Results</a>
                </div>
                   <div class="menu-item">
                <a href="totalcgpa.php" class="dropdown-link">CGPA Calculator</a>
                        </div>
            <div class="menu-item">
                <a href="about.php" class="menu-link">About</a>
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

        // Handle touch events for mobile
        document.addEventListener('touchstart', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    dropdown.style.display = 'none';
                }
            });
        });
    </script>

    <!-- About Content Section -->
    <div class="about-content">
        <h2>About the Portal</h2>
        <p>
            The DIU Academic Portal is a modern solution for students of Daffodil International University. It provides 
            easy access to semester results and facilitates cumulative GPA calculations in a user-friendly manner.
        </p>
        <p>
            Designed with simplicity and efficiency in mind, the portal is fully responsive, ensuring accessibility from 
            any device. Our goal is to make academic management seamless and hassle-free for students.
        </p>

        <!-- Developer Section -->
        <div class="developer-section">
            <h3>Meet the Developer</h3>
            <p>
                This portal was proudly developed by <b>Tahsin Hamim</b>. Combining creativity with functionality, 
                the developer has ensured a smooth user experience for all DIU students.
            </p>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        &copy; <?= date('Y') ?> Daffodil International University. Developed by Tahsin Hamim.
    </div>
</div>

</body>
</html>
