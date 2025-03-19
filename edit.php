<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลsamsung</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $id=$_GET['id'];
    $sql="SELECT * FROM samsung_products WHERE id=$id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>
<h1>แก้ไขข้อมูลsamsung</h1>


<form action="edit_1.php" method="POST">
    <input type="hidden"name="id" value="<?php echo$row['id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัส </label>
        <div class="col-sm-2">
        <label class="col-sm-1 col-form-label"><?php echo$row['id']; ?></label>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> โมเดล </label>
        <div class="col-sm-2">
        <input type="text" name="model" class="form-control" maxlength="50" value=<?php echo$row['model']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> หมวดหมู่ </label>
        <div class="col-sm-2">
        <select class="form-select" name="category" aria-label="Default select example">
                <option >กรุณาระบุหมวดหมู่</option>
                <option value="สมาร์ทวอทช์" <?php if ($row['category']=='แล็ปท็อป'){ echo "selected";} ?>>แล็ปท็อป</option>
                <option value="สมาร์ทโฟน" <?php if ($row['category']=='สมาร์ทโฟน'){ echo "selected";} ?>>สมาร์ทโฟน</option>
                <option value="สมาร์ทโฟนกันกระแทก"<?php if ($row['category']=='สมาร์ทโฟนกันกระแทก'){ echo "selected";} ?>>สมาร์ทโฟนกันกระแทก</option>
                <option value="สมาร์ทโฟนพับได้"<?php if ($row['category']=='สมาร์ทโฟนพับได้'){ echo "selected";} ?>>สมาร์ทโฟนพับได้</option>
                <option value="หูฟังไร้สาย"<?php if ($row['category']=='หูฟังไร้สาย'){ echo "selected";} ?>>หูฟังไร้สาย</option>
                <option value="แท็บเล็ต"<?php if ($row['category']=='แท็บเล็ต'){ echo "selected";} ?>>แท็บเล็ต</option>
                <option value="แล็ปท็อป"<?php if ($row['category']=='แล็ปท็อป'){ echo "selected";} ?>>แล็ปท็อป</option>

            </select>
        </div>
    </div>

    
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ราคา </label>
        <div class="col-sm-2">
        <input type="text" name="price" class="form-control" maxlength="50" value=<?php echo$row['price']; ?> required>
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> วันว่างจำหน่าย </label>
        <div class="col-sm-2">
            <input type="text" name="release_date" class="form-control" maxlength="50" value=<?php echo$row['release_date']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> คลังสินค้า </label>
        <div class="col-sm-2">
            <input type="text" name="stock" class="form-control" maxlength="50" value=<?php echo$row['stock']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รายละเอียด </label>
        <div class="col-sm-2">
            <input type="text" name="description" class="form-control" maxlength="50" value=<?php echo$row['description']; ?> required>
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>
 
</form>
<br> พัฒนาโดย 664485034 กิตตินันท์ จิระราชวโร <br>
</head>

</html>