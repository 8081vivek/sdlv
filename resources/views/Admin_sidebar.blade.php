<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SDLV Inter College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Crimson+Text:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables with Serif Fonts */
        :root {
            --primary: #1a4b8c;
            --secondary: #8B4513;
            --accent: #B22222;
            --light: #f0f7ff;
            --dark: #2c3e50;
            --white: #ffffff;
            --success: #228B22;
            --warning: #FFA500;
            --danger: #DC143C;
            --gradient: linear-gradient(135deg, #1a4b8c, #4a7abc);
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Prevent body scroll when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: var(--primary);
            color: var(--white);
            transition: transform 0.3s ease;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
            left: 0;
            top: 0;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            font-size: 2rem;
            color: var(--white);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .sidebar-close {
            display: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.3rem;
            cursor: pointer;
            padding: 5px;
            transition: var(--transition);
        }

        .sidebar-close:hover {
            color: var(--secondary);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-left-color: var(--secondary);
        }

        .menu-item i {
            width: 20px;
            text-align: center;
        }

        .menu-text {
            font-size: 1rem;
        }

        .menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 15px 0;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 260px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            width:100%;
            display: flex;
            flex-direction: column;
            width: calc(100% - 260px);
        }

        /* Top Bar Styles */
        .top-bar {
            background: var(--white);
            padding: 15px 30px;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
            padding: 5px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--light);
            border-radius: 6px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-bar input {
            border: none;
            background: transparent;
            padding: 5px 10px;
            width: 100%;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
        }

        .search-bar input:focus {
            outline: none;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-details {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 1rem;
        }

        .user-role {
            font-size: 0.85rem;
            color: var(--dark);
            opacity: 0.7;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .notifications {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent);
            color: var(--white);
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Dashboard Content Styles */
        .dashboard-content {
            flex: 1;
            padding: 30px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 1.1rem;
            color: var(--dark);
            opacity: 0.8;
            margin-bottom: 30px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--white);
        }

        .stat-icon.students {
            background: linear-gradient(135deg, #1a4b8c, #4a7abc);
        }

        .stat-icon.teachers {
            background: linear-gradient(135deg, #8B4513, #D2691E);
        }

        .stat-icon.courses {
            background: linear-gradient(135deg, #228B22, #32CD32);
        }

        .stat-icon.attendance {
            background: linear-gradient(135deg, #FFA500, #FFD700);
        }

        .stat-info {
            flex: 1;
        }

        .stat-title {
            font-size: 1rem;
            color: var(--dark);
            opacity: 0.7;
            margin-bottom: 5px;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .stat-change {
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            backdrop-filter: blur(2px);
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* Mobile Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 5px 0 25px rgba(0, 0, 0, 0.2);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .sidebar-close {
                display: block;
            }
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .search-bar {
                width: 250px;
            }
        }

        @media (max-width: 992px) {
            .search-bar {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .search-bar {
                width: 180px;
            }
            
            .top-bar {
                padding: 15px 20px;
            }
            
            .user-details {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .search-bar {
                display: none;
            }
            
            .dashboard-content {
                padding: 20px 15px;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <i class="fas fa-graduation-cap logo-icon"></i>
                <div class="logo-text" style="color:white !important">B.S.D.L.V. Admin</div>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="sidebar-menu">
            <a href="Admin_dashboard" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
            </a>
            
            <a href="Student_management" class="menu-item">
                <i class="fas fa-user-graduate"></i>
                <span class="menu-text">Students</span>
            </a>
            
            <a href="afaculty" class="menu-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="menu-text">Teachers</span>
            </a>
            
            <a href="faculty" class="menu-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="menu-text">Add Faculty</span>
            </a>
            
            <a href="a" class="menu-item">
                <i class="fas fa-calendar-alt"></i>
                <span class="menu-text">Attendance</span>
            </a>
            
            <div class="menu-divider"></div>
            
            <a href="fee_pay" class="menu-item">
                            <i class="fas fa-file-invoice-dollar"></i>
                <span class="menu-text">Fee Collection</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span class="menu-text">Settings</span>
            </a>
            <a href="TTimetable" class="menu-item">
                <i class="fas fa-calendar"></i>
                <span class="menu-text">Time Table</span>
            </a>
            
            <a href="/admin_logout" class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <span class="menu-text">Logout</span>
            </a>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            
            <div class="user-info">
                <div class="notifications">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">5</span>
                </div>
                
                <div class="user-details">
                    <div class="user-name">Dr. Rajesh Sharma</div>
                    <div class="user-role">Administrator</div>
                </div>
                
                <div class="user-avatar">RS</div>
            </div>
        </div>

     
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const mobileToggle = document.getElementById('mobileToggle');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const body = document.body;
            
            // Mobile toggle button event
            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                sidebarOverlay.classList.toggle('active');
                body.classList.toggle('sidebar-open');
                
                // Change icon based on state
                const icon = mobileToggle.querySelector('i');
                if (sidebar.classList.contains('open')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
            
            // Sidebar close button event
            sidebarClose.addEventListener('click', function() {
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('active');
                body.classList.remove('sidebar-open');
                
                // Reset toggle icon
                const icon = mobileToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
            
            // Close sidebar when clicking on overlay
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('active');
                body.classList.remove('sidebar-open');
                
                // Reset toggle icon
                const icon = mobileToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
            
            // Close sidebar when clicking on menu items (for mobile)
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 992) {
                        sidebar.classList.remove('open');
                        sidebarOverlay.classList.remove('active');
                        body.classList.remove('sidebar-open');
                        
                        // Reset toggle icon
                        const icon = mobileToggle.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            });
        });
    </script>
</body>
</html>