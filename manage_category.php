<?php
include('header.php');
checkUser();
adminArea();
$msg = "";
$category = "";
$label = "Add";

// Editing logic
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $label = "Edit";
    $id = get_safe_value($_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM category WHERE id = $id");
    if (mysqli_num_rows($res) == 0) {
        redirect('category.php');
        die();
    }
    $row = mysqli_fetch_assoc($res);
    $category = $row['name'];
}

// Submission logic
if (isset($_POST['submit'])) {
    $name = get_safe_value($_POST['name']);
    $type = "add";
    $sub_sql = "";

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $type = "edit";
        $sub_sql = "AND id != $id";
    }

    $res = mysqli_query($con, "SELECT * FROM category WHERE name = '$name' $sub_sql");
    if (mysqli_num_rows($res) > 0) {
        $msg = "❗ Category already exists.";
    } else {
        $sql = "INSERT INTO category(name) VALUES('$name')";
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "UPDATE category SET name = '$name' WHERE id = $id";
        }
        mysqli_query($con, $sql);
        redirect('category.php');
    }
}
?>

<!-- Page Setup -->
<script>
    setTitle("Manage Category");
    selectLink('category_link');
</script>

<!-- Custom Styles -->
<style>
    .manage-wrapper {
        max-width: 600px;
        margin: 30px auto;
        background: #f9f9f9;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .manage-wrapper h2 {
        margin-bottom: 20px;
        font-size: 28px;
        text-align: center;
        color: #333;
    }

    .manage-wrapper a.back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .manage-wrapper label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #555;
    }

    .manage-wrapper input[type="text"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    .manage-wrapper input[type="submit"] {
        background: #007bff;
        color: #fff;
        padding: 14px;
        width: 100%;
        border: none;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .manage-wrapper input[type="submit"]:hover {
        background: #0056b3;
    }

    .message {
        margin-top: 15px;
        text-align: center;
        font-weight: bold;
        color: red;
    }
</style>

<!-- Main Content -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="manage-wrapper">
                <h2><?php echo $label; ?> Category</h2>
                <a href="category.php" class="back-link">← Back to Categories</a>

                <form method="post">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" required value="<?php echo $category; ?>">

                    <input type="submit" name="submit" value="Submit">

                    <?php if ($msg != '') { ?>
                        <div class="message"><?php echo $msg; ?></div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
