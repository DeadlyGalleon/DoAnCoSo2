$(document).ready(function() {
    $('.remove-item').click(function(event) {
        event.preventDefault();
        var spid = $(this).data('spid'); // Lấy ID sản phẩm từ thuộc tính dữ liệu

        var confirmDelete = confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?');
        if (confirmDelete) {
            $.ajax({
                type: 'GET',
                url: '../control/xoasanphamkhoigiohang.php?action=xoasanpham&sanphamid=' + spid,
                success: function(response) {
                    // Xóa dòng bảng tương ứng từ HTML
                    $(event.target).closest('tr').remove();
                },
                error: function() {
                    alert('Đã xảy ra lỗi khi xóa sản phẩm.');
                }
            });
        } else {
            // Nếu người dùng không xác nhận xóa sản phẩm, không thực hiện hành động xóa
        }
    });
});


$(document).ready(function() {
    $('.themsoluong-btn').click(function(event) {
        event.preventDefault();
        var spid = $(this).data('spid');
        var giaBan = parseFloat($(event.target).closest('tr').find('.product-price .amount').text());

        $.ajax({
            type: 'GET',
            url: '../control/capnhatsoluong.php?action=plus&sanphamid=' + spid,
            success: function(response) {
                var quantity = parseInt($(event.target).siblings('.quantity-text').text());
                quantity++;
                $(event.target).siblings('.quantity-text').text(quantity);

                // Tính toán thành tiền dựa trên giá bán và số lượng mới
                var newTotal = giaBan * quantity;

                // Cập nhật thành tiền trong session giohang
                $(event.target).closest('tr').find('.product-subtotal span').text(newTotal + ' vnd');
            },
            error: function() {
                alert('Đã xảy ra lỗi khi tăng số lượng sản phẩm.');
            }
        });
    });

    $('.giamsoluong-btn').click(function(event) {
        event.preventDefault();
        var spid = $(this).data('spid');
        var giaBan = parseFloat($(event.target).closest('tr').find('.product-price .amount').text());

        $.ajax({
            type: 'GET',
            url: '../control/capnhatsoluong.php?action=minus&sanphamid=' + spid,
            success: function(response) {
                var quantity = parseInt($(event.target).siblings('.quantity-text').text());
                if (quantity > 1) {
                    quantity--;
                    $(event.target).siblings('.quantity-text').text(quantity);

                    // Tính toán thành tiền dựa trên giá bán và số lượng mới
                    var newTotal = giaBan * quantity;

                    // Cập nhật thành tiền trong session giohang
                    $(event.target).closest('tr').find('.product-subtotal span').text(newTotal + ' vnd');
                }
            },
            error: function() {
                alert('Đã xảy ra lỗi khi giảm số lượng sản phẩm.');
            }
        });
    });
});

$(document).ready(function(){
    $('#searchInput').keyup(function(){
        var searchText = $(this).val().toLowerCase();
        // Duyệt qua từng sản phẩm và ẩn/hiển thị sản phẩm dựa trên kết quả tìm kiếm
        $('tbody tr').each(function(){
            var currentText = $(this).text().toLowerCase();
            var match = currentText.indexOf(searchText) !== -1;
            $(this).toggle(match);
        });
    });
});




