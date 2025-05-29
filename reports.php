<?php
include('header.php');
checkUser();
userArea();

$cat_id = '';
$sub_sql = '';
$from = '';
$to = '';

if (isset($_GET['category_id']) && $_GET['category_id'] > 0) {
    $cat_id = get_safe_value($_GET['category_id']);
    $sub_sql = " and category.id=$cat_id ";
}

if (isset($_GET['from'])) {
    $from = get_safe_value($_GET['from']);
}
if (isset($_GET['to'])) {
    $to = get_safe_value($_GET['to']);
}

if ($from !== '' && $to != '') {
    $sub_sql .= " and expense.expense_date between '$from' and '$to' ";
}

$res = mysqli_query($con, "SELECT SUM(expense.price) as price, category.name 
                           FROM expense, category 
                           WHERE expense.category_id=category.id 
                           AND expense.added_by='" . $_SESSION['UID'] . "' $sub_sql  
                           GROUP BY expense.category_id");
?>

<script>
    setTitle("Reports");
    selectLink('reports_link');
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        color: #333;
    }

    .main-content {
        margin: 90px 30px 30px 30px;
        padding: 40px 20px 20px 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .filter_form {
        margin-bottom: 30px;
        background: #fafafa;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }

    .filter_form form {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
    }

    input[type="date"],
    select,
    input[type="submit"] {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        outline: none;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    .filter_form a {
        color: #d35400;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
    }

    .filter_form a:hover {
        text-decoration: underline;
    }

    .table-responsive {
        overflow-x: auto;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }

    th, td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f9f9f9;
    }

    tfoot button {
        margin-top: 20px;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 30%;
        margin-right: 10px;
    }

    .btn-info {
        background-color: #5bc0de;
        color: white;
    }

    .btn-info:hover {
        background-color: #31b0d5;
    }

    .btn-success {
        background-color: #5cb85c;
        color: white;
    }

    .btn-success:hover {
        background-color: #4cae4c;
    }

    .btn-download {
        background-color: #f39c12;
        color: white;
    }

    .btn-download:hover {
        background-color: #e67e22;
    }

    @media print {
        .filter_form,
        button,
        input[type="submit"],
        a {
            display: none !important;
        }

        .main-content {
            box-shadow: none;
            margin: 0;
            padding: 0;
        }
    }

    @media (max-width: 768px) {
        .filter_form form {
            flex-direction: column;
            align-items: stretch;
        }

        input[type="submit"], button {
            width: 100%;
        }

        .main-content {
            margin: 80px 15px 15px 15px;
            padding: 20px;
        }
    }
</style>

<div class="main-content" id="reportSection">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter_form">
                        <form type="get">
                            From <input type="date" name="from" value="<?php echo $from ?>" max="<?php echo date('Y-m-d') ?>" onchange="set_to_date()" id="from_date">
                            To <input type="date" name="to" value="<?php echo $to ?>" max="<?php echo date('Y-m-d') ?>" id="to_date">
                            <?php echo getCategory($cat_id, 'reports'); ?>
                            <input type="submit" name="submit" value="Submit">
                            <a href="reports.php">Reset</a>
                        </form>
                    </div>

                    <?php if (mysqli_num_rows($res) > 0) { ?>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $final_price = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $final_price += $row['price'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Total</th>
                                        <th><?php echo $final_price ?></th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <button onclick="printReport()" class="btn btn-info">Print</button>
                                            <button onclick="printToExcel()" class="btn btn-success">Print Excel</button>
                                            <button onclick="downloadCSV()" class="btn btn-download">Download CSV</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php } else {
                        echo "<b>No data found</b>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printReport() {
        window.print();
    }

    function printToExcel() {
        window.location.href = 'generate_excel.php';
    }

    function downloadCSV() {
        const table = document.querySelector("table");
        let csv = [];
        for (let row of table.rows) {
            let cols = Array.from(row.cells).map(cell => `"${cell.innerText}"`);
            csv.push(cols.join(","));
        }

        let csvString = csv.join("\n");
        let blob = new Blob([csvString], { type: "text/csv" });
        let url = window.URL.createObjectURL(blob);
        let a = document.createElement("a");
        a.href = url;
        a.download = "expense_report.csv";
        a.click();
        window.URL.revokeObjectURL(url);
    }
</script>

<?php include('footer.php'); ?>
