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

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
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
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--white);
        }

        .students-icon {
            background: var(--primary);
        }

        .teachers-icon {
            background: var(--secondary);
        }

        .classes-icon {
            background: var(--success);
        }

        .attendance-icon {
            background: var(--warning);
        }

        .stat-info {
            flex: 1;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--dark);
            font-size: 1rem;
            opacity: 0.8;
        }

        .stat-change {
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .positive {
            color: var(--success);
        }

        .negative {
            color: var(--danger);
        }

        /* Important Notices Section */
        .important-notices {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .notices-header {
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

        .add-notice-btn {
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .add-notice-btn:hover {
            background: var(--secondary);
        }

        .notices-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .notice-card {
            background: var(--light);
            border-radius: 8px;
            padding: 20px;
            border-left: 4px solid var(--primary);
            transition: var(--transition);
            position: relative;
        }

        .notice-card.urgent {
            border-left-color: var(--danger);
            background: #fff5f5;
        }

        .notice-card.important {
            border-left-color: var(--warning);
            background: #fffbf0;
        }

        .notice-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .notice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .notice-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .notice-priority {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .priority-urgent {
            background: var(--danger);
            color: white;
        }

        .priority-important {
            background: var(--warning);
            color: white;
        }

        .priority-normal {
            background: var(--primary);
            color: white;
        }

        .notice-content {
            color: var(--dark);
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .notice-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: var(--dark);
            opacity: 0.7;
        }

        .notice-date {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .notice-actions {
            display: flex;
            gap: 10px;
        }

        .notice-action {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            padding: 5px;
            border-radius: 4px;
            transition: var(--transition);
        }

        .notice-action:hover {
            background: var(--light);
        }

        .notice-action.delete:hover {
            color: var(--danger);
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
            max-width: 600px;
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

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
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
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .search-bar {
                width: 180px;
            }
            
            .top-bar {
                padding: 15px 20px;
            }
            
            .user-details {
                display: none;
            }
            
            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .notices-grid {
                grid-template-columns: 1fr;
            }
            
            .notices-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .add-notice-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .search-bar {
                display: none;
            }
            
            .dashboard-content {
                padding: 20px 15px;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .stat-card {
                padding: 20px;
            }
            
            .stat-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
            
            .stat-value {
                font-size: 1.8rem;
            }
            
            .modal-content {
                width: 95%;
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
            <a href="#" class="menu-item active">
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
                    <div class="user-name">Dr. Rajesh Sharma</div>
                    <div class="user-role">Administrator</div>
                </div>
                
                <div class="user-avatar">RS</div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Important Notices</h1>
                <p class="page-subtitle">Manage and publish important announcements for students, teachers, and parents</p>
            </div>

            <!-- Important Notices Section -->
            <div class="important-notices">
                <div class="notices-header">
                    <h2 class="section-title">Current Notices</h2>
                    <button class="add-notice-btn" id="addNoticeBtn">
                        <i class="fas fa-plus"></i> Add New Notice
                    </button>
                </div>
                
                <div class="notices-grid" id="noticesGrid">
                    <!-- Notices will be populated by JavaScript -->
                </div>
            </div>

            <!-- Footer -->
            <div class="dashboard-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Admin Dashboard v2.1</p>
            </div>
        </div>
    </div>

    <!-- Add/Edit Notice Modal -->
    <div class="modal" id="noticeModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Add New Notice</h3>
                <button class="modal-close" id="modalClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="noticeForm">
                    <div class="form-group">
                        <label for="noticeTitle" class="form-label">Notice Title</label>
                        <input type="text" id="noticeTitle" class="form-control" placeholder="Enter notice title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="noticeContent" class="form-label">Notice Content</label>
                        <textarea id="noticeContent" class="form-control" placeholder="Enter notice details" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="noticePriority" class="form-label">Priority</label>
                        <select id="noticePriority" class="form-select" required>
                            <option value="normal">Normal</option>
                            <option value="important">Important</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="noticeAudience" class="form-label">Target Audience</label>
                        <select id="noticeAudience" class="form-select" required>
                            <option value="all">All (Students, Teachers & Parents)</option>
                            <option value="students">Students Only</option>
                            <option value="teachers">Teachers Only</option>
                            <option value="parents">Parents Only</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="noticeExpiry" class="form-label">Expiry Date</label>
                        <input type="date" id="noticeExpiry" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveNoticeBtn">Save Notice</button>
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
            const addNoticeBtn = document.getElementById('addNoticeBtn');
            const noticeModal = document.getElementById('noticeModal');
            const modalClose = document.getElementById('modalClose');
            const cancelBtn = document.getElementById('cancelBtn');
            const saveNoticeBtn = document.getElementById('saveNoticeBtn');
            const noticeForm = document.getElementById('noticeForm');
            const modalTitle = document.getElementById('modalTitle');
            const noticesGrid = document.getElementById('noticesGrid');
            
            // Sample notices data
            let noticesData = [
                {
                    id: 1,
                    title: 'Annual Sports Day',
                    content: 'The Annual Sports Day will be held on December 15, 2023. All students are required to participate. Practice sessions will begin from next week.',
                    priority: 'important',
                    audience: 'all',
                    date: '2023-11-20',
                    expiry: '2023-12-15',
                    created: '2023-11-20'
                },
                {
                    id: 2,
                    title: 'Fee Payment Deadline',
                    content: 'Last date for fee payment for the current quarter is November 30, 2023. Late payments will incur a penalty.',
                    priority: 'urgent',
                    audience: 'parents',
                    date: '2023-11-18',
                    expiry: '2023-11-30',
                    created: '2023-11-18'
                },
                {
                    id: 3,
                    title: 'Parent-Teacher Meeting',
                    content: 'A parent-teacher meeting is scheduled for December 5, 2023. Please make sure to attend to discuss your child\'s progress.',
                    priority: 'important',
                    audience: 'parents',
                    date: '2023-11-15',
                    expiry: '2023-12-05',
                    created: '2023-11-15'
                },
                {
                    id: 4,
                    title: 'Library Book Return',
                    content: 'All library books issued for the current semester must be returned by November 25, 2023. Failure to return books will result in fines.',
                    priority: 'normal',
                    audience: 'students',
                    date: '2023-11-10',
                    expiry: '2023-11-25',
                    created: '2023-11-10'
                }
            ];
            
            let currentEditId = null;
            
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
            
            // Open notice modal
            function openNoticeModal(editId = null) {
                currentEditId = editId;
                
                if (editId) {
                    // Edit mode
                    modalTitle.textContent = 'Edit Notice';
                    const notice = noticesData.find(n => n.id === editId);
                    
                    if (notice) {
                        document.getElementById('noticeTitle').value = notice.title;
                        document.getElementById('noticeContent').value = notice.content;
                        document.getElementById('noticePriority').value = notice.priority;
                        document.getElementById('noticeAudience').value = notice.audience;
                        document.getElementById('noticeExpiry').value = notice.expiry;
                    }
                } else {
                    // Add mode
                    modalTitle.textContent = 'Add New Notice';
                    noticeForm.reset();
                    
                    // Set default expiry date to 7 days from now
                    const defaultExpiry = new Date();
                    defaultExpiry.setDate(defaultExpiry.getDate() + 7);
                    document.getElementById('noticeExpiry').value = defaultExpiry.toISOString().split('T')[0];
                }
                
                noticeModal.classList.add('active');
            }
            
            // Close notice modal
            function closeNoticeModal() {
                noticeModal.classList.remove('active');
                currentEditId = null;
            }
            
            // Save notice
            function saveNotice() {
                const title = document.getElementById('noticeTitle').value;
                const content = document.getElementById('noticeContent').value;
                const priority = document.getElementById('noticePriority').value;
                const audience = document.getElementById('noticeAudience').value;
                const expiry = document.getElementById('noticeExpiry').value;
                
                if (!title || !content || !expiry) {
                    alert('Please fill in all required fields');
                    return;
                }
                
                if (currentEditId) {
                    // Update existing notice
                    const noticeIndex = noticesData.findIndex(n => n.id === currentEditId);
                    if (noticeIndex !== -1) {
                        noticesData[noticeIndex] = {
                            ...noticesData[noticeIndex],
                            title,
                            content,
                            priority,
                            audience,
                            expiry
                        };
                    }
                } else {
                    // Add new notice
                    const newNotice = {
                        id: Date.now(), // Simple ID generation
                        title,
                        content,
                        priority,
                        audience,
                        date: new Date().toISOString().split('T')[0],
                        expiry,
                        created: new Date().toISOString().split('T')[0]
                    };
                    
                    noticesData.unshift(newNotice);
                }
                
                renderNotices();
                closeNoticeModal();
            }
            
            // Delete notice
            function deleteNotice(id) {
                if (confirm('Are you sure you want to delete this notice?')) {
                    noticesData = noticesData.filter(notice => notice.id !== id);
                    renderNotices();
                }
            }
            
            // Render notices
            function renderNotices() {
                noticesGrid.innerHTML = '';
                
                if (noticesData.length === 0) {
                    noticesGrid.innerHTML = '<p>No notices found. Click "Add New Notice" to create one.</p>';
                    return;
                }
                
                // Sort notices by date (newest first)
                const sortedNotices = [...noticesData].sort((a, b) => new Date(b.created) - new Date(a.created));
                
                sortedNotices.forEach(notice => {
                    const noticeCard = document.createElement('div');
                    noticeCard.className = `notice-card ${notice.priority === 'urgent' ? 'urgent' : notice.priority === 'important' ? 'important' : ''}`;
                    
                    let audienceText = '';
                    switch(notice.audience) {
                        case 'all':
                            audienceText = 'All';
                            break;
                        case 'students':
                            audienceText = 'Students';
                            break;
                        case 'teachers':
                            audienceText = 'Teachers';
                            break;
                        case 'parents':
                            audienceText = 'Parents';
                            break;
                    }
                    
                    noticeCard.innerHTML = `
                        <div class="notice-header">
                            <h3 class="notice-title">${notice.title}</h3>
                            <span class="notice-priority priority-${notice.priority}">${notice.priority.charAt(0).toUpperCase() + notice.priority.slice(1)}</span>
                        </div>
                        <div class="notice-content">
                            ${notice.content}
                        </div>
                        <div class="notice-footer">
                            <div class="notice-date">
                                <i class="fas fa-calendar-alt"></i>
                                ${formatDate(notice.date)} | For: ${audienceText}
                            </div>
                            <div class="notice-actions">
                                <button class="notice-action edit" data-id="${notice.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="notice-action delete" data-id="${notice.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    
                    noticesGrid.appendChild(noticeCard);
                });
                
                // Add event listeners to action buttons
                document.querySelectorAll('.notice-action.edit').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = parseInt(this.getAttribute('data-id'));
                        openNoticeModal(id);
                    });
                });
                
                document.querySelectorAll('.notice-action.delete').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = parseInt(this.getAttribute('data-id'));
                        deleteNotice(id);
                    });
                });
            }
            
            // Format date for display
            function formatDate(dateString) {
                const options = { year: 'numeric', month: 'short', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('en-US', options);
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
            
            // Add notice button event
            addNoticeBtn.addEventListener('click', () => openNoticeModal());
            
            // Modal close events
            modalClose.addEventListener('click', closeNoticeModal);
            cancelBtn.addEventListener('click', closeNoticeModal);
            
            // Save notice event
            saveNoticeBtn.addEventListener('click', saveNotice);
            
            // Close modal when clicking outside
            noticeModal.addEventListener('click', function(event) {
                if (event.target === noticeModal) {
                    closeNoticeModal();
                }
            });
            
            // Initial render
            renderNotices();
            
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