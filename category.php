<?php
include('header.php');
checkUser();
adminArea();

if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
    $id = get_safe_value($_GET['id']);
    mysqli_query($con, "delete from category where id=$id");
    echo "<br/>Data deleted<br/>";
}

$res = mysqli_query($con, "select * from category order by id desc");
?>

<style>
    /* Reset & Base */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f7fa;
        color: #333;
        padding: 20px;
    }

    h2 {
        margin-bottom: 20px;
        color: #2c3e50;
    }

    a {
        text-decoration: none;
        color: #3498db;
        font-weight: 500;
    }

    a:hover {
        color: #1d6fa5;
        text-decoration: underline;
    }

    .main-content {
        margin-top: 20px;
    }

    .section__content--p30 {
        padding: 30px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .table-responsive {
        overflow-x: auto;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #f1f1f1;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    th {
        font-size: 15px;
        font-weight: 600;
        color: #555;
    }

    td {
        font-size: 14px;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #fafafa;
    }

    .btn {
        display: inline-block;
        padding: 6px 14px;
        background-color: #3498db;
        color: white;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    @media (max-width: 768px) {
        .section__content--p30 {
            padding: 15px;
        }

        table {
            font-size: 13px;
        }

        th, td {
            padding: 10px;
        }
    }
</style>

<script>
    setTitle("Category");
    selectLink('category_link');
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Category</h2>
                    <a class="btn" href="manage_category.php">Add Category</a>
                    <div class="table-responsive table--no-card m-b-30">
                        <?php if (mysqli_num_rows($res) > 0) { ?>
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>
                                        <a href="manage_category.php?id=<?php echo $row['id']; ?>">Edit</a> &nbsp;
                                        <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id']; ?>','category.php')">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else {
                            echo "<p>No data found</p>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
