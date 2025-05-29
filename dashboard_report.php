<?php
include('header.php');
checkUser();
userArea();

$from = '';
$to = '';
$sub_sql = "";

// Get values from GET request
if (isset($_GET['from'])) {
    $from = get_safe_value($_GET['from']);
}
if (isset($_GET['to'])) {
    $to = get_safe_value($_GET['to']);
}

// Apply filter only if both are provided
if (!empty($from) && !empty($to)) {
    $sub_sql = " AND expense.expense_date BETWEEN '$from' AND '$to'";
}

$res = mysqli_query($con, "SELECT expense.price, category.name, expense.item, expense.expense_date
                           FROM expense, category 
                           WHERE expense.category_id = category.id 
                             AND expense.added_by = '" . $_SESSION['UID'] . "'
                             $sub_sql");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Expense Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .main-content {
            max-width: 1100px;
            margin: auto;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 25px;
            color: #2c3e50;
            font-weight: 700;
            font-size: 24px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 600px;
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #e1e4e8;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9fbfd;
        }

        tr:hover {
            background-color: #dff1ff;
        }

        .total-row {
            background-color: #e1f5fe;
            font-weight: 700;
        }

        .no-data {
            font-size: 18px;
            color: #c0392b;
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 700px) {
            body {
                padding: 10px;
            }
            table {
                font-size: 14px;
            }
            th, td {
                padding: 10px 12px;
            }
            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="main-content">
    <?php if (!empty($from) && !empty($to)): ?>
        <h2>Expense Report: From <strong><?php echo htmlspecialchars($from); ?></strong> To <strong><?php echo htmlspecialchars($to); ?></strong></h2>
    <?php else: ?>
        <h2>All Expenses</h2>
    <?php endif; ?>

    <?php if (mysqli_num_rows($res) > 0): ?>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Expense Date</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $final_price = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $final_price += $row['price'];
                        echo "<tr>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['item']) . "</td>
                                <td>" . htmlspecialchars($row['expense_date']) . "</td>
                                <td>Ksh " . htmlspecialchars(number_format($row['price'], 2)) . "</td>
                              </tr>";
                    }
                    ?>
                    <tr class="total-row">
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>Ksh <?php echo number_format($final_price, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="no-data">No data found</div>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>

</body>
</html>
