$(document).ready(function () {

  $(document).on('click', '.increment', function () {
    // jqon

    var $quantityInput = $(this).closest('.qtyBox').find('.qty');
    var ProdcutId = $(this).closest('.qtyBox').find('.proId').val();
    var currenValue = parseInt($quantityInput.val());

    if (!isNaN(currenValue)) {
      var qtyVal = currenValue + 1;
      $quantityInput.val(qtyVal);
      $quantityIncDec(ProdcutId,qtyVal);
    }
  });

  $(document).on('click', '.decrement', function () {

    var $quantityInput = $(this).closest('.qtyBox').find('.qty');
    var ProdcutId = $(this).closest('.qtyBox').find('.proId').val();
    var currenValue = parseInt($quantityInput.val());

    if (!isNaN(currenValue) && currenValue > 1) {
      var qtyVal = currenValue - 1;
      $quantityInput.val(qtyVal);
      $quantityIncDec(ProdcutId,qtyVal);
    }
  });

//   To Update Store Session Variable
    function $quantityIncDec(proId, qty){

        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data:{
                'productIncDec' : true,
                'product_id' : proId,
                'quantity' : qty,

            },
            success: function (response) {
                var res = JSON.parse(response);

                if(response.status == 200){
                    window.location.reload();
                    alertify.success(res.message);
                }else{
                    alertify.error(res.message);
                }
            }
        });
    }
});
