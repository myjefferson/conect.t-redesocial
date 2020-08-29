// Adding Classes
$(
  '#shipping_address_country select, #shipping_address_region select, #billing_address_country select, #billing_address_region select'
).addClass('col-sm-12 form-control');
$(
  '#estimate_shipping_button, #set_shipping_button, #set_coupon_code_button'
).addClass('btn btn-outline-secondary btn-block');
$('.actions .button').addClass('btn btn-primary');
$('.checkbox-field').addClass('checkbox');
$(
  '#contacts .textarea, #shipping_address .textarea, #other .textarea, #billing_address .textarea, #contacts .select, #shipping_address .select, #other .select, #billing_address .select, #customer_password, #customer_password_confirmation, .text-field input, #contact_email, #contact_name, #contact_message, #contact_phone, #coupon_code, #customer_email, #customer_phone, #customer_shipping_address_name, #customer_shipping_address_surname, #customer_shipping_address_address, #customer_shipping_address_taxid, #customer_shipping_address_postal, #customer_shipping_address_city, #customer_billing_address_name, #customer_billing_address_surname, #customer_billing_address_address, #customer_billing_address_taxid, #customer_billing_address_postal, #customer_billing_address_city,#estimate_shipping_form select,#estimate_shipping_form input'
).addClass('form-control');
$(
  '#shipping_address div.col-sm-12 input,#shipping_address div.col-sm-12 select,#billing_address div.col-sm-12 input,#billing_address div.col-sm-12 select,#billing_address div.col-sm-12 textarea,#customer_additional_fields input,#customer_additional_fields select,#customer_additional_fields textarea'
).addClass('form-control');
$('.field label').addClass('control-label');
$('.error').addClass('badge badge-danger mt-2');
$('.success').addClass('badge badge-success mt-2');

// Pagination
$('.pager').addClass('pagination justify-content-center');
$('.pagination li').addClass('page-item');
$('.pagination li a').addClass('page-link');
$('.pagination').removeClass('pager');
$('.pagination').wrapAll('<nav>');

// Contact Page
$('#contactpage .actions .button').addClass('btn-block');
$('#contactpage_email').wrapAll('<div class="form-group">');
$('#contactpage_name').wrapAll('<div class="form-group">');
$('#contactpage_phone').wrapAll('<div class="form-group">');
$('#contactpage_message').wrapAll('<div class="form-group">');

// Cart
$('#coupon_code').wrapAll('<div class="form-group">');
$(
  '#estimate_shipping_form > label:nth-child(1), #estimate_shipping_country'
).wrapAll('<div class="form-group">');
$(
  '#estimate_shipping_form > label:nth-child(2), #estimate_shipping_region'
).wrapAll('<div class="form-group">');
$(
  '#estimate_shipping_form > label:nth-child(3), #estimate_shipping_municipality'
).wrapAll('<div class="form-group">');
$(
  '#estimate_shipping_form > label:nth-child(4), #estimate_shipping_postal'
).wrapAll('<div class="form-group">');
$('#estimate_shipping #shipping_address_municipality').addClass('form-group');

// Checkout
$(
  '#checkout #contacts, #checkout #shipping_address, #checkout #billing_address, #checkout #other, #checkout .required'
).wrapAll('<div class="col-lg-8">');
$(
  '#checkout #contacts h2.legend, #checkout #shipping_address h2.legend, #checkout #billing_address h2.legend, #checkout #other h2.legend'
).addClass('col-md-12 col-sm-12 col-xs-12');
$('#payments, #shipping, #checkout .actions').wrapAll('<div class="col-lg-4">');
$('#checkout .col-lg-8, #checkout .col-lg-4').wrapAll('<div class="row">');
$('#contacts, #shipping_address,#billing_address, #other').addClass('row');
$(
  '#contacts .field, #shipping_address .field, #billing_address .field, #other .field'
).addClass('col-md-6 col-sm-12 col-xs-12');
$('#other_additional_information, #contacts_accepts_marketing').removeClass(
  'col-md-6 col-sm-6 '
);
$('#other_additional_information').addClass('col-md-12 col-sm-12');
$('#payments, #shipping').addClass('card mb-3');
$('#payments h2.legend').wrapAll('<div class="card-header">');
$('#shipping h2.legend').wrapAll('<div class="card-header">');
$('#payments h2.legend, #shipping h2.legend').addClass('card-title');
$('#payments_options, #shipping_options').addClass('card-body');
$('#submit_review_order').addClass('btn-block');
$('#checkout .checkbox-field').addClass('no-label');
$('#contacts_accepts_marketing').removeClass('col-md-12 col-sm-12');
$('#contacts_accepts_marketing input').removeClass('form-control');

