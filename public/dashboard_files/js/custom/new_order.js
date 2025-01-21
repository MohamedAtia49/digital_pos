$('document').ready(function () {
    // Add product button
    $('.add-product-btn').on('click', function (e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $(this).data('price');

        $(this).addClass('btn-default disabled').removeClass('btn-success');
        // <input type="hidden" name="products[]" value="${id}">

        var html =
            `<tr>
                <td> ${name} </td>
                <td> <input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control-sm product-quantity" min="1" value="1"> </td>
                <td class="product-price"> ${$.number(price, 2)} </td>
                <td> <button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button> </td>
            </tr>`;

        $('.order-list').append(html);

        // Calculate total price
        calculateTotal();

    });

    // Disabled button behavior
    $('body').on('click', '.disabled', function (e) {
        e.preventDefault();
    });

    // Remove product button
    $('body').on('click', '.remove-product-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        // Calculate total price
        calculateTotal();
    });

    // Change product quantity
    $('body').on('keyup change', '.product-quantity', function () {
        var quantity = Number($(this).val());
        var unitPrice = parseFloat($(this).data('price'));
        var totalPrice = quantity * unitPrice;

        $(this).closest('tr').find('.product-price').html($.number(totalPrice, 2));

        calculateTotal();
    });
});

// Helper function to convert numbers to Arabic numerals
function toArabicNumerals(num) {
    const arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    return num.toString().replace(/\d/g, (digit) => arabicNumbers[digit]);
}

// Helper function to convert Arabic numerals to English numerals
function toEnglishNumerals(num) {
    const englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    return num.replace(/[٠-٩]/g, (digit) => englishNumbers['٠١٢٣٤٥٦٧٨٩'.indexOf(digit)]);
}


// Calculate total price
function calculateTotal() {
    var price = 0;

    $('.order-list .product-price').each(function (index) {
        // Convert Arabic numerals to English numerals before parsing
        var englishPrice = toEnglishNumerals($(this).text());
        price += parseFloat(englishPrice.replace(/[^0-9.]/g, ''));
    });//end of product price

    var subTotalPrice = price;
    var TotalPrice = ( price * 1.14 );

    console.log(subTotalPrice + ' ');
    $('.sub-total-price').html($.number(subTotalPrice, 2) + ' جنيه مصرى');
    $('.total-price').html($.number(TotalPrice, 2) + ' جنيه مصرى');

    //check if price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    }//end of else
}
