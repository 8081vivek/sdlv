@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration - B.S.D.L.V. Inter College</title>
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
            --gradient: linear-gradient(135deg, #1a4b8c, #4a7abc);
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
            --border-radius: 12px;
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
            color: var(--dark);
            background-color:white !important;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Section */
        .page-header {
            text-align: center;
            margin-bottom: 50px;
            padding: 40px 20px;
            /* background: linear-gradient(135deg, rgba(26, 75, 140, 0.05), rgba(139, 69, 19, 0.05)); */
            border-radius: var(--border-radius);
            /* border: 1px solid rgba(26, 75, 140, 0.1); */
        }

       
      

      

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            margin-bottom: 15px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 0.5px;
        }

        .page-header p {
            font-size: 1.3rem;
            opacity: 0.9;
            color: var(--dark);
            max-width: 700px;
            margin: 0 auto;
            font-family: 'Source Serif Pro', serif;
        }

        /* Registration Form */
        .registration-container {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 50px;
            border: 1px solid rgba(26, 75, 140, 0.1);
            transition: var(--transition);
        }

        .registration-container:hover {
            box-shadow: var(--shadow-hover);
        }

        .form-header {
            background: var(--gradient);
            color: var(--white);
            padding: 30px 40px;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .form-header:hover::before {
            transform: translateX(100%);
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        .form-content {
            padding: 50px;
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 50px;
            padding-bottom: 40px;
            border-bottom: 1px solid #eaeaea;
            position: relative;
        }

        .form-section::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100px;
            height: 3px;
            background: var(--gradient);
            border-radius: 3px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--primary);
            margin-bottom: 30px;
            padding-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 2px solid rgba(26, 75, 140, 0.1);
        }

        .section-title i {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.8rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(26, 75, 140, 0.1);
        }

        /* Form Layout */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 25px;
        }

        .form-group {
            flex: 1 1 300px;
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
            font-family: 'Playfair Display', serif;
        }

        .required::after {
            content: " *";
            color: var(--accent);
        }

        /* Input Fields */
        .input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e8f2;
            border-radius: 10px;
            font-size: 1.05rem;
            transition: var(--transition);
            background-color: var(--white);
            font-family: 'Source Serif Pro', serif;
            color: var(--dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: rgba(26, 75, 140, 0.02);
            box-shadow: 0 0 0 4px rgba(26, 75, 140, 0.1);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            opacity: 0.7;
            font-size: 1.1rem;
        }

        /* Enhanced File Upload Boxes */
        .file-upload-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .file-upload-box {
            border: 2px dashed #d1e3f8;
            border-radius: var(--border-radius);
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            background: rgba(240, 247, 255, 0.3);
            position: relative;
            overflow: hidden;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .file-upload-box:hover {
            border-color: var(--primary);
            background: rgba(26, 75, 140, 0.03);
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .file-upload-box i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .file-upload-box:hover i {
            transform: scale(1.1);
            color: var(--secondary);
        }

        .file-upload-box input {
            display: none;
        }

        .file-upload-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }

        .file-upload-info {
            font-size: 0.95rem;
            color: #666;
            margin-top: 8px;
            opacity: 0.8;
        }

        .file-preview {
            margin-top: 15px;
            padding: 10px;
            background: rgba(26, 75, 140, 0.05);
            border-radius: 8px;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Radio and Checkbox Styles */
        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-option, .checkbox-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            background: rgba(240, 247, 255, 0.5);
            border-radius: 10px;
            transition: var(--transition);
            cursor: pointer;
        }

        .radio-option:hover, .checkbox-option:hover {
            background: rgba(26, 75, 140, 0.1);
            transform: translateY(-2px);
        }

        .radio-option input, .checkbox-option input {
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
        }

        /* Submit Button */
        .submit-section {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eaeaea;
        }

        .submit-btn {
            background: var(--gradient);
            color: var(--white);
            border: none;
            padding: 18px 50px;
            border-radius: 12px;
            font-size: 1.3rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Playfair Display', serif;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(26, 75, 140, 0.2);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(26, 75, 140, 0.3);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn i {
            font-size: 1.4rem;
        }

        /* Alerts and Messages */
        .alert {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
            font-family: 'Source Serif Pro', serif;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #228B22, #32CD32);
            color: var(--white);
            border-left: 5px solid #1e7e34;
        }

        .alert-success i {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .error-message {
            color: var(--accent);
            font-size: 0.95rem;
            margin-top: 8px;
            padding: 8px 12px;
            background: rgba(220, 20, 60, 0.05);
            border-radius: 6px;
            border-left: 3px solid var(--accent);
        }

        /* Terms and Conditions */
        .terms-section {
            background: rgba(240, 247, 255, 0.5);
            padding: 25px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .terms-checkbox input {
            margin-top: 5px;
            accent-color: var(--primary);
        }

        .terms-text {
            font-size: 1rem;
            color: var(--dark);
        }

        .terms-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            position: relative;
        }

        .terms-text a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .terms-text a:hover::after {
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .form-content {
                padding: 40px 30px;
            }
            
            .file-upload-container {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5rem;
            }
            
            .logo-text {
                font-size: 2.2rem;
            }
            
            .logo-icon {
                font-size: 2.8rem;
            }
            
            .form-header {
                padding: 25px 30px;
            }
            
            .form-header h2 {
                font-size: 1.6rem;
            }
            
            .section-title {
                font-size: 1.4rem;
            }
            
            .form-content {
                padding: 30px 20px;
            }
            
            .submit-btn {
                padding: 16px 40px;
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 15px;
            }
            
            .page-header {
                padding: 30px 15px;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .logo-text {
                font-size: 1.8rem;
            }
            
            .logo-icon {
                font-size: 2.2rem;
            }
            
            .form-section {
                padding-bottom: 30px;
            }
            
            .form-row {
                gap: 20px;
            }
            
            .file-upload-container {
                grid-template-columns: 1fr;
            }
            
            .submit-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animation for form sections */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-section {
            animation: fadeInUp 0.6s ease forwards;
        }

        .form-section:nth-child(1) { animation-delay: 0.1s; }
        .form-section:nth-child(2) { animation-delay: 0.2s; }
        .form-section:nth-child(3) { animation-delay: 0.3s; }
        .form-section:nth-child(4) { animation-delay: 0.4s; }
        .form-section:nth-child(5) { animation-delay: 0.5s; }
        .form-section:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body>
    @include("Admin_sidebar")
    
    <div class="container">
        <!-- Page Header -->
        <header class="page-header">
     
            
            <h1>Teacher Registration</h1>
            <p>Join our esteemed faculty at B.S.D.L.V. Inter College. Complete the form below to apply for a teaching position.</p>
        </header>

     <!-- Registration Form -->
        <div class="registration-container">
            <div class="form-header">
                <h2>Faculty Application Form</h2>
            </div>

            <div class="form-content">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <form id="teacherRegistrationForm" method="POST" action="/teacher_registration" enctype="multipart/form-data">
                    @csrf  

                    <input type="hidden" name="type" value="{{$type}}">
                    <!-- ====================== PERSONAL INFORMATION ====================== -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user-tie"></i> Personal Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName" class="form-label required">First Name</label>
                                <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" class="form-control" placeholder="Enter your first name" required>
                                @error('firstName')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lastName" class="form-label required">Last Name</label>
                                <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" class="form-control" placeholder="Enter your last name" required>
                                @error('lastName')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dateOfBirth" class="form-label required">Date of Birth</label>
                                <div class="input-group">
                                    <input type="date" id="dateOfBirth" name="dob" value="{{ old('dob') }}" class="form-control" required>
                                    <i class="fas fa-calendar-alt input-icon"></i>
                                </div>
                                @error('dob')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Gender</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="gender_male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                        <label for="gender_male">Male</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="gender_female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        <label for="gender_female">Female</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="gender_other" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                        <label for="gender_other">Other</label>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nationality" class="form-label required">Nationality</label>
                                <div class="input-group">
                                    <select id="nationality" name="nationality" class="form-control" required>
                                        <option value="">Select Nationality</option>
                                        <option value="indian" {{ old('nationality') == 'indian' ? 'selected' : '' }}>Indian</option>
                                        <option value="other" {{ old('nationality') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                @error('nationality')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="idNumber" class="form-label required">Government ID Number</label>
                                <input type="text" id="idNumber" name="gid" value="{{ old('gid') }}" class="form-control" placeholder="Aadhaar, PAN, or other ID" required>
                                @error('gid')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- ====================== CONTACT INFORMATION ====================== -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-address-book"></i> Contact Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="address" class="form-label required">Residential Address</label>
                                <textarea id="address" name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city" class="form-label required">City</label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control" required>
                                @error('city')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="state" class="form-label required">State</label>
                                <input type="text" id="state" name="state" value="{{ old('state') }}" class="form-control" required>
                                @error('state')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="pincode" class="form-label required">PIN Code</label>
                                <input type="text" id="pincode" name="pincode" value="{{ old('pincode') }}" maxlength="6" class="form-control" required>
                                @error('pincode')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label required">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <i class="fas fa-lock input-icon"></i>
                                </div>
                                @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label required">Phone Number</label>
                                <div class="input-group">
                                    <input type="text" id="phone" name="phone" maxlength="10" value="{{ old('phone') }}" class="form-control" required>
                                    <i class="fas fa-phone input-icon"></i>
                                </div>
                                @error('phone')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label required">Email Address</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                    <i class="fas fa-envelope input-icon"></i>
                                </div>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- ====================== EDUCATIONAL QUALIFICATIONS ====================== -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-graduation-cap"></i> Educational Qualifications
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required">Highest Qualification</label>
                                <div class="input-group">
                                    <select name="hqualification" class="form-control" required>
                                        <option value="">Select Highest Qualification</option>
                                        <option value="bachelor" {{ old('hqualification') == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                                        <option value="master" {{ old('hqualification') == 'master' ? 'selected' : '' }}>Master's Degree</option>
                                        <option value="phd" {{ old('hqualification') == 'phd' ? 'selected' : '' }}>PhD</option>
                                        <option value="other" {{ old('hqualification') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                @error('hqualification')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Specialization / Subject</label>
                                <input type="text" name="ssubject" class="form-control" value="{{ old('ssubject') }}" required>
                                @error('ssubject')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">B.Ed Qualification</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="bedYes" name="bed" value="yes" {{ old('bed') == 'yes' ? 'checked' : '' }}>
                                        <label for="bedYes">Yes</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="bedNo" name="bed" value="no" {{ old('bed') == 'no' ? 'checked' : '' }}>
                                        <label for="bedNo">No</label>
                                    </div>
                                </div>
                                @error('bed')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Teaching Experience</label>
                                <div class="input-group">
                                    <select name="experience" class="form-control" required>
                                        <option value="">Select Experience</option>
                                        <option value="0-1" {{ old('experience') == '0-1' ? 'selected' : '' }}>0-1 years</option>
                                        <option value="2-3" {{ old('experience') == '2-3' ? 'selected' : '' }}>2-3 years</option>
                                        <option value="3-5" {{ old('experience') == '3-5' ? 'selected' : '' }}>3-5 years</option>
                                        <option value="6-10" {{ old('experience') == '6-10' ? 'selected' : '' }}>6-10 years</option>
                                        <option value="10+" {{ old('experience') == '10+' ? 'selected' : '' }}>10+ years</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                @error('experience')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- ====================== TEACHING PREFERENCES ====================== -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-chalkboard"></i> Teaching Preferences
                        </h3>

                        <div class="form-group">
                            <label class="form-label required">Preferred Subjects</label>
                            <div class="checkbox-group">
                                @php
                                    $subjects = ['math','science','english','hindi','social','computer','physics','chemistry','biology','other'];
                                    $oldSubjects = old('subjects', []);
                                @endphp
                                @foreach($subjects as $sub)
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="subject_{{ $sub }}" name="subjects[]" value="{{ $sub }}" {{ in_array($sub, $oldSubjects) ? 'checked' : '' }}>
                                        <label for="subject_{{ $sub }}">{{ ucfirst($sub) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('subjects')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Preferred Classes</label>
                            <div class="checkbox-group">
                                @php
                                    $classes = ['LKG','UKG',1,2,3,4,5,6,7,8,9,10,11,12];
                                    $oldClasses = old('classes', []);
                                @endphp

                                @foreach($classes as $cls)
                                    <div class="checkbox-option">
                                        <input type="checkbox" id="class_{{ $cls }}" name="classes[]" value="{{ $cls }}" {{ in_array($cls, $oldClasses) ? 'checked' : '' }}>
                                        <label for="class_{{ $cls }}">Class {{ $cls }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('classes')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ====================== DOCUMENT UPLOAD ====================== -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-file-upload"></i> Documents Upload
                        </h3>

                        <div class="file-upload-container">
                            <!-- Resume Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('resume').click()">
                                <i class="fas fa-file-pdf"></i>
                                <div class="file-upload-label">Resume / CV</div>
                                <div class="file-upload-info">Upload your resume (PDF, DOC, DOCX)</div>
                                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" onchange="showFileName(this, 'resumePreview')">
                                <div id="resumePreview" class="file-preview"></div>
                            </div>

                            <!-- Certificates Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('certificates').click()">
                                <i class="fas fa-certificate"></i>
                                <div class="file-upload-label">Educational Certificates</div>
                                <div class="file-upload-info">Upload certificates (PDF, JPG, PNG)</div>
                                <input type="file" id="certificates" name="certificates[]" accept=".pdf,.jpg,.jpeg,.png" multiple onchange="showFileNames(this, 'certificatesPreview')">
                                <div id="certificatesPreview" class="file-preview"></div>
                            </div>

                            <!-- ID Proof Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('id_proof').click()">
                                <i class="fas fa-id-card"></i>
                                <div class="file-upload-label">ID Proof</div>
                                <div class="file-upload-info">Aadhaar, PAN, or other ID</div>
                                <input type="file" id="id_proof" name="idproof" accept=".pdf,.jpg,.jpeg,.png" onchange="showFileName(this, 'idProofPreview')">
                                <div id="idProofPreview" class="file-preview"></div>
                            </div>

                            <!-- Photo Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('photo').click()">
                                <i class="fas fa-camera"></i>
                                <div class="file-upload-label">Passport Photo</div>
                                <div class="file-upload-info">Recent passport size photo</div>
                                <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" onchange="showFileName(this, 'photoPreview')">
                                <div id="photoPreview" class="file-preview"></div>
                            </div>
                        </div>

                        <!-- Error Messages for File Uploads -->
                        @error('resume')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        @error('certificates')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        @error('idproof')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        @error('photo')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="terms-section">
                        <div class="terms-checkbox">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms" class="terms-text">
                                I agree to the <a href="#">Terms and Conditions</a> and confirm that all information provided is accurate and complete. I understand that providing false information may result in termination of employment.
                            </label>
                        </div>
                        @error('terms')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="submit-section">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>

       
    </div>

    <script>
        // File upload preview functionality
        function showFileName(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                preview.textContent = input.files[0].name;
                preview.style.color = 'var(--primary)';
            } else {
                preview.textContent = 'No file selected';
                preview.style.color = '#666';
            }
        }

        function showFileNames(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files.length > 0) {
                if (input.files.length === 1) {
                    preview.textContent = input.files[0].name;
                } else {
                    preview.textContent = `${input.files.length} files selected`;
                }
                preview.style.color = 'var(--primary)';
            } else {
                preview.textContent = 'No files selected';
                preview.style.color = '#666';
            }
        }

        // Phone number validation
        document.getElementById('phone').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        });

        // PIN code validation
        document.getElementById('pincode').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 6) {
                this.value = this.value.slice(0, 6);
            }
        });

        // Form validation before submit
        document.getElementById('teacherRegistrationForm').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--accent)';
                } else {
                    field.style.borderColor = '#e1e8f2';
                }
            });

            const terms = document.getElementById('terms');
            if (!terms.checked) {
                isValid = false;
                alert('Please agree to the Terms and Conditions');
                e.preventDefault();
            }

            if (!isValid) {
                e.preventDefault();
                alert('Please fill all required fields marked with *');
            }
        });

        // Date of Birth validation (must be at least 18 years old)
        document.getElementById('dateOfBirth').addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            const age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            
            if (age < 18) {
                alert('You must be at least 18 years old to register.');
                this.value = '';
            }
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strength = checkPasswordStrength(password);
            const strengthText = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong'];
            const strengthColors = ['#ff4444', '#ff8800', '#ffbb33', '#00C851', '#007E33'];
            
            // You can add a strength indicator here if needed
        });

        function checkPasswordStrength(password) {
            let score = 0;
            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;
            return score;
        }

        // File size validation
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const maxSize = 5 * 1024 * 1024; // 5MB
                const files = this.files;
                
                for (let file of files) {
                    if (file.size > maxSize) {
                        alert(`File ${file.name} is too large. Maximum size is 5MB.`);
                        this.value = '';
                        break;
                    }
                }
            });
        });
    </script>
</body>
</html>