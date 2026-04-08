@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Management - B.S.D.L.V. Inter College</title>
            <link rel="icon" type="image/jpeg" href="image/logo.jpeg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        }
        a{
            text-decoration: none;
        }

        .required::after {
            content: " *";
            color: var(--accent);
        }

        /* Top Navigation Bar */
        .top-nav {
            background: var(--white);
            padding: 15px 30px;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            font-size: 2rem;
            color: var(--primary);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        /* Main Navigation Menu */
        .nav-menu {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .nav-item {
            text-decoration: none;
            color: var(--dark);
            padding: 12px 20px;
            border-radius: 6px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
        }

        .nav-item:hover {
            background: var(--light);
            color: var(--primary);
        }

        .nav-item.active {
            background: var(--primary);
            color: var(--white);
        }

        .nav-item i {
            width: 20px;
            text-align: center;
        }

        .nav-divider {
            height: 30px;
            width: 1px;
            background: #e0e0e0;
            margin: 0 10px;
        }

        /* Right Side Navigation */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--light);
            border-radius: 6px;
            padding: 8px 15px;
            width: 250px;
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

        /* Registration Form Styles */
        .registration-container {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .form-header {
            background: var(--primary);
            color: var(--white);
            padding: 25px 40px;
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-content {
            padding: 40px;
        }

        .form-section {
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eaeaea;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--secondary);
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1 1 300px;
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #d1e3f8;
            border-radius: 6px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--light);
            font-family: 'Source Serif Pro', serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            opacity: 0.7;
        }

        select.form-control {
            appearance: none;
            padding-right: 40px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 5px;
        }

        .radio-option, .checkbox-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-option input, .checkbox-option input {
            width: 18px;
            height: 18px;
        }

        .form-text {
            font-size: 0.9rem;
            color: var(--dark);
            margin-top: 5px;
            opacity: 0.7;
        }

        .qualifications-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .qualifications-table th, .qualifications-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eaeaea;
        }

        .qualifications-table th {
            background-color: var(--light);
            font-weight: 600;
            color: var(--primary);
        }

        .qualifications-table tr:hover {
            background-color: #f9f9f9;
        }

        .add-qualification {
            margin-top: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            cursor: pointer;
            font-weight: 600;
        }

        .file-upload {
            border: 2px dashed #d1e3f8;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: var(--primary);
            background-color: #f8fbff;
        }

        .file-upload i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .file-upload input {
            display: none;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .btn-reset {
            background: #e0e0e0;
            color: var(--dark);
        }

        .btn-reset:hover {
            background: #d0d0d0;
            transform: translateY(-3px);
        }

        .success-message {
            background: var(--success);
            color: var(--white);
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
            font-family: 'Source Serif Pro', serif;
        }

        .error-message {
            color: var(--accent);
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        /* Dashboard Specific Styles */
        .filters-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filters-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--primary);
        }

        .filter-controls {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-label {
            font-weight: 600;
            color: var(--primary);
            font-size: 1rem;
        }

        .filter-select, .filter-input {
            padding: 10px 15px;
            border: 2px solid #d1e3f8;
            border-radius: 6px;
            font-size: 1rem;
            background-color: var(--light);
            font-family: 'Source Serif Pro', serif;
            width: 100%;
        }

        .teachers-section {
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

        .table-container {
            overflow-x: auto;
        }

        .teachers-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .teachers-table th, .teachers-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .teachers-table th {
            background-color: var(--light);
            font-weight: 600;
            color: var(--primary);
            position: sticky;
            top: 0;
        }

        .teachers-table tr:hover {
            background-color: #f9f9f9;
        }

        .teacher-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .teacher-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .teacher-name {
            font-weight: 600;
            color: var(--primary);
        }

        .teacher-id {
            font-size: 0.85rem;
            color: var(--dark);
            opacity: 0.7;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-active {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .status-on-leave {
            background: #fff3cd;
            color: #856404;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 35px;
            height: 35px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-edit {
            background: #e8f4fd;
            color: var(--primary);
        }

        .btn-edit:hover {
            background: var(--primary);
            color: var(--white);
        }

        .btn-delete {
            background: #fde8e8;
            color: var(--danger);
        }

        .btn-delete:hover {
            background: var(--danger);
            color: var(--white);
        }

        .btn-view {
            background: #e8f8f0;
            color: var(--success);
        }

        .btn-view:hover {
            background: var(--success);
            color: var(--white);
        }

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

        .page-footer {
            text-align: center;
            padding: 20px;
            color: var(--dark);
            opacity: 0.7;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }

        /* Modal Styles */
        .modal-xl {
            max-width: 1200px;
        }

        .modal-header {
            background: var(--primary);
            color: var(--white);
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        .btn-close {
            filter: invert(1);
        }

        /* Mobile Toggle Button */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
            padding: 5px;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .search-bar {
                width: 200px;
            }
            
            .nav-menu {
                gap: 2px;
            }
            
            .nav-item {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
            
            .filter-controls {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .nav-left {
                gap: 15px;
            }
            
            .search-bar {
                display: none;
            }
            
            .nav-menu {
                display: none;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .nav-menu.mobile-open {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                box-shadow: var(--shadow);
                padding: 20px;
                z-index: 1000;
            }
            
            .nav-item {
                padding: 15px;
                border-radius: 0;
                border-bottom: 1px solid #eee;
            }
            
            .nav-divider {
                display: none;
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
        }

        @media (max-width: 768px) {
            .top-nav {
                padding: 15px 20px;
            }
            
            .user-details {
                display: none;
            }

            .filter-controls {
                grid-template-columns: 1fr;
            }

            .page-content {
                padding: 20px 15px;
            }

            .form-content {
                padding: 30px 20px;
            }

            .form-header {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .pagination {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
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
            
            .logo-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    @include('Admin_sidebar')
   
    <!-- Page Content -->
    <div class="page-content">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Teachers Management</h1>
                <p class="page-subtitle">Manage all teacher records and information</p>
            </div>
            <div class="page-actions">
               <a href="{{('teacher_register') }}"> <button class="btn btn-primary" >
                    <i class="fas fa-user-plus"></i> Add New Teacher
                </button></a>
                <button class="btn btn-success" id="exportDataBtn">
                    <i class="fas fa-file-export"></i> Export Data
                </button>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filters-header">
                <h2 class="filters-title">Filter Teachers</h2>
            </div>
            <div class="filter-controls">
                <div class="filter-group">
                    <label class="filter-label">Department</label>
                    <select class="filter-select" id="departmentFilter">
                        <option value="">All Departments</option>
                        <option value="science">Science</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="english">English</option>
                        <option value="social">Social Studies</option>
                        <option value="computer">Computer Science</option>
                        <option value="physical">Physical Education</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Subjects</label>
                    <select class="filter-select" id="subjectFilter">
                        <option value="">All Subjects</option>
                        <option value="physics">Physics</option>
                        <option value="chemistry">Chemistry</option>
                        <option value="biology">Biology</option>
                        <option value="math">Mathematics</option>
                        <option value="english">English</option>
                        <option value="hindi">Hindi</option>
                        <option value="history">History</option>
                        <option value="geography">Geography</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select class="filter-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="on-leave">On Leave</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Search by Name/ID</label>
                    <input type="text" class="filter-input" id="searchInput" placeholder="Enter name or teacher ID">
                </div>
            </div>
        </div>

        <!-- Teachers Table -->
        <div class="teachers-section">
            <div class="section-header">
                <h2 class="section-title">All Teachers (68)</h2>
            </div>
            <div class="table-container">
                <table class="teachers-table">
                    <thead>
                        <tr>
                            <th>Teacher</th>
                            <th>Department & Subjects</th>
                            <th>Classes Assigned</th>
                            <th>Contact Info</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="teacher-info">
                                    <div class="teacher-avatar">RS</div>
                                    <div>
                                        <div class="teacher-name">Dr. Rajesh Sharma</div>
                                        <div class="teacher-id">ID: TEA2023001</div>
                                    </div>
                                </td>
                            <td>
                                <div><strong>Science</strong></div>
                                <div>Physics, Chemistry</div>
                            </td>
                            <td>10-A, 11-Science, 12-Science</td>
                            <td>
                                <div>rajesh.sharma@sdvl.edu</div>
                                <div>+91 98765 43210</div>
                            </td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon btn-view" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-delete" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <div class="pagination-info">
                    Showing 1 to 5 of 68 entries
                </div>
                <div class="pagination-controls">
                    <button class="pagination-btn">Previous</button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">...</button>
                    <button class="pagination-btn">14</button>
                    <button class="pagination-btn">Next</button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="page-footer">
            <p>© 2023 SDLV Inter College. All rights reserved. | Teachers Management v1.0</p>
        </div>
    </div>

    <!-- Teacher Registration Modal -->
    <div class="modal fade" id="teacherRegistrationModal" tabindex="-1" aria-labelledby="teacherRegistrationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teacherRegistrationModalLabel">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Teacher Registration
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <!-- Registration Form Content -->
                    <div class="registration-container">
                        <div class="form-header">
                            <h2>Faculty Application Form</h2>
                        </div>

                        <div class="form-content">
                            <div class="success-message" id="successMessage">
                                <i class="fas fa-check-circle"></i> Application submitted successfully! Our HR team will contact you shortly.
                            </div>

                          @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                <form id="teacherRegistrationForm" enctype="multipart/form-data">
                @csrf  
                <!-- Personal Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user-tie"></i> Personal Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName" class="form-label required">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter your first name" required>
                                <div class="error-message" id="firstNameError">Please enter your first name</div>
                            </div>

                            <div class="form-group">
                                <label for="lastName" class="form-label required">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter your last name" required>
                                <div class="error-message" id="lastNameError">Please enter your last name</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dateOfBirth" class="form-label required">Date of Birth</label>
                                <div class="input-group">
                                    <input type="date" id="dateOfBirth" name="dob" class="form-control" required>
                                    <i class="fas fa-calendar-alt input-icon"></i>
                                </div>
                                <div class="error-message" id="dobError">Please enter your date of birth</div>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Gender</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="male" name="gender" value="male" required>
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Female</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="other" name="gender" value="other">
                                        <label for="other">Other</label>
                                    </div>
                                </div>
                                <div class="error-message" id="genderError">Please select your gender</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nationality" class="form-label required">Nationality</label>
                                <div class="input-group">
                                    <select id="nationality" name="nationality" class="form-control" required>
                                        <option value="">Select Nationality</option>
                                        <option value="indian">Indian</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                <div class="error-message" id="nationalityError">Please select your nationality</div>
                            </div>

                            <div class="form-group">
                                <label for="idNumber" class="form-label required">Government ID Number</label>
                                <input type="text" id="idNumber" name="gid" class="form-control" placeholder="Aadhaar, PAN, or other ID" required>
                                <div class="error-message" id="idNumberError">Please enter your ID number</div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-address-book"></i> Contact Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="address" class="form-label required">Residential Address</label>
                                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your complete address" required></textarea>
                                <div class="error-message" id="addressError">Please enter your address</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city" class="form-label required">City</label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city" required>
                                <div class="error-message" id="cityError">Please enter your city</div>
                            </div>

                            <div class="form-group">
                                <label for="state" class="form-label required">State</label>
                                <input type="text" id="state" name="state" class="form-control" placeholder="Enter your state" required>
                                <div class="error-message" id="stateError">Please enter your state</div>
                            </div>

                            
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label required">PIN Code</label>
                                <div class="input-group">
                                    <input type="text" id="phone" name="pincode" class="form-control" placeholder="Enter your PIN code" maxlength="6" pattern="\d{6}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" title="Please enter a 6-digit PIN code" required>
                                    <!-- <i class="fas fa-phone input-icon"></i> -->
                                </div>
                                <div class="error-message" id="phoneError">Please enter a valid phone number</div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label required">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                                    <!-- <i class="fas fa-envelope input-icon"></i> -->
                                </div>
                                <div class="error-message" id="emailError">Please enter a valid email address</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label required">Phone Number</label>
                                <div class="input-group">
                                    <input type="tel" id="phone" name="phone" class="form-control" maxlength="10" pattern="\d{0-9}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="Enter your phone number" required>
                                    <i class="fas fa-phone input-icon"></i>
                                </div>
                                <div class="error-message" id="phoneError">Please enter a valid phone number</div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label required">Email Address</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
                                    <i class="fas fa-envelope input-icon"></i>
                                </div>
                                <div class="error-message" id="emailError">Please enter a valid email address</div>
                            </div>
                        </div>
                    </div>

                    <!-- Educational Qualifications Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-graduation-cap"></i> Educational Qualifications
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="highestQualification" class="form-label required">Highest Qualification</label>
                                <div class="input-group">
                                    <select id="highestQualification" name="hqualification" class="form-control" required>
                                        <option value="">Select Highest Qualification</option>
                                        <option value="bachelor">Bachelor's Degree</option>
                                        <option value="master">Master's Degree</option>
                                        <option value="phd">PhD</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                <div class="error-message" id="qualificationError">Please select your highest qualification</div>
                            </div>

                            <div class="form-group">
                                <label for="specialization" class="form-label required">Specialization/Subject</label>
                                <input type="text" id="specialization" name="ssubject" class="form-control" placeholder="e.g., Mathematics, Physics, English" required>
                                <div class="error-message" id="specializationError">Please enter your specialization</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="bEd" class="form-label">B.Ed. Qualification</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="bedYes" name="bed" value="yes">
                                        <label for="bedYes">Yes</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="bedNo" name="bed" value="no">
                                        <label for="bedNo">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="teachingExperience" class="form-label required">Years of Teaching Experience</label>
                                <div class="input-group">
                                    <select id="teachingExperience" name="experience" class="form-control" required>
                                        <option value="">Select Experience</option>
                                        <option value="0-1">0-1 years</option>
                                        <option value="2-3">2-3 years</option>
                                        <option value="3-5">3-5 years</option>
                                        <option value="6-10">6-10 years</option>
                                        <option value="10+">10+ years</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                <div class="error-message" id="experienceError">Please select your teaching experience</div>
                            </div>
                        </div>

                    <!-- Teaching Preferences Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-chalkboard"></i> Teaching Preferences
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="preferredSubjects" class="form-label required">Preferred Subjects</label>
                                <div class="checkbox-group">
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="math" name="subjects[]" value="math">
                                        <label for="math">Mathematics</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="science" name="subjects[]" value="science">
                                        <label for="science">Science</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="english" name="subjects[]" value="english">
                                        <label for="english">English</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="hindi" name="subjects[]" value="hindi">
                                        <label for="hindi">Hindi</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="social" name="subjects[]" value="social">
                                        <label for="social">Social Studies</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="computer" name="subjects[]" value="computer">
                                        <label for="computer">Computer Science</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="physics" name="subjects[]" value="physics">
                                        <label for="physics">Physics</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="chemistry" name="subjects[]" value="chemistry">
                                        <label for="chemistry">Chemistry</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="biology" name="subjects[]" value="biology">
                                        <label for="biology">Biology</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="otherSubject" name="subjects[]" value="other">
                                        <label for="otherSubject">Other</label>
                                    </div>
                                </div>
                                <div class="error-message" id="subjectsError">Please select at least one subject</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="preferredClasses" class="form-label required">Preferred Classes</label>
                                <div class="checkbox-group">
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="LKG">
                                        <label for="class6">Class LKG</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="UKG">
                                        <label for="class6">Class UKG</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="1">
                                        <label for="class6">Class 1</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="2">
                                        <label for="class6">Class 2</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="3">
                                        <label for="class6">Class 3</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="4">
                                        <label for="class6">Class 4</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class6" name="classes[]" value="5">
                                        <label for="class6">Class 5</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class7" name="classes[]" value="6">
                                        <label for="class7">Class 6</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class8" name="classes[]" value="7">
                                        <label for="class8">Class 7</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class9" name="classes[]" value="8">
                                        <label for="class9">Class 8</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class10" name="classes[]" value="9">
                                        <label for="class10">Class 9</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class11" name="classes[]" value="10">
                                        <label for="class11">Class 10</label>
                                    </div>
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class12" name="classes[]" value="11">
                                        <label for="class12">Class 11</label>
                                    </div>
                                        <div class="checkbox-option">
                                            <input type="checkbox" id="class12" name="classes[]" value="12">
                                            <label for="class12">Class 12</label>
                                        </div>
                                </div>
                                <div class="error-message" id="classesError">Please select at least one class</div>
                            </div>
                        </div>
                    <!-- Documents Upload Section -->
                     <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-file-upload"></i> Documents Upload
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required">Resume/CV</label>
                                <div class="file-upload" id="resumeUpload">
                                    <i class="fas fa-file-pdf"></i>
                                    <p>Click to upload your resume (PDF, DOC, DOCX)</p>
                                    <p class="form-text">Max file size: 5MB</p>
                                    <input type="file" id="resume" name="resume" required>
                                </div>
                                <div class="error-message" id="resumeError">Please upload your resume</div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Educational Certificates</label>
                                <div class="file-upload" id="certificatesUpload">
                                    <i class="fas fa-file-archive"></i>
                                    <p>Click to upload educational certificates (PDF, JPG, PNG)</p>
                                    <p class="form-text">You can upload multiple files as a ZIP archive</p>
                                    <input type="file" id="certificates" name="certificates[]" multiple>
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">ID Proof</label>
                                <div class="file-upload" id="idProofUpload">
                                    <i class="fas fa-id-card"></i>
                                    <p>Click to upload ID proof (Aadhaar, PAN, etc.)</p>
                                    <p class="form-text">Accepted formats: PDF, JPG, PNG</p>
                                    <input type="file" id="idProof" name="idproof" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Passport Size Photo</label>
                                <div class="file-upload" id="photoUpload">
                                    <i class="fas fa-camera"></i>
                                    <p>Click to upload passport size photo</p>
                                    <p class="form-text">Accepted formats: JPG, PNG (Max: 2MB)</p>
                                    <input type="file" id="photo" name="photo">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                                            <div class="form-row">
                            <div class="form-group">
                                <div class="checkbox-option">
                                    <input type="checkbox" id="agreeTerms" required>
                                    <label for="agreeTerms" class="form-label">I certify that the information provided is accurate and complete to the best of my knowledge.</label>
                                </div>
                                <div class="error-message" id="termsError">You must agree to the terms</div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="reset" class="btn btn-reset">
                            <i class="fas fa-redo"></i> Reset Form
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileToggle = document.getElementById('mobileToggle');
            const navMenu = document.getElementById('navMenu');
            
            mobileToggle.addEventListener('click', function() {
                navMenu.classList.toggle('mobile-open');
                
                // Change icon
                const icon = mobileToggle.querySelector('i');
                if (navMenu.classList.contains('mobile-open')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
            
            // File upload functionality
            const fileUploads = document.querySelectorAll('.file-upload');
            fileUploads.forEach(upload => {
                const input = upload.querySelector('input[type="file"]');
                upload.addEventListener('click', () => {
                    input.click();
                });
                
                input.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        upload.style.borderColor = 'var(--success)';
                        upload.style.backgroundColor = '#f0fff0';
                    }
                });
            });
            
            // Export data button
            document.getElementById('exportDataBtn').addEventListener('click', function() {
                alert('Exporting teacher data...');
            });
            
            // Navigation menu active state
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    if (!this.classList.contains('active')) {
                        navItems.forEach(i => i.classList.remove('active'));
                        this.classList.add('active');
                        
                        // Close mobile menu on click
                        if (window.innerWidth <= 992) {
                            navMenu.classList.remove('mobile-open');
                            mobileToggle.querySelector('i').classList.remove('fa-times');
                            mobileToggle.querySelector('i').classList.add('fa-bars');
                        }
                    }
                });
            });
            
            // Search functionality
            const searchInput = document.querySelector('.search-bar input');
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    alert(`Searching for: "${this.value}"`);
                    this.value = '';
                }
            });
            
            // Notification bell
            const notificationBell = document.querySelector('.notifications');
            notificationBell.addEventListener('click', function() {
                alert('You have 3 unread notifications');
            });
        });

        function show() {

    var form = new FormData();

    form.append("firstName", $("#firstName").val());
    form.append("lastName", $("#lastName").val());
    form.append("dob", $("#dateOfBirth").val());
    form.append("gender", $('input[name="gender"]:checked').val());
    form.append("nationality", $("#nationality").val());
    form.append("gid", $("#idNumber").val());
    form.append("address", $("#address").val());
    form.append("city", $("#city").val());
    form.append("state", $("#state").val());
    form.append("pincode", $("#pincode").val());
    form.append("password", $("#password").val());
    form.append("phone", $("#phone").val());
    form.append("email", $("#email").val());

    form.append("hqualification", $("#highestQualification").val());
    form.append("ssubject", $("#ssubject").val());
    form.append("bed", $('input[name="bed"]:checked').val());
    form.append("experience", $("#teachingExperience").val());

    // FILES
    form.append("resume", $("#resume")[0].files[0]);
    form.append("photo", $("#photo")[0].files[0]);
    form.append("idproof", $("#idProof")[0].files[0]);

    // MULTIPLE SUBJECTS
    var subjects = [];
    $('input[name="subjects[]"]:checked').each(function () {
        subjects.push($(this).val());
    });
    form.append("subjects", JSON.stringify(subjects));

    // MULTIPLE CLASSES
    var classes = [];
    $('input[name="classes[]"]:checked').each(function () {
        classes.push($(this).val());
    });
    form.append("classes", JSON.stringify(classes));

    // AJAX REQUEST
    $.ajax({
        url: "/teacher_registration",
        type: "POST",
        data: form,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {
            alert("Teacher registered successfully!");
        },
        error: function (xhr) {
            alert("Error: " + xhr.responseText);
        }
    });

}

    </script>
</body>
</html>