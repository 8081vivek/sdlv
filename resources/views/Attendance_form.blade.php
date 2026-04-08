<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - B.S.D.L.V. Inter College</title>
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

        /* Class Selection Form Styles */
        .class-selection-container {
            flex: 1;
            padding: 30px;
            background-color: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .selection-form {
            background: var(--white);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 600px;
            border-top: 5px solid var(--secondary);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 6px;
            border: none;
            font-family: 'Crimson Text', serif;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: var(--transition);
            width: 100%;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #0d3a73;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.3);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--light);
        }

        /* Attendance Sheet Styles (Initially Hidden) */
        .attendance-container {
            flex: 1;
            padding: 30px;
            background-color: #f8fafc;
            display: none; /* Hidden by default */
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary);
            position: relative;
            padding-bottom: 10px;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background-color: var(--secondary);
            border-radius: 2px;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #1c7a1c;
        }

        .btn-danger {
            background: var(--danger);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .class-info-card {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            border-left: 5px solid var(--secondary);
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.3rem;
        }

        .info-content h3 {
            font-size: 1.1rem;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .info-content p {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
        }

        /* Attendance Table */
        .attendance-table-container {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .table-header {
            background: var(--primary);
            color: var(--white);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .date-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-selector input {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
        }

        .attendance-table thead {
            background: #f1f5f9;
        }

        .attendance-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid #e2e8f0;
            font-family: 'Playfair Display', serif;
        }

        .attendance-table tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: var(--transition);
        }

        .attendance-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .attendance-table td {
            padding: 20px 15px;
            vertical-align: middle;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .student-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--light);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .student-details h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .student-details p {
            font-size: 0.9rem;
            color: #666;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-present {
            background-color: #e6f7ee;
            color: var(--success);
        }

        .status-absent {
            background-color: #ffe6e6;
            color: var(--danger);
        }

        .status-late {
            background-color: #fff4e6;
            color: var(--warning);
        }

        .status-holiday {
            background-color: #f0f0f0;
            color: #666;
        }

        .attendance-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .status-btn {
            padding: 8px 15px;
            border-radius: 6px;
            border: 2px solid transparent;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Crimson Text', serif;
            font-size: 0.9rem;
        }

        .status-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-present {
            background-color: #e6f7ee;
            color: var(--success);
            border-color: #b7e4cc;
        }

        .btn-present.active {
            background-color: var(--success);
            color: white;
            border-color: var(--success);
        }

        .btn-absent {
            background-color: #ffe6e6;
            color: var(--danger);
            border-color: #f5b5b5;
        }

        .btn-absent.active {
            background-color: var(--danger);
            color: white;
            border-color: var(--danger);
        }

        .btn-late {
            background-color: #fff4e6;
            color: var(--warning);
            border-color: #ffd8a8;
        }

        .btn-late.active {
            background-color: var(--warning);
            color: white;
            border-color: var(--warning);
        }

        .btn-holiday {
            background-color: #f0f0f0;
            color: #666;
            border-color: #d9d9d9;
        }

        .btn-holiday.active {
            background-color: #666;
            color: white;
            border-color: #666;
        }

        /* Summary Section */
        .summary-section {
            margin-top: 30px;
        }

        .summary-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .summary-card {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: var(--transition);
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        .summary-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--white);
        }

        .present-summary {
            background: linear-gradient(135deg, var(--success), #2daa2d);
        }

        .absent-summary {
            background: linear-gradient(135deg, var(--danger), #e63946);
        }

        .late-summary {
            background: linear-gradient(135deg, var(--warning), #ff9900);
        }

        .total-summary {
            background: linear-gradient(135deg, var(--primary), #2a5caa);
        }

        .summary-details h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .summary-details p {
            color: #666;
            font-size: 1rem;
        }

        /* Back to Selection Button */
        .back-button {
            margin-top: 20px;
            text-align: center;
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
            .attendance-table {
                display: block;
                overflow-x: auto;
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

            .selection-form {
                padding: 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .attendance-container {
                padding: 20px;
            }

            .page-title {
                font-size: 1.8rem;
            }

            .header-actions {
                flex-direction: column;
                gap: 10px;
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

            .class-info-card {
                grid-template-columns: 1fr;
            }

            .attendance-table th,
            .attendance-table td {
                padding: 12px 8px;
            }

            .student-info {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .attendance-actions {
                flex-direction: column;
            }

            .summary-cards {
                grid-template-columns: 1fr;
            }

            .table-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .date-selector {
                flex-direction: column;
                width: 100%;
            }

            .date-selector input {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .search-bar {
                display: none;
            }

            .selection-form {
                padding: 20px;
            }

            .form-header h2 {
                font-size: 1.8rem;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include('Teacher_sidebar')

    <!-- Overlay for mobile sidebar -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="left-section">
                <button class="mobile-toggle" id="mobileToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div >
                
                </div>
            </div>
            
            <div class="user-info">
                <div class="notifications">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-details">
                    <div class="user-name">Prof. {{ $data_teacher->name }}</div>
                    <div class="user-role">{{$data_teacher->subjects}}</div>
                </div>
                <div ><img class="user-avatar" src="image/{{$data_teacher->photo}}" alt=""></div>
            </div>
        </div>

        <!-- Class Selection Form (Initially Visible) -->
        <div class="class-selection-container" id="classSelection">
            <div class="selection-form">
                <div class="form-header">
                    <h2>Select Class for Attendance</h2>
                    <p>Please select the class, section, and subject to mark attendance</p>
                </div>
                
<form id="attendanceForm" action="student_show" method="POST">
                        @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="classSelect">
                                <i class="fas fa-chalkboard-teacher"></i> Select Class
                            </label>
                            <select class="form-control" id="classSelect" name="class" required>
                                <option value="">-- Select Class --</option>
                                <option value="L.K.G">Class L.K.G</option>
                                <option value="U.K.G">Class U.k.G</option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                                <option value="4">Class 4</option>
                                <option value="5">Class 5</option>
                                <option value="6">Class 6</option>
                                <option value="7">Class 7</option>
                                <option value="8">Class 8</option>
                                <option value="9">Class 9</option>
                                <option value="10">Class 10</option>
                                <option value="11">Class 11</option>
                                <option value="12">Class 12</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="sectionSelect">
                                <i class="fas fa-users"></i> Select Section
                            </label>
                            <select class="form-control" id="sectionSelect" required>
                                <option value="">-- Select Section --</option>
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                                <option value="D">Section D</option>
                                <option value="E">Section E </option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Proceed to Mark Attendance
                        </button>
                    </div>
                </form>
            </div>
        </div>

        </div>
    </div>

   
</body>
</html>