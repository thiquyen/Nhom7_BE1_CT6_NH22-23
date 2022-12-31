
<form method="post" action="search.php">

    <label for="product">Sản phẩm:</label>
    <select name="product" id="product">
        <option value="">Tất cả</option>
        <?php
          
        // Kết nối đến cơ sở dữ liệu và lấy danh sách sản phẩm
        $conn = mysqli_connect("localhost", "root", "", "user_db");
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        // Duyệt từng sản phẩm và tạo các lựa chọn trong select
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }

        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
        ?>
    </select>
    <br>
    <label for="protype">Loại sản phẩm:</label>
    <select name="protype" id="protype">
        <option value="">Tất cả</option>
        <?php
        // Kết nối đến cơ sở dữ liệu và lấy danh sách loại sản phẩm
        $conn = mysqli_connect("localhost", "root", "", "user_db");
        $sql = "SELECT * FROM protypes";
        $result = mysqli_query($conn, $sql);

        // Duyệt từng loại sản phẩm và tạo các lựa chọn trong select
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'. $row['type_id'] . '">' . $row['type_name'] .  '</option>' ;
        }


