jQuery(document).ready(function ($) {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 150) {
      jQuery(".header-bottom").addClass('fixNav')
    } else {
      jQuery(".header-bottom").removeClass('fixNav')
    }
  })
})

jQuery(document).ready(function () {
  jQuery(".sub_breadcrumb").text(function () {
    return jQuery(this).text().replace("-", " ");
  });
});

function setItemCart(data) {

  jQuery('.cart-item').remove();
  var count = Object.keys(data).length;
  jQuery('.amount').text(count);

  var total = 0;

  jQuery.each(data, function (index, val) {
    var price = val['promotion_price'] == 0 ? val['unit_price'] : val['promotion_price'];

    total += val['qty'] * price;

    var html = '<div class="cart-item">' +
      '<a class="cart-item-delete" href="#" onclick="deleteCart(' + val['id'] + ')"><i class="fa fa-times"></i></a>' +
      '<div class="media">' +
      '<a class="pull-left" href="#"><img src="/assets/client/image/product/' + val['image'] + '" alt=""></a>' +
      '<div class="media-body">' +
      '<span class="cart-item-title">' + val['name'] + '</span>' +
      '<span class="cart-item-amount">' +
      '<input class="form-control" type="number" data-id="'+ val['id'] +'" data-name="'+ val['name'] +'" data-img="'+ val['image'] +'" data-unit-price="'+ val['unit_price']+ '" data-promotion-price="'+ val['promotion_price']+ '" data-price="'+ price +'" id="quantity-ip" name="quantity" min="1" max="20" value="'+ val['qty'] +'">' +
      '</span>' +
      '<span class="cart-item-price"> ' + price + ' <small>VND</small></span>' +
      '</div>' +
      '</div>' +
      '</div>';

    jQuery('.cart-body').prepend(html);
  });

  total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  jQuery('.cart-total-value').text(total);
}

function setCart(id, name, image, unit_price, promotion_price, total) {
  // e.preventDefault();
  jQuery.ajax({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    },
    url: "/add-to-cart",
    type: 'POST',
    dataType: 'json', // added data type
    data: {
      id: id,
      name: name,
      image: image,
      unit_price: unit_price,
      promotion_price: promotion_price,
      total: total
    },
    success: function (res) {
      console.log(res.data)
      setItemCart(res.data)
    }
  });
}

function deleteCart(id) {
  jQuery.ajax({
    url: '/delete-to-cart',
    type: 'GET',
    data: {
      id: id,
    },
    success: function (res) {
      setItemCart(res.data)
    }
  });
}


jQuery(document).on('input', 'input[name="quantity"]', function () {
  
  var qtyVal = jQuery(this).val();
  var id = jQuery(this).data('id');
  var name = jQuery(this).data('name');
  var image = jQuery(this).data('img');
  var unit_price = jQuery(this).data('unit-price');
  var promotion_price = jQuery(this).data('promotion-price');
  var price = jQuery(this).data('price');
  var total = qtyVal * price;

  jQuery.ajax({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    },
    url: "/update-to-cart",
    type: 'POST',
    dataType: 'json', // added data type
    data: {
      id: id,
      name: name,
      image: image,
      unit_price: unit_price,
      promotion_price: promotion_price,
      total: total,
      qty: qtyVal,
    },
    success: function (res) {
      setItemCart(res.data)
    }
  });
});


