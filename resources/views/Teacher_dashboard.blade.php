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
a{
    text-decoration:none;
    color:black;
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

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            transition: var(--transition);
        }

        .main-content.sidebar-collapsed {
            margin-left: 0;
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

        .stat-students .stat-icon {
            background: rgba(26, 75, 140, 0.1);
            color: var(--primary);
        }

        .stat-classes .stat-icon {
            background: rgba(34, 139, 34, 0.1);
            color: var(--success);
        }

        .stat-attendance .stat-icon {
            background: rgba(255, 165, 0, 0.1);
            color: var(--warning);
        }

        .stat-assignments .stat-icon {
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
            grid-template-columns: 1fr;
            gap: 30px;
        }

        /* Classes Section */
        .classes-section {
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

        .classes-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .class-card {
            border: 1px solid #eaeaea;
            border-radius: 8px;
            padding: 20px;
            transition: var(--transition);
        }

        .class-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .class-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .class-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .class-time {
            background: var(--light);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            color: var(--primary);
        }

        .class-details {
            margin-bottom: 15px;
        }

        .class-subject {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .class-room {
            font-size: 0.9rem;
            color: var(--dark);
            opacity: 0.8;
        }

        .class-actions {
            display: flex;
            gap: 10px;
        }

        .btn-sm {
            padding: 8px 15px;
            font-size: 0.85rem;
        }

        /* Recent Activity */
        .activity-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .activity-item:hover {
            background: var(--light);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light);
            color: var(--primary);
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            margin-bottom: 5px;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.7;
        }

        /* Sidebar Content */
        .sidebar-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Upcoming Events */
        .events-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .events-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .event-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .event-item:hover {
            background: var(--light);
        }

        .event-date {
            text-align: center;
            background: var(--primary);
            color: var(--white);
            padding: 10px;
            border-radius: 6px;
            min-width: 50px;
        }

        .event-day {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .event-month {
            font-size: 0.8rem;
        }

        .event-content {
            flex: 1;
        }

        .event-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .event-details {
            font-size: 0.9rem;
            color: var(--dark);
            opacity: 0.8;
        }

        /* Quick Actions */
        .actions-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .action-item {
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
        }

        .action-item:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        .action-item:hover .action-icon {
            color: var(--white);
        }

        .action-icon {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .action-text {
            font-size: 0.9rem;
            font-weight: 600;
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
            .main-content {
                margin-left: 0;
            }
            
            .mobile-toggle {
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

            .classes-list {
                grid-template-columns: 1fr;
            }

            .page-content {
                padding: 20px 15px;
            }

            .actions-grid {
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
    @include('Teacher_sidebar')

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
                    <div class="user-name">Proff.{{ $teacher->name }}</div>
                    <div class="user-role">{{ $teacher->subjects }}</div>
                </div>

                <div ><img class="user-avatar" src="image/{{ $teacher->photo }}" alt=""></div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Teacher Dashboard</h1>
                    <p class="page-subtitle">Welcome back, Proff.{{ $teacher->name }}! Here's your teaching overview for today.</p>
                </div>
                <div class="page-actions">
                    <a href="a">
                    <button class="btn btn-primary" id="markAttendanceBtn">
                        <i class="fas fa-calendar-plus"></i> Mark Attendance
                    </button></a>
                    <!-- <button class="btn btn-success" id="createAssignmentBtn">
                        <i class="fas fa-tasks"></i> Create Assignment
                    </button> -->
                </div>
            </div>

            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <div class="stat-card stat-students">
                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" id="student">0</div>
                        <div class="stat-label">Total Students</div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+5 from last month</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card stat-classes">
                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" id="class">0</div>
                        <div class="stat-label">Classes Today</div>
                        <div class="stat-trend">
                            <span>Next: Class 10-A (9:00 AM)</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card stat-attendance">
                    <div class="stat-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" id="attendance">0%</div>
                        <div class="stat-label">Average Attendance</div>
                        <div class="stat-trend trend-down">
                            <i class="fas fa-arrow-down"></i>
                            <span>-2% from last week</span>
                        </div>
                    </div>
                </div>
          
            </div>

            <!-- Dashboard Content Grid -->
            <div class="dashboard-content">
                <!-- Main Content -->
                <div class="main-dashboard">
                  
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Upcoming Events -->
                    <div class="events-section">
                        <div class="section-header">
                            <h2 class="section-title">Upcoming Events</h2>
                        </div>
                        <div class="events-list">
                            <div class="event-item">
                                <div class="event-date">
                                    <div class="event-day">18</div>
                                    <div class="event-month">NOV</div>
                                </div>
                                <div class="event-content">
                                    <div class="event-title">Science Fair</div>
                                    <div class="event-details">School Auditorium, 10:00 AM</div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="event-date">
                                    <div class="event-day">22</div>
                                    <div class="event-month">NOV</div>
                                </div>
                                <div class="event-content">
                                    <div class="event-title">Parent-Teacher Meeting</div>
                                    <div class="event-details">Class 10 & 12, 2:00 PM</div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="event-date">
                                    <div class="event-day">25</div>
                                    <div class="event-month">NOV</div>
                                </div>
                                <div class="event-content">
                                    <div class="event-title">Unit Test Submission</div>
                                    <div class="event-details">All Classes</div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="event-date">
                                    <div class="event-day">30</div>
                                    <div class="event-month">NOV</div>
                                </div>
                                <div class="event-content">
                                    <div class="event-title">Staff Development Workshop</div>
                                    <div class="event-details">Conference Hall, 9:00 AM</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="actions-section">
                        <div class="section-header">
                            <h2 class="section-title">Quick Actions</h2>
                        </div>
                        <div class="actions-grid">
                            <a href="a"><div class="action-item" id="takeAttendanceAction">
                                <div class="action-icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div class="action-text">Take Attendance</div>
                            </div></a>
                            <div class="action-item" id="createAssignmentAction">
                                <div class="action-icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="action-text">Create Assignment</div>
                            </div>
                            <div class="action-item" id="uploadMaterialsAction">
                                <div class="action-icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                                <div class="action-text">Upload Materials</div>
                            </div>
                            <div class="action-item" id="checkGradesAction">
                                <div class="action-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="action-text">Check Grades</div>
                            </div>
                            <div class="action-item" id="sendAnnouncementAction">
                                <div class="action-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="action-text">Send Announcement</div>
                            </div>
                            <div class="action-item" id="viewTimetableAction">
                                <div class="action-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="action-text">View Timetable</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="page-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Teacher Dashboard v1.0</p>
            </div>
        </div>
    </div>

    <script>
function startCounter(id, target) {
    let count = 0;

    function update() {
        if (count <= target) {
            document.getElementById(id).innerText = count;
            count++;
            setTimeout(update, 20); // speed
        }
    }

    update();
}

// Call function
startCounter('student', 120);
startCounter('class', 25);
</script>

</body>
</html>