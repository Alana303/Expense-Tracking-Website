<?php
   include('header.php');
   checkUser();
   userArea();

   if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){
       $id=get_safe_value($_GET['id']);
       mysqli_query($con,"delete from expense where id=$id");
       echo "<br/>Data deleted<br/>";
   }

   $res=mysqli_query($con,"select expense.*,category.name from expense,category where expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."' order by expense.expense_date asc");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        .menu {
            width: 200px;
            float: left;
            min-height: 100vh;
            background-color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .menu h1 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        .menu a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .menu a:hover,
        .menu a.active {
            background-color: #ddd;
            color: #000;
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        h2 {
            margin-bottom: 20px;
        }

        a.btn-link {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 20px;
        }

        a.btn-link:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        button {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #27ae60;
        }

        @media print {
            .menu, .btn-link, button {
                display: none;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    <script>
        function delete_confir(id, file){
            if(confirm("Are you sure you want to delete this entry?")){
                window.location.href = file + "?type=delete&id=" + id;
            }
        }
        setTitle("Expense");
        selectLink('expense_link');
    </script>
</head>
<body>

<div class="menu">
   <h1>Sastrify</h1>
   <a href="dashboard_report.php">Dashboard</a>
   <a href="expense.php" class="active">Expenses</a>
   <a href="manage_expense.php">Add Expense</a>
   <a href="report.php">Reports</a>
   <a href="logout.php">Logout</a>
</div>

<div class="main-content">
    <h2>Expense</h2>
    <a href="manage_expense.php" class="btn-link">Add Expense</a>
    <button onclick="window.print()">Print Information</button>

    <?php if(mysqli_num_rows($res)>0){ ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Budget</th>
                    <th>Price</th>
                    <th>Remaining</th>
                    <th>Expense Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row=mysqli_fetch_assoc($res)){
                $remaining = $row['budget'] - $row['price'];
            ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['item'];?></td>
                    <td><?php echo $row['budget'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $remaining; ?></td>
                    <td><?php echo $row['expense_date'];?></td>
                    <td>
                        <a href="manage_expense.php?id=<?php echo $row['id'];?>">Edit</a> |
                        <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id'];?>','expense.php')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No expenses found. Add one using the button above.</p>
    <?php } ?>
</div>

</body>
</html>

<?php include('footer.php'); ?>
