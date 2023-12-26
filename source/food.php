<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý món ăn</title>
    <?php include 'bootstrap.php'; // Include Bootstrap CSS nếu bạn sử dụng ?>
</head>
<body>
    <?php include 'session.php' ?>
    <?php include 'header.php'; // Header của trang web ?>
    <?php include 'checknav.php' ?>
    <?php $directnav($permission,$displayname); ?>
    <div class="container mt-5">
        <h2>Danh sách món ăn</h2>
        <div id="dataGridContainer">
            <!-- Đây là nơi sẽ hiển thị datagridview -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load datagridview khi trang được tải
            loadDatagridview();

            // Hàm để tải datagridview từ server
            function loadDatagridview() {
                $.ajax({
                    url: 'get-food.php', // Đường dẫn đến tệp PHP để lấy dữ liệu từ cơ sở dữ liệu
                    type: 'GET',
                    success: function(data) {
                        $('#dataGridContainer').html(data);
                    },
                    error: function(error) {
                        console.error("Error: " + error);
                    }
                });
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Bắt sự kiện khi nút "Sửa" được nhấn
        $('.edit-item').click(function() {
            var itemId = $(this).data('id');

            // Gọi API hoặc AJAX để lấy thông tin chi tiết món ăn dựa trên itemId

            // Hiển thị thông tin món ăn trong modal
            $('#editIdMonAn').val(itemId);
            // Gán giá trị cho các trường thông tin món ăn tương ứng

            // Mở modal
            $('#editModal').modal('show');
        });

        // Xử lý khi form "Sửa" được submit
        $('#editForm').submit(function(e) {
            e.preventDefault();

            // Gọi API hoặc AJAX để cập nhật thông tin món ăn dựa trên dữ liệu trong form

            // Đóng modal sau khi cập nhật thành công
            $('#editModal').modal('hide');
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa Thông Tin Món Ăn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form để nhập thông tin cần sửa -->
                <form id="editForm">
                    <!-- Các trường thông tin món ăn -->
                    <div class="form-group">
                        <label for="editTenMonAn">Tên Món Ăn</label>
                        <input type="text" class="form-control" id="editTenMonAn" name="editTenMonAn" required>
                    </div>
                    <!-- Các trường thông tin khác -->

                    <input type="hidden" id="editIdMonAn" name="editIdMonAn">

                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>



    <?php include 'footer.php'; // Footer của trang web ?>
</body>
</html>
