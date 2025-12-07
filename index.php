<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Automation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<style>
    .footer {
    background: linear-gradient(135deg, #1b1b1b, #2a2a2a);
    color: #fff;
    padding: 50px 0 20px;
    margin-top: 50px;
    font-family: "Poppins", sans-serif;
}

.footer-top {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 40px;
    padding: 0 20px;
}

.footer-col h3 {
    font-size: 18px;
    margin-bottom: 15px;
    font-weight: 600;
    border-left: 4px solid #0d6efd;
    padding-left: 8px;
}

.footer-col ul {
    list-style: none;
    padding: 0;
}

.footer-col ul li {
    margin-bottom: 8px;
}

.footer-col ul li a {
    color: #ccc;
    text-decoration: none;
    transition: 0.3s;
}

.footer-col ul li a:hover {
    color: #fff;
    padding-left: 6px;
}

.brand {
    display: flex;
    align-items: center;
    font-size: 20px;
    color: #fff;
    text-decoration: none;
    gap: 10px;
    font-weight: 600;
}

.brand img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
}

.footer-brand p {
    margin-top: 12px;
    line-height: 1.5;
    color: #dcdcdc;
}

.socials i {
    font-size: 20px;
    margin-right: 12px;
    cursor: pointer;
    transition: 0.3s;
}

.socials i:hover {
    color: #0d6efd;
    transform: translateY(-3px);
}

.footer-bottom {
    text-align: center;
    margin-top: 40px;
    padding-top: 15px;
    border-top: 1px solid #444;
    color: #bbb;
}

</style>
<body>

    <!-- Header -->
    <header class="bg-light shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="https://i.pinimg.com/736x/ee/5c/8c/ee5c8c4944b5972eece6a0f41c064379.jpg" alt="Logo"
                        width="40" height="40" class="me-2">
                    Lab Automation
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">How It Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-2">
                        <a href="./form.php"><button class="btn btn-outline-primary">Sign In</button></a>
                        <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-1 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left: Text Content -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-5 fw-bold">Revolutionize Your Laboratory Testing</h1>
                    <p class="lead text-muted">
                        Advanced Lab Automation System for manufacturing excellence, streamlining testing processes,
                        tracking results, and ensuring quality control with intelligent automation.
                    </p>
                    <!-- Stats -->
                    <div class="d-flex gap-4 my-4">
                        <div class="text-center">
                            <h3 class="fw-bold text-primary">99.7%</h3>
                            <p class="text-muted mb-0">Accuracy</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold text-primary">50%</h3>
                            <p class="text-muted mb-0">Faster Testing</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold text-primary">24/7</h3>
                            <p class="text-muted mb-0">Support</p>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <button class="btn btn-primary btn-lg">Start Free Trial</button>
                        <button class="btn btn-outline-primary btn-lg">View Demo</button>
                    </div>
                </div>

                <!-- Right: Image -->
                <div class="col-lg-6 text-center">
                    <img src="./images/Analytics_Illustration-removebg-preview.png" alt="Analytics Illustration"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="fw-bold">Powerful Features for Modern Laboratories</h1>
                <p class="text-muted">Comprehensive tools to manage your entire testing lifecycle</p>
            </div>

            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-brands fa-product-hunt fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Product Management</h4>
                        <p class="text-muted mb-3">
                            Manage all your products efficiently with unique IDs, tracking, and status monitoring.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Unique Product IDs</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Manufacturing Tracking
                            </li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Status Monitoring</li>
                        </ul>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-brands fa-product-hunt fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Testing Management</h4>
                        <p class="text-muted mb-3">
                            Streamline your testing processes and ensure accurate results every time.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Unique Test IDs</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Track Test Progress</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Status Monitoring</li>
                        </ul>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-brands fa-product-hunt fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Advanced Analytics</h4>
                        <p class="text-muted mb-3">
                            Gain actionable insights with analytics dashboards and reporting tools.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Detailed Reports</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Track Trends</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Data Visualization</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Workflow Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="fw-bold">Simple & Efficient Workflow</h1>
                <p class="text-muted">Our simple steps to transform your laboratory operations</p>
            </div>

            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-solid fa-plus fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Add Product</h5>
                        <p class="text-muted mb-0">
                            Efficiently manage your products with unique IDs, tracking, and status monitoring.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-solid fa-play fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Conduct Test</h5>
                        <p class="text-muted mb-0">
                            Streamline your testing process and ensure accurate results every time.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-solid fa-chart-gantt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Analyze Data</h5>
                        <p class="text-muted mb-0">
                            Gain actionable insights with analytics dashboards and reporting tools.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="mb-3 text-primary">
                            <i class="fa-solid fa-file fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Generate Report</h5>
                        <p class="text-muted mb-0">
                            Create detailed reports and summaries for stakeholders and quality control.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5" style="background: linear-gradient(90deg, #1e3c72, #2a5298); color: #fff;">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Ready to Transform Your Laboratory?</h2>
            <p class="mb-4">Join leading manufacturing companies that trust our Lab Automation System</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <button class="btn btn-light btn-lg d-flex align-items-center">
                    <i class="fa-solid fa-play me-2"></i> Start Free Trial
                </button>
                <button class="btn btn-outline-light btn-lg d-flex align-items-center">
                    <i class="fa-solid fa-phone me-2"></i> Contact Sales
                </button>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="footer">
        <div class="footer-top">

            <div class="footer-col footer-brand">
                <a class="brand" href="#">
                    <img src="https://i.pinimg.com/736x/ee/5c/8c/ee5c8c4944b5972eece6a0f41c064379.jpg" alt="Logo">
                    <span>Lab Automation</span>
                </a>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa consectetur earum
                    porro magni ab maxime vitae sequi dicta beatae.
                </p>
            </div>

            <div class="footer-col">
                <h3>Product</h3>
                <ul>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">API Status</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Connect</h3>
                <div class="socials">
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 Lab Automation — All Rights Reserved.</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</html>