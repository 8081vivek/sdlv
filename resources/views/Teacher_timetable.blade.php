@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - B.S.D.L.V. Inter College</title>
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

        /* Time Table Management Section */
        .time-table-management {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .time-table-header {
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

        .class-selector, .section-selector {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
            background: var(--white);
            cursor: pointer;
        }

        .add-slot-btn {
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

        .add-slot-btn:hover {
            background: var(--secondary);
        }

        /* Time Table Grid */
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
            cursor: pointer;
            transition: var(--transition);
        }

        .subject-card:hover {
            background: #e3efff;
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

        .empty-slot {
            color: #999;
            font-style: italic;
            font-size: 0.9rem;
        }

        .slot-actions {
            position: absolute;
            top: 5px;
            right: 5px;
            display: none;
        }

        .time-slot:hover .slot-actions {
            display: flex;
            gap: 5px;
        }

        .slot-action {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 4px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.8rem;
            transition: var(--transition);
        }

        .slot-action.edit {
            color: var(--primary);
        }

        .slot-action.delete {
            color: var(--danger);
        }

        .slot-action:hover {
            background: var(--white);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--white);
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
            padding: 5px;
        }

        .modal-close:hover {
            color: var(--danger);
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
            background: var(--white);
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .modal-footer {
            padding: 20px 25px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--secondary);
        }

        .btn-secondary {
            background: var(--light);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background: #e0e0e0;
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
            .content-grid {
                grid-template-columns: 1fr;
            }
            
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
            
            .time-table-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .time-table-controls {
                width: 100%;
                justify-content: space-between;
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
            
            .time-table-controls {
                flex-direction: column;
                gap: 10px;
            }
            
            .class-selector, .section-selector, .add-slot-btn {
                width: 100%;
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
            
            .modal-content {
                width: 95%;
            }
            
            .time-table th, .time-table td {
                padding: 8px 10px;
                font-size: 0.9rem;
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
    @include('Admin_sidebar')

         
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Time Table Management</h1>
                <p class="page-subtitle">Create and manage class schedules for all grades</p>
            </div>

            <!-- Time Table Management Section -->
            <div class="time-table-management">
                <div class="time-table-header">
                    <h2 class="section-title">Class 10-A Weekly Schedule</h2>
                    <div class="time-table-controls">
                        <select class="class-selector" id="classSelector">
                            <option value="10">Class 10</option>
                            <option value="9">Class 9</option>
                            <option value="8">Class 8</option>
                            <option value="7">Class 7</option>
                            <option value="6">Class 6</option>
                        </select>
                        <select class="section-selector" id="sectionSelector">
                            <option value="A">Section A</option>
                            <option value="B">Section B</option>
                            <option value="C">Section C</option>
                        </select>
                        <button class="add-slot-btn" id="addSlotBtn">
                            <i class="fas fa-plus"></i> Add Class
                        </button>
                    </div>
                </div>
                
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

            <!-- Footer -->
            <div class="dashboard-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Admin Dashboard v2.1</p>
            </div>
        </div>
    </div>

    <!-- Add/Edit Time Slot Modal -->
    <div class="modal" id="timeSlotModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Add Class Schedule</h3>
                <button class="modal-close" id="modalClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="timeSlotForm">
                    <div class="form-group">
                        <label for="slotDay" class="form-label">Day</label>
                        <select id="slotDay" class="form-select" required>
                            <option value="">Select Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="slotPeriod" class="form-label">Period</label>
                        <select id="slotPeriod" class="form-select" required>
                            <option value="">Select Period</option>
                            <option value="1">Period 1 (8:00 - 8:45)</option>
                            <option value="2">Period 2 (8:45 - 9:30)</option>
                            <option value="3">Period 3 (9:30 - 10:15)</option>
                            <option value="4">Period 4 (10:15 - 11:00)</option>
                            <option value="5">Period 5 (11:15 - 12:00)</option>
                            <option value="6">Period 6 (12:00 - 12:45)</option>
                            <option value="7">Period 7 (12:45 - 1:30)</option>
                            <option value="8">Period 8 (1:30 - 2:15)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="slotSubject" class="form-label">Subject</label>
                        <select id="slotSubject" class="form-select" required>
                            <option value="">Select Subject</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Social Studies">Social Studies</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Physical Education">Physical Education</option>
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="slotTeacher" class="form-label">Teacher</label>
                        <select id="slotTeacher" class="form-select" required>
                            <option value="">Select Teacher</option>
                            <option value="Mr. Sharma">Mr. Sharma</option>
                            <option value="Ms. Patel">Ms. Patel</option>
                            <option value="Mr. Kumar">Mr. Kumar</option>
                            <option value="Ms. Gupta">Ms. Gupta</option>
                            <option value="Mr. Singh">Mr. Singh</option>
                            <option value="Ms. Reddy">Ms. Reddy</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="slotRoom" class="form-label">Room Number</label>
                        <input type="text" id="slotRoom" class="form-control" placeholder="Enter room number">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveSlotBtn">Save Schedule</button>
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
            const addSlotBtn = document.getElementById('addSlotBtn');
            const timeSlotModal = document.getElementById('timeSlotModal');
            const modalClose = document.getElementById('modalClose');
            const cancelBtn = document.getElementById('cancelBtn');
            const saveSlotBtn = document.getElementById('saveSlotBtn');
            const timeSlotForm = document.getElementById('timeSlotForm');
            const modalTitle = document.getElementById('modalTitle');
            const timeTableBody = document.getElementById('timeTableBody');
            const classSelector = document.getElementById('classSelector');
            const sectionSelector = document.getElementById('sectionSelector');
            
            // Sample time table data
            let timeTableData = {
                "10-A": {
                    "Monday": {
                        "1": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101" },
                        "2": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1" },
                        "3": { subject: "English", teacher: "Mr. Kumar", room: "102" },
                        "4": { subject: "Hindi", teacher: "Ms. Gupta", room: "103" },
                        "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104" },
                        "6": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2" },
                        "7": { subject: "Physical Education", teacher: "Mr. Verma", room: "Ground" },
                        "8": { subject: "Art", teacher: "Ms. Joshi", room: "Art Room" }
                    },
                    "Tuesday": {
                        "1": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1" },
                        "2": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101" },
                        "3": { subject: "Hindi", teacher: "Ms. Gupta", room: "103" },
                        "4": { subject: "English", teacher: "Mr. Kumar", room: "102" },
                        "5": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2" },
                        "6": { subject: "Social Studies", teacher: "Mr. Singh", room: "104" },
                        "7": { subject: "Music", teacher: "Mr. Das", room: "Music Room" },
                        "8": { subject: "", teacher: "", room: "" }
                    },
                    "Wednesday": {
                        "1": { subject: "English", teacher: "Mr. Kumar", room: "102" },
                        "2": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101" },
                        "3": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1" },
                        "4": { subject: "Social Studies", teacher: "Mr. Singh", room: "104" },
                        "5": { subject: "Hindi", teacher: "Ms. Gupta", room: "103" },
                        "6": { subject: "Physical Education", teacher: "Mr. Verma", room: "Ground" },
                        "7": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2" },
                        "8": { subject: "", teacher: "", room: "" }
                    },
                    "Thursday": {
                        "1": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101" },
                        "2": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1" },
                        "3": { subject: "English", teacher: "Mr. Kumar", room: "102" },
                        "4": { subject: "Hindi", teacher: "Ms. Gupta", room: "103" },
                        "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104" },
                        "6": { subject: "Art", teacher: "Ms. Joshi", room: "Art Room" },
                        "7": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2" },
                        "8": { subject: "", teacher: "", room: "" }
                    },
                    "Friday": {
                        "1": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1" },
                        "2": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101" },
                        "3": { subject: "Hindi", teacher: "Ms. Gupta", room: "103" },
                        "4": { subject: "English", teacher: "Mr. Kumar", room: "102" },
                        "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104" },
                        "6": { subject: "Physical Education", teacher: "Mr. Verma", room: "Ground" },
                        "7": { subject: "Music", teacher: "Mr. Das", room: "Music Room" },
                        "8": { subject: "", teacher: "", room: "" }
                    },
                    "Saturday": {
                        "1": { subject: "Mathematics", teacher: "Mr. Sharma", room: "101" },
                        "2": { subject: "Science", teacher: "Ms. Patel", room: "Lab 1" },
                        "3": { subject: "English", teacher: "Mr. Kumar", room: "102" },
                        "4": { subject: "Hindi", teacher: "Ms. Gupta", room: "103" },
                        "5": { subject: "Social Studies", teacher: "Mr. Singh", room: "104" },
                        "6": { subject: "Computer Science", teacher: "Ms. Reddy", room: "Lab 2" },
                        "7": { subject: "", teacher: "", room: "" },
                        "8": { subject: "", teacher: "", room: "" }
                    }
                }
            };
            
            let currentEditSlot = null;
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
            
            // Only enable mobile toggle functionality on mobile screens
            // function isMobileScreen() {
            //     return window.innerWidth <= 992;
            // }
            
            // Toggle sidebar function
            // function toggleSidebar() {
            //     if (!isMobileScreen()) return;
                
            //     sidebar.classList.toggle('open');
            //     sidebarOverlay.classList.toggle('active');
                
                // Change icon based on state
            //     const icon = mobileToggle.querySelector('i');
            //     if (sidebar.classList.contains('open')) {
            //         icon.classList.remove('fa-bars');
            //         icon.classList.add('fa-times');
            //     } else {
            //         icon.classList.remove('fa-times');
            //         icon.classList.add('fa-bars');
            //     }
            // }
            
            // Close sidebar function
            // function closeSidebar() {
            //     if (!isMobileScreen()) return;
                
            //     sidebar.classList.remove('open');
            //     sidebarOverlay.classList.remove('active');
                
            //     // Reset toggle icon
            //     const icon = mobileToggle.querySelector('i');
            //     icon.classList.remove('fa-times');
            //     icon.classList.add('fa-bars');
            // }
            
            // Get current class and section
            function getCurrentClassSection() {
                const classVal = classSelector.value;
                const sectionVal = sectionSelector.value;
                return `${classVal}-${sectionVal}`;
            }
            
            // Open time slot modal
            function openTimeSlotModal(editSlot = null) {
                currentEditSlot = editSlot;
                
                if (editSlot) {
                    // Edit mode
                    modalTitle.textContent = 'Edit Class Schedule';
                    
                    document.getElementById('slotDay').value = editSlot.day;
                    document.getElementById('slotPeriod').value = editSlot.period;
                    document.getElementById('slotSubject').value = editSlot.subject;
                    document.getElementById('slotTeacher').value = editSlot.teacher;
                    document.getElementById('slotRoom').value = editSlot.room;
                    
                    // Disable day and period selection in edit mode
                    document.getElementById('slotDay').disabled = true;
                    document.getElementById('slotPeriod').disabled = true;
                } else {
                    // Add mode
                    modalTitle.textContent = 'Add Class Schedule';
                    timeSlotForm.reset();
                    
                    // Enable day and period selection
                    document.getElementById('slotDay').disabled = false;
                    document.getElementById('slotPeriod').disabled = false;
                }
                
                timeSlotModal.classList.add('active');
            }
            
            // Close time slot modal
            function closeTimeSlotModal() {
                timeSlotModal.classList.remove('active');
                currentEditSlot = null;
            }
            
            // Save time slot
            function saveTimeSlot() {
                const day = document.getElementById('slotDay').value;
                const period = document.getElementById('slotPeriod').value;
                const subject = document.getElementById('slotSubject').value;
                const teacher = document.getElementById('slotTeacher').value;
                const room = document.getElementById('slotRoom').value;
                
                if (!day || !period || !subject || !teacher) {
                    alert('Please fill in all required fields');
                    return;
                }
                
                const classSection = getCurrentClassSection();
                
                // Initialize class section if it doesn't exist
                if (!timeTableData[classSection]) {
                    timeTableData[classSection] = {};
                }
                
                // Initialize day if it doesn't exist
                if (!timeTableData[classSection][day]) {
                    timeTableData[classSection][day] = {};
                }
                
                // Save the time slot
                timeTableData[classSection][day][period] = {
                    subject,
                    teacher,
                    room
                };
                
                renderTimeTable();
                closeTimeSlotModal();
            }
            
            // Delete time slot
            function deleteTimeSlot(day, period) {
                if (confirm('Are you sure you want to delete this class schedule?')) {
                    const classSection = getCurrentClassSection();
                    
                    if (timeTableData[classSection] && timeTableData[classSection][day]) {
                        timeTableData[classSection][day][period] = {
                            subject: "",
                            teacher: "",
                            room: ""
                        };
                        renderTimeTable();
                    }
                }
            }
            
            // Render time table
            function renderTimeTable() {
                timeTableBody.innerHTML = '';
                const classSection = getCurrentClassSection();
                const classData = timeTableData[classSection] || {};
                
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
                        const cell = document.createElement('td');
                        cell.className = 'time-slot';
                        
                        const slotData = classData[day] ? classData[day][periodNum] : null;
                        
                        if (slotData && slotData.subject) {
                            const subjectCard = document.createElement('div');
                            subjectCard.className = 'subject-card';
                            subjectCard.innerHTML = `
                                <div class="subject-name">${slotData.subject}</div>
                                <div class="teacher-name">${slotData.teacher}</div>
                                <div class="teacher-name">${slotData.room}</div>
                            `;
                            
                            subjectCard.addEventListener('click', () => {
                                openTimeSlotModal({
                                    day,
                                    period: periodNum,
                                    subject: slotData.subject,
                                    teacher: slotData.teacher,
                                    room: slotData.room
                                });
                            });
                            
                            cell.appendChild(subjectCard);
                            
                            // Add action buttons
                            const actions = document.createElement('div');
                            actions.className = 'slot-actions';
                            actions.innerHTML = `
                                <button class="slot-action edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="slot-action delete" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            `;
                            
                            actions.querySelector('.edit').addEventListener('click', (e) => {
                                e.stopPropagation();
                                openTimeSlotModal({
                                    day,
                                    period: periodNum,
                                    subject: slotData.subject,
                                    teacher: slotData.teacher,
                                    room: slotData.room
                                });
                            });
                            
                            actions.querySelector('.delete').addEventListener('click', (e) => {
                                e.stopPropagation();
                                deleteTimeSlot(day, periodNum);
                            });
                            
                            cell.appendChild(actions);
                        } else {
                            const emptySlot = document.createElement('div');
                            emptySlot.className = 'empty-slot';
                            emptySlot.textContent = 'Free Period';
                            emptySlot.addEventListener('click', () => {
                                openTimeSlotModal({
                                    day,
                                    period: periodNum,
                                    subject: "",
                                    teacher: "",
                                    room: ""
                                });
                            });
                            cell.appendChild(emptySlot);
                        }
                        
                        row.appendChild(cell);
                    });
                    
                    timeTableBody.appendChild(row);
                }
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
            
            // Add slot button event
            addSlotBtn.addEventListener('click', () => openTimeSlotModal());
            
            // Modal close events
            modalClose.addEventListener('click', closeTimeSlotModal);
            cancelBtn.addEventListener('click', closeTimeSlotModal);
            
            // Save slot event
            saveSlotBtn.addEventListener('click', saveTimeSlot);
            
            // Class and section selector events
            classSelector.addEventListener('change', renderTimeTable);
            sectionSelector.addEventListener('change', renderTimeTable);
            
            // Close modal when clicking outside
            timeSlotModal.addEventListener('click', function(event) {
                if (event.target === timeSlotModal) {
                    closeTimeSlotModal();
                }
            });
            
            // Initial render
            renderTimeTable();
            
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