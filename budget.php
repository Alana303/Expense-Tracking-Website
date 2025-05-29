<?php
   include('header.php');
   checkUser();
   userArea();
   
   $cat_id='';
   $sub_sql='';
   $from='';
   $to='';
   if(isset($_GET['category_id']) && $_GET['category_id']>0){
   	$cat_id=get_safe_value($_GET['category_id']);
   	$sub_sql=" and category.id=$cat_id ";
   }
   
   if(isset($_GET['from'])){
   	$from=get_safe_value($_GET['from']);
   }
   if(isset($_GET['to'])){
   	$to=get_safe_value($_GET['to']);
   }
   
   if($from!=='' && $to!=''){
   	$sub_sql.=" and expense.expense_date between '$from' and '$to' ";
   }
   	
   
   $res=mysqli_query($con,"select sum(expense.price) as price,category.name from expense,category where expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."' $sub_sql  group by expense.category_id");
   ?>
<script>
   setTitle("Budget");
   selectLink('budget_link');
</script>

<div class="main-content">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <h2> Budget</h2>
               <div class="card">
                  <div class="card-body card-block">
                     <form method="post" class="form-horizontal">
                        
                        <div class="form-group">												<label class="control-label mb-1">Enter budget</label>
                           <input type="text" name="item" class="form-control" rquired>
                        </div>
                        
                        <div class="form-group">												
                           <input type="submit" name="submit" value="Submit"  class="btn btn-lg btn-info btn-block">                          
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php
if (isset($_POST["submit"])) {

   $budget = $_POST["item"];
   $sql = "INSERT INTO expense (budget) VALUES ( ? )";
   $stmt = mysqli_stmt_init($con);
   $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
   if ($prepareStmt) {
       mysqli_stmt_bind_param($stmt,"s",$budget);
       mysqli_stmt_execute($stmt);


}
}
?>



<?php
   include('footer.php');
   ?>