// Success
$('#credentials_password').wrapAll('<div class="form-group">');
$('#credentials_password_confirmation').wrapAll('<div class="form-group">');

// Customer
$('#customer_details #contacts_email').wrapAll('<div class="form-group">');
$('#customer_details #contacts_phone').wrapAll('<div class="form-group">');
$('#customer_details #details_password').wrapAll('<div class="form-group">');
$('#customer_details #details_confirm_password').wrapAll(
  '<div class="form-group">'
);
$('.pending-payment').addClass('badge badge-warning mt-2');
$('.paid').addClass('badge badge-success  mt-2');
$('.abandoned').addClass('badge badge-default mt-2');
$('.canceled').addClass('badge badge-danger mt-2');
$('.shipped').addClass('badge badge-primary mt-2');
$(
  '#address #shipping_address_name, #address #shipping_address_surname, #address #shipping_address_address, #address #shipping_address_taxid, #address #shipping_address_city, #address #shipping_address_postal, #address #shipping_address_country, #address #shipping_address_region, #address #billing_address_name, #address #billing_address_surname, #address #billing_address_address,#address #billing_address_taxid, #address #billing_address_city, #address #billing_address_postal, #address #billing_address_country, #address #billing_address_region,#customer_details_password > div'
).addClass('form-group ');

$(
  '#shipping_address div.col-sm-12,#billing_address div.col-sm-12,#customer_additional_fields > div'
).addClass('field col-md-6 col-xs-12 form-group');
$('#customer_additional_fields > div').removeClass('col-md-6');

$('ul.nav > li.dropdown > ul > li').click(function(event) {
  // stop bootstrap.js to hide the parents
  event.stopPropagation();
  // hide the open children
  $(this)
    .find('ul.nav > li.dropdown > ul > li')
    .removeClass('open');
  // add 'open' class to all parents with class 'dropdown-submenu'
  $(this)
    .parents('ul.nav > li.dropdown > ul > li')
    .addClass('open');
  // this is also open (or was)
  $(this).toggleClass('open');
});

// -------------------- MULTI-CURRENCY --------------------

