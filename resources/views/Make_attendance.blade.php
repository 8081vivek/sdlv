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

        /* Attendance Sheet Styles */
        .attendance-container {
            flex: 1;
            padding: 30px;
            background-color: #f8fafc;
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
        .page-titleh1 {
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

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
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

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #1c7a1c;
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
            width: 95%; margin:auto;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            /* padding:10px; */
        }
.table-btn{
    display:grid;
    place-items:center;
    margin:15px;
}

        .table-header {
            background: var(--primary);
            color: var(--white);
            padding: 20px;
         
            
        }

        .table-header div{
            display:grid;
            align-items:center;
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
.btn-present, .btn-absent {
    padding: 6px 15px;
    border-radius: 6px;
    border: 2px solid transparent;
    cursor: pointer;
    font-weight: bold;
    margin-right: 5px;
    user-select: none;
    display: inline-block;
    transition: 0.2s;
}

/* Present Normal */
.btn-present {
    background-color: #dbf0e5;
    color: green;
    border-color: #b7e4cc;
}

/* Absent Normal */
.btn-absent {
    background-color: #ffe6e6;
    color: red;
    border-color: #f5b5b5;
}

/* Hide the radio input */
.btn-present input,
.btn-absent input {
    display: none;
}

/* Active state */
.btn-present.active {
    background-color: green !important;
    color: white !important;
}

.btn-absent.active {
    background-color: red !important;
    color: white !important;
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
        }

        @media (max-width: 576px) {
            .search-bar {
                display: none;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
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
    </style>
</head>
<body>
   @include("Teacher_sidebar")
   <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="">
                     <h1 class="page-titleh1"> Welcome to  </h1>
            </div>
            
            <div class="user-info">
                <div class="notifications">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">2</span>
                </div>
                
                <div class="user-details">
                    <div class="user-name"></div>
                    <div class="user-role"> Teacher</div>
                </div>
                
                <div ><img class="user-avatar" src="" alt="teacher-image" ></div>
            </div>
        </div>


        <!-- Attendance Sheet Content -->
        <div class="attendance-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Attendance Management</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" id="saveAttendance">
                        <i class="fas fa-save"></i> Save Attendance
                    </button>
                    <button class="btn btn-secondary" id="printSheet">
                        <i class="fas fa-print"></i> Print Sheet
                    </button>
                    <button class="btn btn-success" id="markAllPresent">
                        <i class="fas fa-check-circle"></i> Mark All Present
                    </button>
                </div>
            </div>

            <!-- Class Information -->
            <div class="class-info-card">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="info-content">
                        <h3>Class</h3>
                        <p>XII - Science</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="info-content">
                        <h3>Subject</h3>
                        <p>Physics</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-content">
                        <h3>Period</h3>
                        <p>3rd Period (10:30 - 11:30)</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="info-content">
                        <h3>Date</h3>
                        <p id="currentDate">October 18, 2023</p>
                    </div>
                </div>
            </div>

                <!-- Summary Section -->
            <div class="summary-section">
                <h2 class="summary-title">Attendance Summary</h2>
                <div class="summary-cards">
                    <div class="summary-card">
                        <div class="summary-icon present-summary">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="summary-details">
                            <h3 id="presentCount">0</h3>
                            <p>Students Present</p>
                        </div>
                    </div>
                    
                    <div class="summary-card">
                        <div class="summary-icon absent-summary">
                            <i class="fas fa-user-times"></i>
                        </div>
                        <div class="summary-details">
                            <h3 id="absentCount">0</h3>
                            <p>Students Absent</p>
                        </div>
                    </div>
                    
                    <div class="summary-card">
                        <div class="summary-icon late-summary">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <div class="summary-details">
                            <h3 id="lateCount">0</h3>
                            <p>Students Late</p>
                        </div>
                    </div>
                    
                    <div class="summary-card">
                        <div class="summary-icon total-summary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="summary-details">
                            <h3 id="totalCount">{{$class}}</h3>
                            <p>Total Students</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Attendance Table -->
            <div class="attendance-table-container">
                <div class="table-header">
                    <div>
                        <h2 style="color: white; margin: auto;">Student Attendance Sheet</h2>
                        <p style="color: rgba(255, 255, 255, 0.8); margin-top: 5px; font-size: 0.9rem;">Total Students: <span id="totalStudents">25</span></p>
                    </div>
                
                </div>
                
                <form action="save_attendance" method="post">
    @csrf
    <div class="table-wrapper">
        <table class="attendance-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Roll No.</th>
                    <th>Mark Attendance</th>
                </tr>
            </thead>

            <tbody>
                <input type="hidden" name="class" value="{{$class}}">
                <!-- <input type="hidden" name="teacher_id" value="{{$data1->name}}"> -->
                <input type="hidden" name="teacher_id" value="500">

                @php $i = 1; @endphp
                @foreach($data as $a)
                <tr>
                    <td><input type="hidden" value="{{ $a->name }}" name="student_id">{{ $a->name }}</td>

                    <td>{{$i++}}</td>

                    <td>{{ $a->roll }}</td>

                    <td>
                        <label class="btn-present">
    <input type="radio" name="attendance[{{ $a->id }}]" value="Present" onclick="toggleAttendance(this)" required>
    Present
</label>

<label class="btn-absent">
    <input type="radio" name="attendance[{{ $a->id }}]" value="Absent" onclick="toggleAttendance(this)" required>
    Absent
</label>

                            </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class='table-btn'>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Save Attendance</button>
    </div>
</form>
</div>

        
        </div>
    </div>

</div></div>
    
</body>

<script>
function toggleAttendance(input) {
    let td = input.closest("td");             // Current cell
    let labels = td.querySelectorAll("label"); // Both labels in this cell

    // Remove active from both
    labels.forEach(label => label.classList.remove("active"));

    // Add active to clicked one
    input.parentElement.classList.add("active");
     // Calculate counts
    let allRadios = document.querySelectorAll('input[type="radio"]:checked');
    let presentCount = 0;
    let absentCount = 0;

    allRadios.forEach(radio => {
        if (radio.value === "Present") presentCount++;
        if (radio.value === "Absent") absentCount++;
    });
        // Update summary
    document.getElementById("presentCount").innerText = presentCount;
    document.getElementById("absentCount").innerText = absentCount;

}

</script>
</html>