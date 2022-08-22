
function deleteShop(id) 
{
    if (confirm("Bạn Chắc Chắn Muốn Xóa Shop Chưa")) {
        $.ajax({
            type: 'POST',
            dataType:"json",
            url: '/shop/delete/' + id,
            headers:{         
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function (data) {
                alert('Đã xóa thành công')
                location.reload();
            },
            error: function (data) {
                alert('Xóa lỗi')
            }
        });
    }
}

function thanhToanOrder(id)
{
    console.log(id)
    if (confirm("Bạn Chắc Chắn Muốn Thanh Toán ?")) {
        $.ajax({
            type: 'POST',
            dataType:"json",
            url: '/order/paid/' + id,
            headers:{         
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function (data) {
                alert('Đã Thanh Toán thành công')
                location.reload();
            },
            error: function (data) {
                alert('Thanh Toán lỗi')
            }
        });
    }
}

function openProduct(id)
{
    window.open("/product/list/" + id,'_blank');
}

function openOrder(id)
{
    window.open("/order/list/" + id,'_blank');
}

$(document).ready(function($target){
    $(".create-product").click(function(){
        $(".popup-add-order").addClass("popup-add-open");
        $(".popup-background").addClass("popup-add-open");
    });

    $(".create-product-in-order").click(function(){
        $(".popup-add-product").addClass("popup-add-open");
        $(".popup-background").addClass("popup-add-open");
    });

    $("#create-button-popup-add").click(function(){
        $("#pop-up-create-new-user").addClass("popup-add-open");
    });

    $(".custom-btn").click(function(){
        $(".popup-add-order").removeClass("popup-add-open");
        $(".popup-add-product").removeClass("popup-add-open");
        $(".popup-background").removeClass("popup-add-open");
    });
});


