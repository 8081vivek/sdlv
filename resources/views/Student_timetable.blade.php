@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Time Table - B.S.D.L.V. Inter College</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        /* Dashboard Content */
        .dashboard-content {
            padding: 30px;
            flex: 1;
        }

        .page-header {
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

        /* Student Info Card */
        .student-info-card {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .student-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
            font-weight: 600;
        }

        .student-details {
            flex: 1;
        }

        .student-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .student-class {
            font-size: 1.1rem;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .student-id {
            display: flex;
            gap: 15px;
            font-size: 0.9rem;
            color: var(--dark);
            opacity: 0.8;
        }

        /* Time Table Section */
        .time-table-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
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

        .time-table-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .day-selector {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
            background: var(--white);
            cursor: pointer;
        }

        .print-btn {
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .print-btn:hover {
            background: var(--secondary);
        }

        /* Today's Schedule */
        .today-schedule {
            background: var(--light);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            border-left: 4px solid var(--primary);
        }

        .today-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .today-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .today-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--primary);
        }

        .today-date {
            color: var(--dark);
            opacity: 0.8;
        }

        .periods-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .period-card {
            background: var(--white);
            border-radius: 6px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .period-time {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.9rem;
            min-width: 80px;
        }

        .period-details {
            flex: 1;
        }

        .period-subject {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 3px;
        }

        .period-teacher {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.8;
        }

        .period-room {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.8;
        }

        /* Weekly Time Table */
        .time-table-container {
            overflow-x: auto;
        }

        .time-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .time-table th, .time-table td {
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            text-align: center;
        }

        .time-table th {
            background-color: var(--primary);
            color: var(--white);
            font-weight: 600;
            position: sticky;
            top: 0;
        }

        .time-table th:first-child {
            background-color: var(--secondary);
        }

        .time-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .time-table tr:hover {
            background-color: #f0f7ff;
        }

        .period-header {
            background-color: var(--secondary) !important;
            color: var(--white);
            font-weight: 600;
        }

        .time-slot {
            min-height: 80px;
            vertical-align: top;
            position: relative;
        }

        .subject-card {
            background: var(--light);
            border-radius: 6px;
            padding: 8px;
            margin-bottom: 5px;
            border-left: 3px solid var(--primary);
        }

        .subject-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.9rem;
        }

        .teacher-name {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.8;
        }

        .room-number {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.8;
        }

        .current-period {
            background: #e8f5e9;
            border-left: 3px solid var(--success);
        }

        /* Subject Summary */
        .subject-summary {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .subject-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: var(--light);
            border-radius: 8px;
            transition: var(--transition);
        }

        .subject-item:hover {
            background: #e3efff;
            transform: translateY(-3px);
        }

        .subject-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        .subject-info {
            flex: 1;
        }

        .subject-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 3px;
        }

        .subject-count {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.8;
        }

        /* Footer */
        .dashboard-footer {
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
            .search-bar {
                width: 250px;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 280px;
                transform: translateX(-100%);
                z-index: 1000;
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
            
            .search-bar {
                width: 200px;
            }
            
            .section-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .time-table-controls {
                width: 100%;
                justify-content: space-between;
            }
            
            .periods-list {
                grid-template-columns: 1fr;
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
            
            .student-info-card {
                flex-direction: column;
                text-align: center;
            }
            
            .student-id {
                justify-content: center;
            }
            
            .time-table-controls {
                flex-direction: column;
                gap: 10px;
            }
            
            .day-selector, .print-btn {
                width: 100%;
            }
            
            .summary-grid {
                grid-template-columns: 1fr;
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
            
            .time-table th, .time-table td {
                padding: 8px 10px;
                font-size: 0.9rem;
            }
            
            .student-name {
                font-size: 1.5rem;
            }
        }

        /* Add this for laptop screens - Sidebar always visible */
        @media (min-width: 993px) {
            .sidebar {
                transform: translateX(0) !important;
            }
            
            .main-content {
                margin-left: 260px !important;
            }
            
            .mobile-toggle {
                display: none !important;
            }
            
            .sidebar-close {
                display: none !important;
            }
            
            .sidebar-overlay {
                display: none !important;
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
                <div class="logo-text">SDLV Admin</div>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="sidebar-menu">
            <a href="#" class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-user-graduate"></i>
                <span class="menu-text">Students</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="menu-text">Teachers</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-book"></i>
                <span class="menu-text">Courses</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-calendar-alt"></i>
                <span class="menu-text">Attendance</span>
            </a>
            
            <a href="#" class="menu-item active">
                <i class="fas fa-clock"></i>
                <span class="menu-text">Time Table</span>
            </a>
            
            <div class="menu-divider"></div>
            
            <a href="#" class="menu-item">
                <i class="fas fa-bullhorn"></i>
                <span class="menu-text">Important Notices</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span class="menu-text">Reports</span>
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
                <div class="user-details">
                    <div class="user-name">Rahul Kumar</div>
                    <div class="user-role">Student - Class 10-A</div>
                </div>
                
                <div class="user-avatar">RK</div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">My Time Table</h1>
                <p class="page-subtitle">View your daily and weekly class schedule</p>
            </div>

            <!-- Student Info Card -->
            <div class="student-info-card">
                <div class="student-avatar">RK</div>
                <div class="student-details">
                    <h2 class="student-name">Rahul Kumar</h2>
                    <p class="student-class">Class 10-A | Roll No: 25</p>
                    <div class="student-id">
                        <span><strong>Student ID:</strong> STU202310025</span>
                        <span><strong>Academic Year:</strong> 2023-24</span>
                    </div>
                </div>
            </div>

            <!-- Time Table Section -->
            <div class="time-table-section">
                <div class="section-header">
                    <h2 class="section-title">Weekly Schedule</h2>
                    <div class="time-table-controls">
                        <select class="day-selector" id="daySelector">
                            <option value="all">All Days</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        <button class="print-btn" id="printBtn">
                            <i class="fas fa-print"></i> Print Time Table
                        </button>
                    </div>
                </div>
                
                <!-- Today's Schedule -->
                <div class="today-schedule">
                    <div class="today-header">
                        <div class="today-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div>
                            <h3 class="today-title">Today's Schedule</h3>
                            <p class="today-date" id="todayDate">Monday, November 20, 2023</p>
                        </div>
                    </div>
                    <div class="periods-list" id="todayPeriods">
                        <!-- Today's periods will be populated by JavaScript -->
                    </div>
                </div>
                
                <!-- Weekly Time Table -->
                <div class="time-table-container">
                    <table class="time-table" id="timeTable">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                            </tr>
                        </thead>
                        <tbody id="timeTableBody">
                            <!-- Time table will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Subject Summary -->
            <div class="subject-summary">
                <h2 class="section-title">Subject Summary</h2>
                <p class="page-subtitle">Overview of all subjects in your curriculum</p>
                
                <div class="summary-grid" id="subjectSummary">
                    <!-- Subject summary will be populated by JavaScript -->
                </div>
            </div>

            <!-- Footer -->
            <div class="dashboard-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Student Portal v2.1</p>
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
            const daySelector = document.getElementById('daySelector');
            const printBtn = document.getElementById('printBtn');
            const timeTableBody = document.getElementById('timeTableBody');
            const todayDate = document.getElementById('todayDate');
            const todayPeriods = document.getElementById('todayPeriods');
            const subjectSummary = document.getElementById('subjectSummary');
            
            // Sample time table data for Class 10-A
            const timeTableData = {
                "Monday": {
                    "1": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101", time: "8:00 - 8:45" },
                    "2": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1", time: "8:45 - 9:30" },
                    "3": { subject: "English", teacher: "Mr. Kumar", room: "102", time: "9:30 - 10:15" },
                    "4": { subject: "Hindi", teacher: "Ms. Gupta", room: "103", time: "10:15 - 11:00" },
                    "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104", time: "11:15 - 12:00" },
                    "6": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2", time: "12:00 - 12:45" },
                    "7": { subject: "Physical Education", teacher: "Mr. Verma", room: "Ground", time: "12:45 - 1:30" },
                    "8": { subject: "Art", teacher: "Ms. Joshi", room: "Art Room", time: "1:30 - 2:15" }
                },
                "Tuesday": {
                    "1": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1", time: "8:00 - 8:45" },
                    "2": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101", time: "8:45 - 9:30" },
                    "3": { subject: "Hindi", teacher: "Ms. Gupta", room: "103", time: "9:30 - 10:15" },
                    "4": { subject: "English", teacher: "Mr. Kumar", room: "102", time: "10:15 - 11:00" },
                    "5": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2", time: "11:15 - 12:00" },
                    "6": { subject: "Social Studies", teacher: "Mr. Singh", room: "104", time: "12:00 - 12:45" },
                    "7": { subject: "Music", teacher: "Mr. Das", room: "Music Room", time: "12:45 - 1:30" },
                    "8": { subject: "", teacher: "", room: "", time: "1:30 - 2:15" }
                },
                "Wednesday": {
                    "1": { subject: "English", teacher: "Mr. Kumar", room: "102", time: "8:00 - 8:45" },
                    "2": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101", time: "8:45 - 9:30" },
                    "3": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1", time: "9:30 - 10:15" },
                    "4": { subject: "Social Studies", teacher: "Mr. Singh", room: "104", time: "10:15 - 11:00" },
                    "5": { subject: "Hindi", teacher: "Ms. Gupta", room: "103", time: "11:15 - 12:00" },
                    "6": { subject: "Physical Education", teacher: "Mr. Verma", room: "Ground", time: "12:00 - 12:45" },
                    "7": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2", time: "12:45 - 1:30" },
                    "8": { subject: "", teacher: "", room: "", time: "1:30 - 2:15" }
                },
                "Thursday": {
                    "1": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101", time: "8:00 - 8:45" },
                    "2": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1", time: "8:45 - 9:30" },
                    "3": { subject: "English", teacher: "Mr. Kumar", room: "102", time: "9:30 - 10:15" },
                    "4": { subject: "Hindi", teacher: "Ms. Gupta", room: "103", time: "10:15 - 11:00" },
                    "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104", time: "11:15 - 12:00" },
                    "6": { subject: "Art", teacher: "Ms. Joshi", room: "Art Room", time: "12:00 - 12:45" },
                    "7": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2", time: "12:45 - 1:30" },
                    "8": { subject: "", teacher: "", room: "", time: "1:30 - 2:15" }
                },
                "Friday": {
                    "1": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1", time: "8:00 - 8:45" },
                    "2": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101", time: "8:45 - 9:30" },
                    "3": { subject: "Hindi", teacher: "Ms. Gupta", room: "103", time: "9:30 - 10:15" },
                    "4": { subject: "English", teacher: "Mr. Kumar", room: "102", time: "10:15 - 11:00" },
                    "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104", time: "11:15 - 12:00" },
                    "6": { subject: "Physical Education", teacher: "Mr. Verma", room: "Ground", time: "12:00 - 12:45" },
                    "7": { subject: "Music", teacher: "Mr. Das", room: "Music Room", time: "12:45 - 1:30" },
                    "8": { subject: "", teacher: "", room: "", time: "1:30 - 2:15" }
                },
                "Saturday": {
                    "1": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101", time: "8:00 - 8:45" },
                    "2": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1", time: "8:45 - 9:30" },
                    "3": { subject: "English", teacher: "Mr. Kumar", room: "102", time: "9:30 - 10:15" },
                    "4": { subject: "Hindi", teacher: "Ms. Gupta", room: "103", time: "10:15 - 11:00" },
                    "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104", time: "11:15 - 12:00" },
                    "6": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2", time: "12:00 - 12:45" },
                    "7": { subject: "", teacher: "", room: "", time: "12:45 - 1:30" },
                    "8": { subject: "", teacher: "", room: "", time: "1:30 - 2:15" }
                }
            };
            
            const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            const periods = [
                "8:00 - 8:45",
                "8:45 - 9:30", 
                "9:30 - 10:15",
                "10:15 - 11:00",
                "11:15 - 12:00",
                "12:00 - 12:45",
                "12:45 - 1:30",
                "1:30 - 2:15"
            ];
            
            const subjectColors = {
                "Mathematics": "#1a4b8c",
                "Science": "#8B4513",
                "English": "#228B22",
                "Hindi": "#B22222",
                "Social Studies": "#FFA500",
                "Computer Science": "#DC143C",
                "Physical Education": "#2c3e50",
                "Art": "#8e44ad",
                "Music": "#16a085"
            };
            
            // Only enable mobile toggle functionality on mobile screens
            function isMobileScreen() {
                return window.innerWidth <= 992;
            }
            
            // Toggle sidebar function
            function toggleSidebar() {
                if (!isMobileScreen()) return;
                
                sidebar.classList.toggle('open');
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
                if (!isMobileScreen()) return;
                
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('active');
                
                // Reset toggle icon
                const icon = mobileToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
            
            // Get current day of the week
            function getCurrentDay() {
                const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                const today = new Date();
                return days[today.getDay()];
            }
            
            // Format today's date
            function formatTodayDate() {
                const today = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return today.toLocaleDateString('en-US', options);
            }
            
            // Render today's schedule
            function renderTodaySchedule() {
                todayDate.textContent = formatTodayDate();
                todayPeriods.innerHTML = '';
                
                const today = getCurrentDay();
                const todaySchedule = timeTableData[today];
                
                if (!todaySchedule) {
                    todayPeriods.innerHTML = '<p>No classes scheduled for today.</p>';
                    return;
                }
                
                for (let i = 1; i <= 8; i++) {
                    const period = todaySchedule[i.toString()];
                    
                    if (period && period.subject) {
                        const periodCard = document.createElement('div');
                        periodCard.className = 'period-card';
                        
                        // Check if this is the current period (for demo, we'll assume period 3 is current)
                        if (i === 3) {
                            periodCard.classList.add('current-period');
                        }
                        
                        periodCard.innerHTML = `
                            <div class="period-time">${period.time}</div>
                            <div class="period-details">
                                <div class="period-subject">${period.subject}</div>
                                <div class="period-teacher">${period.teacher}</div>
                                <div class="period-room">Room: ${period.room}</div>
                            </div>
                        `;
                        
                        todayPeriods.appendChild(periodCard);
                    }
                }
            }
            
            // Render time table
            function renderTimeTable(selectedDay = 'all') {
                timeTableBody.innerHTML = '';
                
                for (let i = 0; i < periods.length; i++) {
                    const periodNum = (i + 1).toString();
                    const row = document.createElement('tr');
                    
                    // Period header
                    const periodHeader = document.createElement('td');
                    periodHeader.className = 'period-header';
                    periodHeader.textContent = `Period ${periodNum} (${periods[i]})`;
                    row.appendChild(periodHeader);
                    
                    // Add cells for each day
                    days.forEach(day => {
                        // Skip this day if we're filtering by a specific day
                        if (selectedDay !== 'all' && day !== selectedDay) {
                            return;
                        }
                        
                        const cell = document.createElement('td');
                        cell.className = 'time-slot';
                        
                        const slotData = timeTableData[day] ? timeTableData[day][periodNum] : null;
                        
                        if (slotData && slotData.subject) {
                            const subjectCard = document.createElement('div');
                            subjectCard.className = 'subject-card';
                            subjectCard.innerHTML = `
                                <div class="subject-name">${slotData.subject}</div>
                                <div class="teacher-name">${slotData.teacher}</div>
                                <div class="room-number">${slotData.room}</div>
                            `;
                            cell.appendChild(subjectCard);
                        } else {
                            const emptySlot = document.createElement('div');
                            emptySlot.className = 'empty-slot';
                            emptySlot.textContent = 'Free Period';
                            cell.appendChild(emptySlot);
                        }
                        
                        row.appendChild(cell);
                    });
                    
                    timeTableBody.appendChild(row);
                }
            }
            
            // Render subject summary
            function renderSubjectSummary() {
                subjectSummary.innerHTML = '';
                
                // Count subjects per week
                const subjectCount = {};
                
                days.forEach(day => {
                    for (let periodNum = 1; periodNum <= 8; periodNum++) {
                        const slotData = timeTableData[day] ? timeTableData[day][periodNum.toString()] : null;
                        if (slotData && slotData.subject) {
                            if (!subjectCount[slotData.subject]) {
                                subjectCount[slotData.subject] = 0;
                            }
                            subjectCount[slotData.subject]++;
                        }
                    }
                });
                
                // Create subject items
                Object.keys(subjectCount).forEach(subject => {
                    const subjectItem = document.createElement('div');
                    subjectItem.className = 'subject-item';
                    
                    subjectItem.innerHTML = `
                        <div class="subject-color" style="background-color: ${subjectColors[subject] || '#1a4b8c'};"></div>
                        <div class="subject-info">
                            <div class="subject-title">${subject}</div>
                            <div class="subject-count">${subjectCount[subject]} periods per week</div>
                        </div>
                    `;
                    
                    subjectSummary.appendChild(subjectItem);
                });
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
                    if (isMobileScreen()) {
                        closeSidebar();
                    }
                });
            });
            
            // Day selector event
            daySelector.addEventListener('change', function() {
                renderTimeTable(this.value);
            });
            
            // Print button event
            printBtn.addEventListener('click', function() {
                window.print();
            });
            
            // Initial render
            renderTodaySchedule();
            renderTimeTable();
            renderSubjectSummary();
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (!isMobileScreen()) {
                    // On larger screens, ensure sidebar is visible and mobile features are disabled
                    sidebar.classList.remove('open');
                    sidebarOverlay.classList.remove('active');
                    
                    // Reset toggle icon
                    const icon = mobileToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        });
    </script>
</body>
</html>