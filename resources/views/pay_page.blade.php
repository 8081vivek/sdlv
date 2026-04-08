<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Payment - Student Management</title>
    <link rel="shortcut icon" href="image/logo.jpeg" type="image/jpeg">
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            font-family: serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            min-height: 100vh;
        }
        .content{
            margin:30px;
        }
        
        
        .header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary);
        }
        
        .header h1 {
            color: var(--primary);
            font-size: 32px;
            margin-bottom: 8px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .header p {
            color: var(--dark);
            font-size: 16px;
            opacity: 0.8;
        }
        
        .student-info-container {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 25px;
            width:100%;
            
            margin-bottom: 30px;
            border-left: 5px solid var(--accent);
        }
        
        .student-info-container table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .student-info-container th, 
        .student-info-container td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(138, 69, 19, 0.1);
        }
        
        .student-info-container th {
            width: 30%;
            color: var(--primary);
            font-weight: 700;
            font-size: 16px;
        }
        
        .student-info-container td {
            color: var(--dark);
            font-weight: 500;
            font-size: 16px;
        }
        
        .student-info-container tr:last-child th, 
        .student-info-container tr:last-child td {
            border-bottom: none;
        }
        
        .highlight {
            color: var(--accent);
            font-weight: 800;
            font-size: 20px;
        }
        
        .payment-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 20px;
        }
        
        .payment-methods {
            flex: 1;
            min-width: 300px;
        }
        
        .payment-form-container {
            flex: 1;
            min-width: 300px;
        }
        
        .payment-methods h2, .payment-form-container h2 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--secondary);
        }
        
        .payment-options {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .payment-option {
            flex: 1;
            text-align: center;
            padding: 25px 15px;
            border: 2px solid rgba(138, 69, 19, 0.2);
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            background-color: var(--white);
        }
        
        .payment-option:hover {
            border-color: var(--primary);
            background-color: rgba(26, 75, 140, 0.05);
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }
        
        .payment-option.selected {
            border-color: var(--primary);
            background-color: rgba(26, 75, 140, 0.1);
            box-shadow: 0 6px 20px rgba(26, 75, 140, 0.15);
        }
        
        .payment-option i {
            font-size: 36px;
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        .payment-option.selected i {
            color: var(--accent);
        }
        
        .payment-option h3 {
            font-size: 20px;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .payment-option p {
            color: var(--dark);
            font-size: 14px;
            opacity: 0.7;
        }
        
        .payment-form {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 25px;
            border-top: 5px solid var(--primary);
        }
        
        .form-group {
            margin-bottom: 22px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--primary);
            font-size: 16px;
        }
        
        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid rgba(138, 69, 19, 0.2);
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
            background-color: var(--light);
            color: var(--dark);
        }
        
        .form-group input:focus, 
        .form-group select:focus {
            border-color: var(--primary);
            outline: none;
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }
        
        .amount-input {
            position: relative;
        }
        
        .amount-input span {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary);
            font-weight: 600;
            font-size: 18px;
        }
        
        .amount-input input {
            padding-left: 45px;
            font-weight: 600;
            color: var(--accent);
        }
        
        .fee-summary {
            background-color: rgba(138, 69, 19, 0.05);
            padding: 22px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary);
        }
        
        .fee-summary h3 {
            color: var(--primary);
            margin-bottom: 18px;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .fee-summary h3 i {
            color: var(--secondary);
        }
        
        .fee-summary div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px dashed rgba(138, 69, 19, 0.2);
        }
        
        .fee-total {
            font-weight: 800;
            font-size: 20px;
            color: var(--primary);
            border-top: 2px solid var(--secondary);
            padding-top: 15px;
            margin-top: 15px;
            border-bottom: none !important;
        }
        
        .btn-submit {
            background: var(--gradient);
            color: var(--white);
            border: none;
            padding: 18px 30px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 700;
            transition: var(--transition);
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        
        .btn-submit:hover {
            background: linear-gradient(135deg, #153a6e, #3a68a5);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(26, 75, 140, 0.3);
        }
        
        .btn-submit:active {
            transform: translateY(-1px);
        }
        
        .cash-payment-instructions, .online-payment-instructions {
            background-color: rgba(255, 165, 0, 0.1);
            padding: 22px;
            border-radius: 10px;
            margin-top: 20px;
            border-left: 4px solid var(--warning);
            display: none;
        }
        
        .cash-payment-instructions h3, .online-payment-instructions h3 {
            color: var(--secondary);
            margin-bottom: 12px;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .cash-payment-instructions h3 i, .online-payment-instructions h3 i {
            color: var(--warning);
        }
        
        .cash-payment-instructions p, .online-payment-instructions p {
            margin-bottom: 12px;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .cash-payment-instructions ul, .online-payment-instructions ul {
            padding-left: 22px;
            color: var(--dark);
        }
        
        .cash-payment-instructions li, .online-payment-instructions li {
            margin-bottom: 8px;
            line-height: 1.5;
        }
        
        .online-payment-instructions {
            background-color: rgba(34, 139, 34, 0.1);
            border-left: 4px solid var(--success);
        }
        
        .online-payment-instructions h3 i {
            color: var(--success);
        }
        
        @media (max-width: 768px) {
           
            
            .payment-container {
                flex-direction: column;
            }
            
            .payment-options {
                flex-direction: column;
            }
            
            .header h1 {
                font-size: 28px;
            }
        }
        
        .hidden {
            display: none;
        }
        
        small {
            color: var(--secondary);
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
        
        .payment-status {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(34, 139, 34, 0.1);
            border-radius: 10px;
            border-left: 4px solid var(--success);
        }
        
        .payment-status i {
            font-size: 32px;
            color: var(--success);
        }
        
        .payment-status h4 {
            color: var(--success);
            font-size: 18px;
        }
        
        .payment-status p {
            color: var(--dark);
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
    <!-- Include Sidebar -->
    @include('Admin_sidebar')
    
    <!-- Main Content -->
    <div class="content">
        <div class="header">
            <h1>Fee Payment Portal</h1>
            <p>Complete the payment for student fees securely</p>
        </div>
        
        <div class="student-info-container">
            <table>
                <tr>
                    <th>Student Name</th>
                    <td>{{$data->name}}</td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>{{$data->phone}}</td>
                </tr>
                <tr>
                    <th>Class/Grade</th>
                    <td>{{$data->class}}</td>
                </tr>
                <tr>
                    <th>Father's Name</th>
                    <td>Mr. {{$data->fname}}</td>
                </tr>
                <tr>
                    <th>Total Course Fee</th>
                    <td class="highlight">₹15,000</td>
                </tr>
                <tr>
                    <th>Remaining Balance</th>
                    <td class="highlight">₹8,500</td>
                </tr>
            </table>
        </div>
        
            
            <div class="payment-form-container">
                <h2><i class="fas fa-file-invoice-dollar"></i> Payment Details</h2>
                
                <div class="payment-form">
                    <form id="onlineform" action="" method="POST">
        <input type="hidden" id="email" value="{{$data->email}}" required />
                        @csrf <!-- Add CSRF token for Laravel -->
                          <div class="form-group">
                            <label for="paymentNote"><i class="fa-solid fa-user"></i> Student name</label>
                            <input type="text"  value="{{$data->name}}" id="name" name="name" readonly>
                        </div>  <div class="form-group">
                            <label for="paymentNote"><i class="fa-solid fa-user"></i> Student,s Father Name</label>
                            <input type="text"  name="fname" value="{{$data->fname}}" readonly>
                        </div>  <div class="form-group">
                            <label for="paymentNote"><i class="fa-solid fa-arrow-down-1-9"></i> Class</label>
                            <input type="text"  name="class" value="{{$data->class}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="paymentDate"><i class="fa-solid fa-mobile"></i>Mobile number</label>
                            <input type="number"  name="phone" id="mobile" value="{{$data->phone}}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="paymentAmount"><i class="fas fa-rupee-sign"></i> Amount to Pay</label>
                            <div class="amount-input">
                                <span>₹</span>
                                <input type="text"  id="amount" onkeyup="writeAmount()" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="5"  name="paymentAmount"  required>
                            </div>
                            <small>Maximum payable amount: ₹50000 (Minimum: ₹10)</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="paymentMode"><i class="fas fa-money-check-alt"></i> Payment Mode</label>
                            <select id="paymentMode" name="paymentMode" required>
                                <option value="">----Please select Payment Mode----</option>
                                <option value="cash">Cash</option>
                                <option value="online">Online Transfer</option>
                            </select>
                        </div>
                        
                      
                      
                        <div class="fee-summary">
                            <h3><i class="fas fa-file-invoice"></i> Fee Summary</h3>
                            <div>
                                <span>Total Course Fee:</span>
                                <span>₹15,000</span>
                            </div>
                            <div>
                                <span>Amount Already Paid:</span>
                                <span>₹6,500</span>
                            </div>
                            <div>
                                <span>Remaining Balance:</span>
                                <span>₹8,500</span>
                            </div>
                            <div class="fee-total">
                                <span>Payment Amount:</span>
                                <span id="displayAmount">₹0</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-submit" id="btn1">
                            <i class="fas fa-lock"></i> Confirm Payment of ₹ <span id="pay_amount">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

     <script>



function writeAmount() {
    setTimeout(function () {
        var a = document.getElementById("amount").value;
        document.getElementById("pay_amount").innerHTML = a;
        document.getElementById("displayAmount").innerHTML = a;
    }, 200);
}


       
$(document).ready(function () {
    $("#onlineform").submit(function (e) {
        e.preventDefault();
        
        let btn = $("#btn1");
        let amt = $("#amount").val();
        
        btn.prop("disabled", true).text("Wait...");

        $.ajax({
            url: "{{ route('rzp.order') }}", // Humara naya local route
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                amount: amt
            },
            success: function (res) {
                // Debugging ke liye console dekhein
                console.log("Response:", res);

                if (res.key && res.token) {
                    var options = {
                        "key": res.key, 
                        "amount": amt * 100,
                        "currency": "INR",
                        "name": "School Fee Payment",
                        "order_id": res.token,
                        "prefill": {
                            "name": "{{ $data->name ?? '' }}",
                            "email": "{{ $data->email ?? '' }}",
                            "contact": "{{ $data->phone ?? '' }}"
                        },
                        "handler": function (response) {
                            alert("Payment Successful! ID: " + response.razorpay_payment_id);
                            window.location.reload();
                        },
                        "modal": {
                            "ondismiss": function() {
                                btn.prop("disabled", false).text("Confirm Payment");
                            }
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                } else {
                    alert("Error: Key or Token not found in API response.");
                    btn.prop("disabled", false).text("Confirm Payment");
                }
            },
            error: function () {
                alert("Server Error! Check if your Internet is on.");
                btn.prop("disabled", false).text("Confirm Payment");
            }
        });
    });
});</script>

</body>
</html>