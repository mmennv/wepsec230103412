<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Information and Event Management (SIEM) Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/siem.css') }}">
</head>
<body>
    <!-- Login Page -->
    <div class="container form-page active" id="loginPage">
        <h2>Login to SIEM Dashboard</h2>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="loginEmail" required placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="loginPassword" required placeholder="Enter your password">
        </div>
        <button onclick="login()">Secure Login</button>
        <div class="link">
            <a href="#" onclick="showPage('signupPage')">Create Account</a> |
            <a href="#" onclick="showPage('forgotPage')">Forgot Password?</a>
        </div>
    </div>

    <!-- Sign Up Page -->
    <div class="container form-page" id="signupPage">
        <h2>Register for SIEM Access</h2>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" id="signupName" required placeholder="Enter your full name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="signupEmail" required placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="signupPassword" required placeholder="Create a secure password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" id="signupConfirmPassword" required placeholder="Confirm your password">
        </div>
        <button onclick="signup()">Register Securely</button>
        <div class="link">
            <a href="#" onclick="showPage('loginPage')">Back to Login</a>
        </div>
    </div>

    <!-- Forgot Password Page -->
    <div class="container form-page" id="forgotPage">
        <h2>Reset Password</h2>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="forgotEmail" required placeholder="Enter your email">
        </div>
        <button onclick="sendVerification()">Send Verification Code</button>
        <div class="link">
            <a href="#" onclick="showPage('loginPage')">Back to Login</a>
        </div>
    </div>

    <!-- Verification Page -->
    <div class="container form-page" id="verifyPage">
        <h2>Verify Your Account</h2>
        <div class="form-group">
            <label>Verification Code (Check below)</label>
            <p id="verificationCode" style="color: #3498db; font-weight: 700;"></p>
        </div>
        <div class="form-group">
            <label>Enter Code</label>
            <input type="text" id="verifyInput" required placeholder="Enter verification code">
        </div>
        <button onclick="verifyCode()">Verify Now</button>
        <div class="link">
            <a href="#" onclick="showPage('loginPage')">Back to Login</a>
        </div>
    </div>

    <!-- Dashboard Page -->
    <div id="dashboard">
        <div class="sidebar">
            <h3>Security Dashboard</h3>
            <ul>
                <li onclick="showDashboardPage('homePage')">Home Page</li>
                <li onclick="showDashboardPage('logSearchPage')">Log Search</li>
                <li>Network</li>
                <li>Logs</li>
            </ul>
            <div class="system-time" id="systemTime">System Time: <span id="currentTime"></span></div>
        </div>
        <div class="main-content">
            <!-- Home Page -->
            <div id="homePage" class="dashboard-page active">
                <div class="header">
                    <h2 class="header-title">Dashboard Overview</h2>
                </div>
                <div class="stats-container">
                    <div class="stat-card">
                        <h3>Users</h3>
                        <p id="userCount">0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Events Processed</h3>
                        <p id="eventsProcessed">0</p>
                    </div>
                    <div class="stat-card">
                        <h3>New Alerts</h3>
                        <p id="newAlerts">0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Data Collection Issues</h3>
                        <p id="dataIssues">0</p>
                    </div>
                </div>
                <div class="user-list">
                    <h3>Registered Users</h3>
                    <div id="userList"></div>
                </div>
            </div>

            <!-- Log Search Page -->
            <div id="logSearchPage" class="dashboard-page">
                <div class="header">
                    <h2 class="header-title">Log Search</h2>
                </div>
                <div class="log-search-container">
                    <div class="search-form">
                        <input type="text" id="searchQuery" placeholder="Quick Search..." required>
                        <button class="search-button" onclick="searchLogs()">Search</button>
                    </div>
                    <div class="current-stats">
                        <p>Start Time: <input type="datetime-local" id="startTime" value="2025-03-04T11:58:00"></p>
                        <p>End Time: <input type="datetime-local" id="endTime" value="2025-03-04T12:03:00"></p>
                        <p>View: <select id="viewOption">
                            <option value="default">Default (No History)</option>
                        </select></p>
                        <p>Total Results: 0 (0 MB Total) | Data Files Searched: 0 (0 TB Total) | Index File Count: 0</p>
                        <p>Real Time (streaming): 26ms | Last 5 Minutes (auto refresh): 26ms</p>
                        <div class="time-range-dropdown">
                            <select id="timeRangeDropdown">
                                <option value="last5">Last 5 Minutes</option>
                                <option value="last15">Last 15 Minutes</option>
                                <option value="last30">Last 30 Minutes</option>
                                <option value="last45">Last 45 Minutes</option>
                                <option value="lastHour">Last Hour</option>
                                <option value="last3">Last 3 Hours</option>
                                <option value="last6">Last 6 Hours</option>
                                <option value="last12">Last 12 Hours</option>
                                <option value="last24">Last 24 Hours</option>
                                <option value="last3Days">Last 3 Days</option>
                                <option value="last7Days">Last 7 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="log-results">
                        <table class="log-table">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Log Source</th>
                                    <th>Event Count</th>
                                    <th>Time</th>
                                    <th>Category</th>
                                    <th>Source IP</th>
                                    <th>Destination IP</th>
                                </tr>
                            </thead>
                            <tbody id="logResults"></tbody>
                        </table>
                        <p>Displaying 0 to 0 of 0 items (Elapsed time: 0:00:206)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/siem.js') }}"></script>
</body>
</html> 