


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - B.S.D.L.V. Inter College</title>
            <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        a{
            text-decoration:none;
            color:black;
        }
        body {
            font-family: 'Crimson Text', serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            min-height: 100vh;
        }

        /*pagination*/
/* Pagination wrapper */
  .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination-info {
            color: var(--dark);
            font-size: 0.9rem;
        }

        .pagination-controls {
            display: flex;
            gap: 10px;
        }

        .pagination-btn {
            padding: 8px 15px;
            border: 1px solid #d1e3f8;
            background: var(--white);
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Source Serif Pro', serif;
        }

        .pagination-btn:hover {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .pagination-btn.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }
      /* Main Content Styles */
        .main-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        /* Charts and Tables Section */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .chart-container, .recent-activity {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
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

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        /* Chart Placeholder */
        .chart-placeholder {
            height: 300px;
            background: var(--light);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            opacity: 0.7;
            font-size: 1.1rem;
        }

        /* Activity List */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            gap: 15px;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--dark);
            opacity: 0.7;
        }

        /* Quick Actions */
        .quick-actions {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .action-card {
            background: var(--light);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .action-card:hover {
            background: var(--primary);
            color: var(--white) !important;
            transform: translateY(-5px);
        }

        .action-card:hover .action-icon {
            background: var(--white);
            color: var(--primary);
        }.action-card:hover a{
            color:var(--white);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 15px;
            transition: var(--transition);
        }

        .action-text {
            font-weight: 600;
            font-size: 1rem;
        }

        /* Navigation Menu */
        .nav-menu {
            background: var(--white);
            padding: 15px 30px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .nav-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
        }

        .nav-item {
            text-decoration: none;
            color: var(--dark);
            padding: 10px 15px;
            border-radius: 6px;
            text-align: center;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .nav-item:hover {
            background: var(--light);
            color: var(--primary);
        }

        .nav-item.active {
            background: var(--primary);
            color: var(--white);
        }

        .nav-icon {
            font-size: 1.2rem;
        }

        .nav-text {
            font-size: 0.85rem;
        }

        /* Recent Registrations */
        .recent-registrations {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .registrations-table {
            width: 100%;
            border-collapse: collapse;
        }

        .registrations-table th, .registrations-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .registrations-table th {
            background-color: var(--light);
            font-weight: 600;
            color: var(--primary);
        }

        .registrations-table tr:hover {
            background-color: #f9f9f9;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
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

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .search-bar {
                width: 250px;
            }
            
            .nav-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 992px) {
            .search-bar {
                width: 200px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .nav-grid {
                grid-template-columns: repeat(3, 1fr);
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
            
            .nav-grid {
                grid-template-columns: repeat(2, 1fr);
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
            
            .nav-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .mobile-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    
        @include('Admin_sidebar')
     
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Admin Dashboard</h1>
                <p class="page-subtitle">Welcome back! Here's what's happening at SDLV Inter College today.</p>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon students-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value" id="data">{{ $data }}</div>
                        <div class="stat-label">Total Students</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 5.2% from last month
                        </div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon teachers-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value" id="data1">{{ $data1 }}</div>
                        <div class="stat-label">Teaching Staff</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 2 new hires
                        </div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon classes-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value" id="data2">{{ $data2 }}</div>
                        <div class="stat-label">Active Classes</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 3 new this semester
                        </div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon attendance-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value" id="pattendance">{{$pattendance}}%</div>
                        <div class="stat-label">Today's Attendance</div>
                        <div class="stat-change negative">
                            <i class="fas fa-arrow-down"></i> 1.3% below average
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Recent Activity -->
            <div class="content-grid">
                <div class="chart-container">
                    <div class="section-header">
                        <h2 class="section-title"> Today Student  Attendance </h2>
                    </div>
                    <div class="chart-placeholder">
<canvas id="attendanceChart" width="400" height="200"></canvas>
                    </div>
                </div>
                
                <div class="recent-activity">
                    <div class="section-header">
                        <h2 class="section-title">Recent Activity</h2>
                        <a href="#" class="view-all">See All <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">15 new student registrations</div>
                                <div class="activity-time">2 hours ago</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">Monthly fee collection report generated</div>
                                <div class="activity-time">5 hours ago</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">Low attendance alert for Class 10-B</div>
                                <div class="activity-time">Yesterday</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">2 new teacher applications received</div>
                                <div class="activity-time">2 days ago</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="section-header">
                    <h2 class="section-title">Quick Actions</h2>
                </div>
                <div class="actions-grid">
                    <div class="action-card">
                     <a href="student_register">   <div class="action-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        
                        <div class="action-text">Add New Student</div></a>
                    </div>
                    <div class="action-card">
                        <a href="teacher_register">
                        <div class="action-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="action-text">Manage Teachers</div></a>
                    </div>
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="action-text">Course Management</div>
                    </div>
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="action-text">Fee Collection</div>
                    </div>
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="action-text">Generate Reports</div>
                    </div>
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="action-text">Send Notifications</div>
                    </div>
                </div>
            </div>

            <!-- Recent Registrations -->
           <div class="recent-registrations" id="user-table">
    <div class="section-header">
        <h2 class="section-title">Recent Registrations</h2>
        <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
    </div>
    <table class="registrations-table" id="studentTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data3 as $a) 
            <tr>
                <td>{{$a->name}}</td>
                <td>{{$a->rdate}}</td>
                <td><span class="status-badge status-approved">{{$a->status}}</span></td>
                <td><a href="#">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data3->links('vendor.pagination.custom') }}
</div>
 <!-- Footer -->
            <div class="dashboard-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Admin Dashboard v2.1</p>
            </div>
        </div>
    </div>

<script>

    function runCounter(id, max) {
        let count = 0;
        let speed = 20;  

        function update() {
            count++;
            document.getElementById(id).innerHTML = count;

            if (count < max) {
                setTimeout(update, speed);
            }
        }

        update();
    }

    runCounter("data", {{ $data }});
    runCounter("data1", {{ $data1 }});
    runCounter("data2", {{ $data2 }});
    // runCounter("pattendance", {{ $pattendance }});
</script>
<script>
$(document).ready(function(){

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page){
        $.ajax({
            url: "{{ route('Admin_dashboard') }}?page=" + page,
            success:function(data){
                $('#user-table').html(data); 
            }
        });
    }

});
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let classData = {!! $classChartData !!};

const labels = Object.keys(classData);
const presentData = labels.map(cls => classData[cls].present);
const absentData = labels.map(cls => classData[cls].absent);

const data = {
    labels: labels,
    datasets: [
        {
            label: 'Present',
            data: presentData,
            borderColor: 'green',
            backgroundColor: 'rgba(0,128,0,0.2)',
            fill: true,
            tension: 0.4, 
            pointStyle: 'circle',
            pointRadius: 6,
            pointHoverRadius: 8
        },
        {
            label: 'Absent',
            data: absentData,
            borderColor: 'red',
            backgroundColor: 'rgba(255,0,0,0.1)',
            borderDash: [5,5],
            fill: true,
            tension: 0.4,
            pointStyle: 'rect',
            pointRadius: 6,
            pointHoverRadius: 8
        }
    ]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { 
                position: 'top',
                labels: {
                    font: { size: 14, weight: 'bold' }
                }
            },
            tooltip: {
                enabled: true,
                mode: 'index',
                intersect: false,
                backgroundColor: '#333',
                titleFont: { size: 14, weight: 'bold' },
                bodyFont: { size: 13 },
                callbacks: {
                    title: function(context) {
                        return 'Class ' + context[0].label;
                    },
                    label: function(context) {
                        let datasetLabel = context.dataset.label;
                        let value = context.parsed.y;
                        return datasetLabel + ': ' + value;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1, 
                                        callback: function(value) {
                        return Number(value);
                    },
                    font: { size: 12 }
                },
                grid: {
                    color: 'rgba(0,0,0,0.05)',
                    borderDash: [2,2]
                }
            },
            x: {
                ticks: { font: { size: 12 } },
                grid: { display: false }
            }
        }
    }
};

new Chart(
    document.getElementById('attendanceChart'),
    config
);
</script>



</body>
</html>