// apply currency changes on HTML
function changeCurrency(fromProductPage) {
  // set currencies
  old_currency = sessionStorage.getItem('store_currency');
  new_currency = $.trim(sessionStorage.getItem('global_currency'));

  // current currency on nav-bar
  $('#current_currency').text(new_currency);

  // cart total on nav-bar
  if (!fromProductPage) {
    cart_products = $('#nav-bar-cart')
      .text()
      .split('|')[0];
    nav_bar_cart_amount = $('#nav-bar-cart')
      .text()
      .split('|')[1];
    nav_bar_cart_amount = accounting.formatMoney(
      fx.convert(accounting.unformat(nav_bar_cart_amount, i18n_decimal_mark), {
        from: old_currency,
        to: new_currency,
      }),
      { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
    );
    $('#nav-bar-cart').text(cart_products + '| ' + nav_bar_cart_amount);
  }

  // homepage product blocks
  $('.caption')
    .children('.pull-right')
    .each(function() {
      if ($(this).children().length == 0) {
        amount = accounting.unformat($(this).text(), i18n_decimal_mark);
        $(this).text(
          accounting.formatMoney(
            fx.convert(amount, { from: old_currency, to: new_currency }),
            { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
          )
        );
      } else {
        orig_amount = Math.abs(
          accounting.unformat(
            $(this)
              .children()
              .text(),
            i18n_decimal_mark
          )
        );
        $(this)
          .children()
          .text(
            accounting.formatMoney(
              fx.convert(orig_amount, { from: old_currency, to: new_currency }),
              { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
            )
          );

        discounted_amount = Math.abs(
          accounting.unformat(
            $(this)
              .contents()
              .get(0).nodeValue,
            i18n_decimal_mark
          )
        );
        $(this)
          .contents()
          .get(0).nodeValue =
          accounting.formatMoney(
            fx.convert(discounted_amount, {
              from: old_currency,
              to: new_currency,
            }),
            { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
          ) + ' ';
      }
    });

  // product page price
  if (
    $('#product-form-price').siblings().length == 0 &&
    $('#product-form-discount').length == 0
  ) {
    product_amount = accounting.unformat(
      $('#product-form-price').text(),
      i18n_decimal_mark
    );
    $('#product-form-price').text(
      accounting.formatMoney(
        fx.convert(product_amount, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      )
    );
  } else {
    product_amount = Math.abs(
      accounting.unformat($('#product-form-price').text(), i18n_decimal_mark)
    );
    $('#product-form-price').text(
      accounting.formatMoney(
        fx.convert(product_amount, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      )
    );

    discount_amount = Math.abs(
      accounting.unformat($('#product-form-discount').text(), i18n_decimal_mark)
    );
    $('#product-form-discount').text(
      accounting.formatMoney(
        fx.convert(discount_amount, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      )
    );
  }

  // cart/revieworder unit price & customer details price
  $('.order-product-price').each(function() {
    amount = accounting.unformat($(this).text(), i18n_decimal_mark);
    $(this).text(
      accounting.formatMoney(
        fx.convert(amount, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      )
    );
  });

  $('.cart-product-discount')
    .children()
    .each(function() {
      discounted_amount = Math.abs(
        accounting.unformat(
          $(this)
            .contents()
            .get(0).nodeValue,
          i18n_decimal_mark
        )
      );
      $(this)
        .contents()
        .get(0).nodeValue = accounting.formatMoney(
        fx.convert(discounted_amount, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      );

      orig_amount = Math.abs(
        accounting.unformat(
          $(this)
            .children()
            .text(),
          i18n_decimal_mark
        )
      );
      $(this)
        .children()
        .text(
          accounting.formatMoney(
            fx.convert(orig_amount, { from: old_currency, to: new_currency }),
            { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
          )
        );
    });

  // cart/revieworder unit & customer details order subtotal
  $('.order-product-subtotal').each(function() {
    amount = accounting.unformat($(this).text(), i18n_decimal_mark);
    $(this).text(
      accounting.formatMoney(
        fx.convert(amount, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      )
    );
  });

  //cart/revieworder total
  cart_total = accounting.unformat(
    $('.totals')
      .children('.text-right')
      .children('strong')
      .text(),
    i18n_decimal_mark
  );
  $('.totals')
    .children('.text-right')
    .children('strong')
    .text(
      accounting.formatMoney(
        fx.convert(cart_total, { from: old_currency, to: new_currency }),
        { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
      )
    );

  //revieworder subtotal/shipping/taxes
  $('.totals')
    .children('.text-right:not(:last)')
    .each(function() {
      amount = accounting.unformat($(this).text(), i18n_decimal_mark);
      $(this).text(
        accounting.formatMoney(
          fx.convert(amount, { from: old_currency, to: new_currency }),
          { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
        )
      );
    });

  // estimate shipping list
  $('#estimates')
    .find('dd')
    .each(function() {
      if ($(this).text() != 'Error') {
        // for Correios Brasil
        item_amount = accounting.unformat($(this).text(), i18n_decimal_mark);
        $(this).text(
          accounting.formatMoney(
            fx.convert(item_amount, { from: old_currency, to: new_currency }),
            { symbol: { EUR: '€', GBP: '₤' }[new_currency] }
          )
        );
      }
    });
}

$(document).ready(function() {
  if (typeof open_exchange_rates_token !== 'undefined') {
    Jumpseller.multiCurrency({
      token: open_exchange_rates_token,
      callback: changeCurrency,
    });
  }
});

$(document).ready(function() {
  $('#input-qty').on('keyup', function() {
    var $qty = $('#input-qty');
    var $adc = $('.adc');
    verifyQuantity($qty, $adc);
  });
});

$(document).ready(function() {
  $(
    '#navbarsContainer-2 .nav-item.dropdown, #navbarsContainer-2 .dropdown-menu.multi-level'
  ).hover(
    function() {
      $(this).addClass('sfhover');
    },
    function() {
      $(this).removeClass('sfhover');
    }
  );
});

// -------------------- MAx Variant Quantity --------------
function verifyQuantity($qty, $adc) {
  if (parseInt($qty.val()) > parseInt($qty.attr('max'))) {
    $qty.addClass('maxStockQty');
    $adc.addClass('maxStockAdc');
  } else {
    $qty.removeClass('maxStockQty');
    $adc.removeClass('maxStockAdc');
  }
}

// Description video and tables
$('.description table, .page table').addClass('table table-bordered');
$('.description figure iframe, .page figure iframe')
  .parent('figure')
  .addClass('videoWrapper');
