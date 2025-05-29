<?php
include('header.php');
checkUser();
userArea();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        /* General Reset & Layout */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-content {
            padding: 30px;
        }

        .section__content {
            padding: 30px;
        }

        .container-fluid {
            max-width: 1200px;
            margin: auto;
        }

        /* Dashboard Grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-sm-6, .col-lg-3 {
            flex: 1 1 calc(25% - 20px);
            min-width: 220px;
        }

        /* Overview Boxes */
        .overview-item {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 15px;
            transition: all 0.3s ease-in-out;
            padding: 20px;
        }

        .overview-item:hover {
            transform: translateY(-5px);
        }

        .overview__inner {
            text-align: center;
        }

        .overview-box .text h2 {
            font-size: 2.5rem;
            color: #3498db;
            margin: 0;
        }

        .overview-box .text span {
            display: block;
            margin-top: 8px;
            color: #555;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Utility */
        @media (max-width: 768px) {
            .col-sm-6, .col-lg-3 {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>

<script>
    setTitle("Dashboard");
    selectLink('dashboard_link');
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-25">
                <?php
                $periods = [
                    'today' => "Today's Expense",
                    'yesterday' => "Yesterday's Expense",
                    'week' => "This Week Expense",
                    'month' => "This Month Expense",
                    'year' => "This Year Expense",
                    'total' => "Total Expense"
                ];

                foreach ($periods as $key => $label) {
                    echo '<div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="text">
                                            <h2>' . getDashboardExpense($key) . '</h2>
                                            <span>' . $label . '</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
