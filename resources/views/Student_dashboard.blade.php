
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - B.S.D.L.V. Inter College</title>
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
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
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: var(--primary);
            color: var(--white);
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
            left: 0;
            top: 0;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
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
            flex: 1;
            margin-left: 260px;
            transition: var(--transition);
        }

        .main-content.sidebar-collapsed {
            margin-left: 0;
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

        /* Page Content */
        .page-content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: var(--dark);
            opacity: 0.8;
            font-size: 1.1rem;
        }

        .page-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #153a6d;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #1e7e34;
            transform: translateY(-3px);
        }

        .btn-warning {
            background: var(--warning);
            color: var(--white);
        }

        .btn-warning:hover {
            background: #e59400;
            transform: translateY(-3px);
        }

        /* Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-attendance .stat-icon {
            background: rgba(26, 75, 140, 0.1);
            color: var(--primary);
        }

        .stat-grades .stat-icon {
            background: rgba(34, 139, 34, 0.1);
            color: var(--success);
        }

        .stat-assignments .stat-icon {
            background: rgba(255, 165, 0, 0.1);
            color: var(--warning);
        }

        .stat-events .stat-icon {
            background: rgba(220, 20, 60, 0.1);
            color: var(--danger);
        }

        .stat-content {
            flex: 1;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--dark);
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .trend-up {
            color: var(--success);
        }

        .trend-down {
            color: var(--danger);
        }

        /* Dashboard Content Grid */
        .dashboard-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        /* Today's Schedule */
        .schedule-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .schedule-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: var(--transition);
            border-left: 4px solid var(--primary);
        }

        .schedule-item:hover {
            background: var(--light);
        }

        .schedule-time {
            min-width: 100px;
            text-align: center;
            background: var(--light);
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            color: var(--primary);
        }

        .schedule-content {
            flex: 1;
        }

        .schedule-subject {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .schedule-details {
            font-size: 0.9rem;
            color: var(--dark);
            opacity: 0.8;
        }

        .schedule-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-upcoming {
            background: #e8f4fd;
            color: var(--primary);
        }

        .status-ongoing {
            background: #e8f8f0;
            color: var(--success);
        }

        .status-completed {
            background: #f0f0f0;
            color: var(--dark);
        }

        /* Upcoming Assignments */
        .assignments-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .assignments-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .assignment-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: var(--transition);
            border-left: 4px solid var(--warning);
        }

        .assignment-item:hover {
            background: var(--light);
        }

        .assignment-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 165, 0, 0.1);
            color: var(--warning);
        }

        .assignment-content {
            flex: 1;
        }

        .assignment-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .assignment-details {
            font-size: 0.9rem;
            color: var(--dark);
            opacity: 0.8;
            margin-bottom: 8px;
        }

        .assignment-deadline {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            color: var(--danger);
            font-weight: 600;
        }

        .btn-sm {
            padding: 8px 15px;
            font-size: 0.85rem;
        }

        /* Sidebar Content */
        .sidebar-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Recent Grades */
        .grades-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .grades-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .grade-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 15px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .grade-item:hover {
            background: var(--light);
        }

        .grade-subject {
            font-weight: 600;
        }

        .grade-score {
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .grade-excellent {
            background: #e8f8f0;
            color: var(--success);
        }

        .grade-good {
            background: #e8f4fd;
            color: var(--primary);
        }

        .grade-average {
            background: #fff3cd;
            color: var(--warning);
        }

        .grade-poor {
            background: #f8d7da;
            color: var(--danger);
        }

        /* Quick Links */
        .links-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .link-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px 15px;
            background: var(--light);
            border-radius: 8px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .link-item:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        .link-item:hover .link-icon {
            color: var(--white);
        }

        .link-icon {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .link-text {
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Announcements */
        .announcements-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .announcements-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .announcement-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .announcement-item:hover {
            background: var(--light);
        }

        .announcement-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light);
            color: var(--primary);
        }

        .announcement-content {
            flex: 1;
        }

        .announcement-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .announcement-text {
            font-size: 0.9rem;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .announcement-time {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.7;
        }

        /* Footer */
        .page-footer {
            text-align: center;
            padding: 20px;
            color: var(--dark);
            opacity: 0.7;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            margin-top: 40px;
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
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .dashboard-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .sidebar-close {
                display: block;
            }
            
            .search-bar {
                width: 200px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .page-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .search-bar {
                width: 150px;
            }
            
            .top-bar {
                padding: 15px 20px;
            }
            
            .user-details {
                display: none;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .page-content {
                padding: 20px 15px;
            }

            .links-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .search-bar {
                display: none;
            }
            
            .page-title {
                font-size: 1.8rem;
            }

            .page-actions {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
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
                <div class="logo-text">B.S.D.L.V. Student</div>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="sidebar-menu">
            <a href="#" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-calendar-alt"></i>
                <span class="menu-text">My Schedule</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-tasks"></i>
                <span class="menu-text">Assignments</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-chart-line"></i>
                <span class="menu-text">Grades</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-book"></i>
                <span class="menu-text">Study Materials</span>
            </a>
            
            <div class="menu-divider"></div>
            
            <a href="#" class="menu-item">
                <i class="fas fa-clipboard-check"></i>
                <span class="menu-text">Attendance</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-calendar-day"></i>
                <span class="menu-text">Timetable</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span class="menu-text">Settings</span>
            </a>
            
            <a href="#" class="menu-item">
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
                    <span class="notification-badge">3</span>
                </div>
                
                <div class="user-details">
                    <div class="user-name">Rahul Kumar</div>
                    <div class="user-role">Class 10 - A</div>
                </div>
                
                <div class="user-avatar">RK</div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Student Dashboard</h1>
                    <p class="page-subtitle">Welcome back, Rahul! Here's your academic overview for today.</p>
                </div>
                <div class="page-actions">
                    <button class="btn btn-primary" id="viewAssignmentsBtn">
                        <i class="fas fa-tasks"></i> View Assignments
                    </button>
                    <button class="btn btn-success" id="viewTimetableBtn">
                        <i class="fas fa-calendar-alt"></i> View Timetable
                    </button>
                </div>
            </div>

            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <div class="stat-card stat-attendance">
                    <div class="stat-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">94%</div>
                        <div class="stat-label">Attendance</div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+2% from last month</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card stat-grades">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">87%</div>
                        <div class="stat-label">Overall Grade</div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+5% from last term</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card stat-assignments">
                    <div class="stat-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Pending Assignments</div>
                        <div class="stat-trend">
                            <span>2 due this week</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card stat-events">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Upcoming Events</div>
                        <div class="stat-trend">
                            <span>Next: Science Fair</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements -->
            <div class="announcements-section">
                <div class="section-header">
                    <h2 class="section-title">Recent Announcements</h2>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-bullhorn"></i> View All
                    </button>
                </div>
                <div class="announcements-list">
                    <div class="announcement-item">
                        <div class="announcement-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="announcement-content">
                            <div class="announcement-title">Science Fair Registration</div>
                            <div class="announcement-text">Registration for the annual Science Fair is now open. Submit your project ideas by November 20th.</div>
                            <div class="announcement-time">Posted 2 hours ago by Dr. Sharma</div>
                        </div>
                    </div>
                    <div class="announcement-item">
                        <div class="announcement-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="announcement-content">
                            <div class="announcement-title">Library Hours Change</div>
                            <div class="announcement-text">The library will close early at 4 PM this Friday for maintenance work.</div>
                            <div class="announcement-time">Posted 1 day ago by Library Staff</div>
                        </div>
                    </div>
                    <div class="announcement-item">
                        <div class="announcement-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="announcement-content">
                            <div class="announcement-title">Math Olympiad Results</div>
                            <div class="announcement-text">Congratulations to all participants! Results are now available on the notice board.</div>
                            <div class="announcement-time">Posted 2 days ago by Math Department</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content Grid -->
            <div class="dashboard-content">
                <!-- Main Content -->
                <div class="main-dashboard">
                    <!-- Today's Schedule -->
                    <div class="schedule-section">
                        <div class="section-header">
                            <h2 class="section-title">Today's Schedule</h2>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-calendar"></i> Full Schedule
                            </button>
                        </div>
                        <div class="schedule-list">
                            <div class="schedule-item">
                                <div class="schedule-time">8:00 - 9:00</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Mathematics</div>
                                    <div class="schedule-details">Room: B-201 | Mr. Verma</div>
                                </div>
                                <div class="schedule-status status-completed">Completed</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">9:15 - 10:15</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Physics</div>
                                    <div class="schedule-details">Room: Science Lab-1 | Dr. Sharma</div>
                                </div>
                                <div class="schedule-status status-completed">Completed</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">10:30 - 11:30</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Chemistry</div>
                                    <div class="schedule-details">Room: Science Lab-2 | Mrs. Patel</div>
                                </div>
                                <div class="schedule-status status-ongoing">Ongoing</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">11:45 - 12:45</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">English</div>
                                    <div class="schedule-details">Room: B-203 | Ms. Singh</div>
                                </div>
                                <div class="schedule-status status-upcoming">Upcoming</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">1:30 - 2:30</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Computer Science</div>
                                    <div class="schedule-details">Room: Computer Lab | Mr. Gupta</div>
                                </div>
                                <div class="schedule-status status-upcoming">Upcoming</div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Assignments -->
                    <div class="assignments-section">
                        <div class="section-header">
                            <h2 class="section-title">Upcoming Assignments</h2>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-tasks"></i> View All
                            </button>
                        </div>
                        <div class="assignments-list">
                            <div class="assignment-item">
                                <div class="assignment-icon">
                                    <i class="fas fa-flask"></i>
                                </div>
                                <div class="assignment-content">
                                    <div class="assignment-title">Physics Lab Report</div>
                                    <div class="assignment-details">Optics Experiment - Reflection and Refraction</div>
                                    <div class="assignment-deadline">
                                        <i class="fas fa-clock"></i>
                                        Due: Tomorrow, 9:00 AM
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-upload"></i> Submit
                                </button>
                            </div>
                            <div class="assignment-item">
                                <div class="assignment-icon">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div class="assignment-content">
                                    <div class="assignment-title">Math Problem Set</div>
                                    <div class="assignment-details">Trigonometry - 20 problems</div>
                                    <div class="assignment-deadline">
                                        <i class="fas fa-clock"></i>
                                        Due: Nov 18, 2023
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Start
                                </button>
                            </div>
                            <div class="assignment-item">
                                <div class="assignment-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="assignment-content">
                                    <div class="assignment-title">English Essay</div>
                                    <div class="assignment-details">"Impact of Technology on Education" - 1000 words</div>
                                    <div class="assignment-deadline">
                                        <i class="fas fa-clock"></i>
                                        Due: Nov 22, 2023
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Start
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Recent Grades -->
                    <div class="grades-section">
                        <div class="section-header">
                            <h2 class="section-title">Recent Grades</h2>
                        </div>
                        <div class="grades-list">
                            <div class="grade-item">
                                <div class="grade-subject">Mathematics</div>
                                <div class="grade-score grade-excellent">92%</div>
                            </div>
                            <div class="grade-item">
                                <div class="grade-subject">Physics</div>
                                <div class="grade-score grade-good">85%</div>
                            </div>
                            <div class="grade-item">
                                <div class="grade-subject">Chemistry</div>
                                <div class="grade-score grade-average">78%</div>
                            </div>
                            <div class="grade-item">
                                <div class="grade-subject">English</div>
                                <div class="grade-score grade-good">88%</div>
                            </div>
                            <div class="grade-item">
                                <div class="grade-subject">Computer Science</div>
                                <div class="grade-score grade-excellent">95%</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="links-section">
                        <div class="section-header">
                            <h2 class="section-title">Quick Links</h2>
                        </div>
                        <div class="links-grid">
                            <a href="#" class="link-item" id="timetableLink">
                                <div class="link-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="link-text">Timetable</div>
                            </a>
                            <a href="#" class="link-item" id="assignmentsLink">
                                <div class="link-icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="link-text">Assignments</div>
                            </a>
                            <a href="#" class="link-item" id="gradesLink">
                                <div class="link-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="link-text">Grades</div>
                            </a>
                            <a href="#" class="link-item" id="materialsLink">
                                <div class="link-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="link-text">Study Materials</div>
                            </a>
                            <a href="#" class="link-item" id="attendanceLink">
                                <div class="link-icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div class="link-text">Attendance</div>
                            </a>
                            <a href="#" class="link-item" id="libraryLink">
                                <div class="link-icon">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                                <div class="link-text">Library</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="page-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Student Dashboard v1.0</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const mobileToggle = document.getElementById('mobileToggle');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            // Toggle sidebar function
            function toggleSidebar() {
                sidebar.classList.toggle('open');
                mainContent.classList.toggle('sidebar-collapsed');
                sidebarOverlay.classList.toggle('active');
                
                // Change icon based on state
                const icon = mobileToggle.querySelector('i');
                if (sidebar.classList.contains('open')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
            
            // Close sidebar function
            function closeSidebar() {
                sidebar.classList.remove('open');
                mainContent.classList.remove('sidebar-collapsed');
                sidebarOverlay.classList.remove('active');
                
                // Reset toggle icon
                const icon = mobileToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
            
            // Mobile toggle button event
            mobileToggle.addEventListener('click', toggleSidebar);
            
            // Sidebar close button event
            sidebarClose.addEventListener('click', closeSidebar);
            
            // Close sidebar when clicking on overlay
            sidebarOverlay.addEventListener('click', closeSidebar);
            
            // Close sidebar when clicking on menu items (for mobile)
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 992) {
                        closeSidebar();
                    }
                });
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    // On larger screens, ensure sidebar is visible
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('sidebar-collapsed');
                    sidebarOverlay.classList.remove('active');
                    
                    // Reset toggle icon
                    const icon = mobileToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    // On smaller screens, ensure sidebar is hidden by default
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('sidebar-collapsed');
                    sidebarOverlay.classList.remove('active');
                    
                    // Reset toggle icon
                    const icon = mobileToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // Action button functionality
            document.getElementById('viewAssignmentsBtn').addEventListener('click', function() {
                alert('Redirecting to assignments page...');
            });

            document.getElementById('viewTimetableBtn').addEventListener('click', function() {
                alert('Redirecting to timetable page...');
            });

            // Assignment buttons
            document.querySelectorAll('.assignments-list .btn').forEach(button => {
                button.addEventListener('click', function() {
                    const assignmentItem = this.closest('.assignment-item');
                    const assignmentTitle = assignmentItem.querySelector('.assignment-title').textContent;
                    
                    if (this.querySelector('.fa-upload')) {
                        alert(`Submitting assignment: ${assignmentTitle}`);
                    } else if (this.querySelector('.fa-edit')) {
                        alert(`Starting work on: ${assignmentTitle}`);
                    }
                });
            });

            // Quick links functionality
            document.getElementById('timetableLink').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Redirecting to timetable...');
            });

            document.getElementById('assignmentsLink').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Redirecting to assignments...');
            });

            document.getElementById('gradesLink').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Redirecting to grades...');
            });

            document.getElementById('materialsLink').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Redirecting to study materials...');
            });

            document.getElementById('attendanceLink').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Redirecting to attendance...');
            });

            document.getElementById('libraryLink').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Redirecting to library...');
            });
        });
    </script>
</body>
</html>