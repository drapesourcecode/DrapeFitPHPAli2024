
$(document).ready(function () {
    getaddress();
    getPaymentDetails();
    getloginDetails();
    getWallets();

});
function getaddress() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/getAllAddress',
        success: function (response) {
            if (response) {
                $('#address-line').html(response)
            }
        },
        dataType: 'html'
    });
}
function getPaymentDetails() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_payment_details',
        success: function (response) {
            if (response) {
                $('#accordion-cat-1').html(response)
            }
        },
        dataType: 'html'
    });
}
function getDelete(id) {
    var url = $('#pageurl').val();
    var pageContain = $('#msgBody-' + id).html();
    //alert(id);
    //alert(pageContain);
    Confirm('Confirmtion delete', pageContain, 'Yes', 'No', id, url);


}
function getEdit(id) {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_edit_address/' + id,
        success: function (response) {
            if (response) {
                $('#full_name').focus();
                $('#sid').val(response.id);

                $('#full_name').val(response.full_name);
                $('#address').val(response.address);
                $('#address_line_2').val(response.address_line_2);
                $('#city').val(response.city);
                $('#state').val(response.state);
                $('#zipcode').val(response.zipcode);
                $('#country').val(response.country);
                $('#phone').val(response.phone);
                // $('#full_name').val(response.full_name);
                $('#add-address').addClass('in');
                $('#newAdress123').html("Edit your  address");
            }
        },
        dataType: 'json'
    });
}
function getUpdate(id) {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_set_default/' + id,
        success: function (response) {
            if (response) {
                getaddress();
            }
        },
        dataType: 'json'
    });
}
$("#shipaddress").validate({
    submitHandler: function () {
        var url = $('#pageurl').val();
        $('#loaderPyament').show();
        var formData = $('#shipaddress').serialize();
        $.post(url + 'users/ajax_shipping_address', formData, function (response) {
            if (response.status == "success") {
                $('#loaderPyament').hide();
                $('#li-two').addClass('active');
                $('#two').addClass('active');
                $('#msg').show();
                $('#msg').html(response.msg);
                $('#add-address').removeClass('in');
                $('#shipaddress')[0].reset();
                getaddress();

            }
            if (response.status == "error") {
                $('#loaderPyament').hide();
                $('#li-two').addClass('active');
                $('#two').addClass('active');
                $('#msg').show();
                $('#msg').html(response.msg);
            }

        }, 'json');
        return false;

    },
    rules: {
        full_name: {
            required: true,
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        zipcode: {
            required: true,
            digits: true

        },
        country: {
            required: true,
        },
        phone: {
            required: true,
            digits: true

        },
    },
    messages: {
        full_name: {
            required: "Please provide a full name",
        },
        address: {
            required: "Please provide your  address",
        },
        city: {
            required: "Please provide your  city",
        },
        state: {
            required: "Please provide your  state",
        },
        zipcode: {
            required: "Please provide your  zipcode",
        },
        country: {
            required: "Please provide your  country",
        },
        phone: {
            required: "Please provide your  phone no",
            digits: "Please provide your valid phone no"
        },
    },
});
function Confirm(title, msg, $true, $false, id, url) {
    var $content = "<div class='dialog-ovelay'>" +
            "<div class='dialog'><header>" +
            " <h3> " + title + " </h3> " +
            "<i class='fa fa-close'></i>" +
            "</header>" +
            "<div class='dialog-msg'>" +
            " <p> " + msg + " </p> " +
            "</div>" +
            " <p>  </p> " +
            "<footer>" +
            "<div class='controls'>" +
            " <button class='button button-danger doAction'>" + $true + "</button> " +
            " <button class='button button-default cancelAction'>" + $false + "</button> " +
            "</div>" +
            "</footer>" +
            "</div>" +
            "</div>";
    $('body').prepend($content);
    $('.doAction').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $.ajax({
                type: 'POST',
                url: url + 'users/get_address_delete/' + id,
                success: function (response) {
                    if (response) {
                        getaddress();
                    }
                },
                dataType: 'html'
            });



            $(this).remove();
        });
    });
    $('.cancelAction, .fa-close').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });

}
function getChecked(id) {
    $('.collapse').removeClass('in');
    $('#faq-cat-1-sub-' + id).addClass('in');
}
//#################
$('#card_payment').click(function () {
    var url = $('#pageurl').val();

    var carNo = $('#card_number').val();
    var cardName = $('#card_name').val();
    var cvv = $('#paymentForm input[name=cvv]').val();
    var ctype = $('#card_type_input').val();


    if (carNo == '') {
        //alert(carNo);
        $('#card_number').focus();
        $('#card_number').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">Please enter your card no</span>').fadeIn('slow');
        $('#card_number').val('');
        $('#card_number').focus();




    } else if (carNo.length != 16) {
        $('#card_number').focus();
        $('#card_number').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">In valid card please check</span>').fadeIn('slow');
        $('#card_number').val('');
        $('#card_number').focus();



    } else if (cardName == '') {

        $('#card_name').focus();
        $('#card_name').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">Please enter Card name</span>').fadeIn('slow');

    } else if (cvv == '') {
        $('#paymentForm input[name=cvv]').focus();
        $('#paymentForm input[name=cvv]').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">Please enter Cvv</span>').fadeIn('slow');

    } else if (ctype == '') {
        $('#cart-type-msg').html('<span style="color:red">In valid card please check</span>').fadeIn('slow');
        $('#card_number').val('');
        $('#card_number').focus();

    } else {
        $('#loaderPyament').show();
        var formData = $('#paymentForm').serialize();
        $.post(url + 'users/ajax_card_save', formData, function (response) {
            if (response) {
                getPaymentDetails();
                $('#loaderPyament').hide();
                $('#paymentForm')[0].reset();
                $('#card_number').removeAttr('style');
                $('#cart-type-msg').html('').fadeIn('slow');



            }


        }, 'html');
        return false;
    }

});
$('#paymentEditSave').click(function () {
    var url = $('#pageurl').val();
    $('#loaderPyament').show();
    var formData = $('#paymentFormsave').serialize();
    $.post(url + 'users/ajax_card_save_edit', formData, function (response) {
        if (response) {
            getPaymentDetails();
            $('#loaderPyament').hide();
            $('#pop-up-box').hide();




        }


    }, 'html');
    return false;

});
function getDeletePayment(id) {
    var url = $('#pageurl').val();
    var pageContain = $('#msgBodyPayment-' + id).html();
    //alert(id);
    //alert(pageContain);
    Confirm_Delete('Remove Payment method', pageContain, 'Yes', 'No', id, url);


}
function Confirm_Delete(title, msg, $true, $false, id, url) {
    var $content = "<div class='dialog-ovelay'>" +
            "<div class='dialog'><header>" +
            " <h3> " + title + " </h3> " +
            "<i class='fa fa-close'></i>" +
            "</header>" +
            "<div class='dialog-msg'>" +
            " <p> " + msg + " </p> " +
            "</div>" +
            " <p>  </p> " +
            "<footer>" +
            "<div class='controls'>" +
            " <button class='button button-danger doAction'>" + $true + "</button> " +
            " <button class='button button-default cancelAction'>" + $false + "</button> " +
            "</div>" +
            "</footer>" +
            "</div>" +
            "</div>";
    $('body').prepend($content);
    $('.doAction').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $.ajax({
                type: 'POST',
                url: url + 'users/get_payment_delete/' + id,
                success: function (response) {
                    if (response) {
                        getPaymentDetails();

                    }
                },
                dataType: 'html'
            });



            $(this).remove();
        });
    });
    $('.cancelAction, .fa-close').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });

}
function getPaymentEdit(id) {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_edit_payment/' + id,
        success: function (response) {
            if (response) {
                document.getElementById('pop-up-box').style.display = 'block';
                // alert(response.divp);
                $('#Pid').val(response.data.id);
                $('#divP').html(response.divp);
                $('#cardNamep').val(response.data.card_name);
                $('#expiry_monthp').val(response.month);
                $('#expiry_yearp').val(response.year);
                $('#billingAddress').html(response.bilingAddres);
            }
        },
        dataType: 'json'
    });
}
function getChangeAddress() {
    document.getElementById('pop-up-box-address').style.display = 'block';
    document.getElementById('pop-up-box').style.display = 'none'
    getChangeAddres();
}
function addChangeAddress() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/',
        success: function (response) {
            if (response.count <= 4) {
                document.getElementById('pop-up-box-address').style.display = 'none';
                document.getElementById('pop-up-box-add-address').style.display = 'block'
            } else {
                $('#msg').show();
                $('#add-address').hide();
                $('#msg').html('<div class="alert alert-danger" id="e"  style="display: block;position: fixed;z-index: 1111;right: 0;border-radius: 0px;top: 0;border: none;">You can\'t add more than 5 address</div>');

                window.setTimeout(function () {

                    $('#msg').html('');
                }, 5000);
            }

        },
        dataType: 'json'
    });



    //getChangeAddres();
}
function getChangeAddres() {
    var url = $('#pageurl').val();
    $('#loaderPyament').show();
    $.post(url + 'users/ajax_change_address', function (response) {
        if (response) {
            //getPaymentDetails();
            $('#addressDiv').html(response);
            $('#loaderPyament').hide();
        }


    }, 'html');
}
$("#changeAddAddress").validate({
    submitHandler: function () {
        var url = $('#pageurl').val();
        $('#loaderPyament').show();
        var formData = $('#changeAddAddress').serialize();
        $.post(url + 'users/ajax_shipping_address', formData, function (response) {
            if (response.status == "success") {
                $('#loaderPyament').hide();
                $('#pop-up-box-add-address').hide();
                $('#pop-up-box-address').show();
                $('#changeAddAddress')[0].reset();
                getChangeAddres();
                getaddress();

            }


        }, 'json');
        return false;

    },
    rules: {
        full_name: {
            required: true,
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        zipcode: {
            required: true,
        },
        country: {
            required: true,
        },
        phone: {
            required: true,
            digits: true,
        },
    },
    messages: {
        full_name: {
            required: "Please provide a full name",
        },
        address: {
            required: "Please provide your  address",
        },
        city: {
            required: "Please provide your  city",
        },
        state: {
            required: "Please provide your  state",
        },
        zipcode: {
            required: "Please provide your  zipcode",
        },
        country: {
            required: "Please provide your  country",
        },
        phone: {
            required: "Please provide your  phone no",
            digits: "Please provide valid  phone no",
        },
    },
});
$('#usethisaddress').click(function () {
    var url = $('#pageurl').val();
    var formData = $('#usethisform').serialize();
    var myArray = formData.split('=');
    var id = myArray[2];
    $.ajax({
        type: 'POST',
        url: url + 'users/get_set_default/' + id,
        success: function (response) {
            if (response) {
                document.getElementById('pop-up-box').style.display = 'block';
                document.getElementById('pop-up-box-address').style.display = 'none';
                $('#billingAddress').html(response.bilingAddres);

            }
        },
        dataType: 'json'
    });
});
$('#sechdule_fix_btn').click(function () {
    var url = $('#pageurl').val();
    var formData = $('#sechdule_fix').serialize();
    $.post(url + 'users/ajax_sechdule_fix', formData, function (response) {
        if (response) {
            window.location.href = url + 'account';
            //  $('#msg').html.(response.msg);
            $('#msg').html(response.msg).fadeIn('slow');
        }


    }, 'json');

});
$('#usethiscardbtn').click(function () {

    var url = $('#pageurl').val();
    var formData = $('#usethisform').serialize();
    $.post(url + 'users/ajax_use_this_card', formData, function (response) {
        if (response) {
            $('#pop-up-box-payment').hide();
            getSelectCard();
        }


    }, 'json');

});

function getCanelPayment() {
    getPaymentDetails();
    $('#loaderPyament').hide();
    $('#pop-up-box').hide();
}
function changePayment() {
    getCards();
    $('#loaderPyament').hide();
    $('#pop-up-box-payment').show();
}
function getCards() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_payment_card_details',
        success: function (response) {
            if (response) {
                $('#addressCard').html(response)
            }
        },
        dataType: 'html'
    });
}
function getBillingAddress() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_billing_address_details',
        success: function (response) {
            if (response) {
                $('#billing-address').html(response)
            }
        },
        dataType: 'html'
    });
}
function getbillingaddlist() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_billing_address_list',
        success: function (response) {
            if (response) {
                $('#changeAddress').html(response)
            }
        },
        dataType: 'html'
    });
}
function addNewCard() {
    $('#pop-up-box-payment').hide();
    $('#pop-up-box-new-card').show();
    $('#cart-type-msg').html('');
    $('#addpaymentForm')[0].reset();
    $('#card_number').removeAttr('style');
    $('#card_name').removeAttr('style');
    $('#cvv').removeAttr('style');
}
function cancelPayment() {
    $('#pop-up-box-payment').show();
    $('#pop-up-box-new-card').hide();
    getCards();
}
function cancel_ship_address() {
    $('#pop-up-box-change-ship-form').hide();
    //$('#shipaddress3')[0].reset();
    getshipaddlist();
    return false;
}
function changeBillingAddress() {
    $('#pop-up-box-change-address').show();
    getbillingaddlist();

}

$('#add_new_card_btn').click(function () {
    var url = $('#pageurl').val();
    var carNo = $('#card_number').val();
    var cardName = $('#card_name').val();
    var cvv = $('#addpaymentForm input[name=cvv]').val();
    var ctype = $('#card_type_input').val();



    if (carNo == '') {
        $('#card_number').focus();
        $('#card_number').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">Please enter your card no</span>').fadeIn('slow');
        $('#card_number').val('');
        $('#card_number').focus();
    } else if (carNo.length != 16) {
        $('#card_number').focus();
        $('#card_number').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">In valid card please check</span>').fadeIn('slow');
        $('#card_number').val('');
        $('#card_number').focus();



    } else if (cardName == '') {
        $('#card_name').focus();
        $('#card_name').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">Please enter Card name</span>').fadeIn('slow');

    } else if (cvv == '') {
        $('#addpaymentForm input[name=cvv]').focus();
        $('#addpaymentForm input[name=cvv]').attr("style", "border:#FF0000 1px solid!important");
        $('#cart-type-msg').html('<span style="color:red">Please enter Cvv</span>').fadeIn('slow');

    } else if (ctype == '') {
        $('#cart-type-msg').html('<span style="color:red">In valid card please check</span>').fadeIn('slow');
        $('#card_number').val('');
        $('#card_number').focus();

    } else {
        var formData = $('#addpaymentForm').serialize();
        $.post(url + 'users/ajax_add_nw_card', formData, function (response) {
            if (response) {
                $('#pop-up-box-new-card').hide();
                $('#pop-up-box-payment').show();
                $('#addpaymentForm')[0].reset();
                $('#card_number').removeAttr('style');
                getCards();
            }


        }, 'json');
    }

});
$('#usethisaddress').click(function () {
    var url = $('#pageurl').val();
    var formData = $('#useAdForm').serialize();
    $.post(url + 'users/ajaxChangeBillingAddress', formData, function (response) {
        if (response) {
            $('#pop-up-box-change-address').hide();
            getBillingAddress();
        }

    }, 'json');

});
function addNewAddress() {

    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/',
        success: function (response) {
            if (response.count <= 4) {
                $('#pop-up-box-change-address').hide();
                $('#pop-up-box-change-form').show();
            } else {
                $('#msg').show();
                $('#add-address').hide();
                $('#msg').html('<div class="alert alert-danger" id="e"  style="display: block;position: fixed;z-index: 1111;right: 0;border-radius: 0px;top: 0;border: none;">You can\'t add more than 5 address</div>');

                window.setTimeout(function () {

                    $('#msg').html('');
                }, 5000);
            }

        },
        dataType: 'json'
    });






}
$("#shipaddress2").validate({
    submitHandler: function () {
        var url = $('#pageurl').val();
        $('#loaderPyament').show();
        var formData = $('#shipaddress2').serialize();
        $.post(url + 'users/ajax_shipping_address', formData, function (response) {
            if (response.status == "success") {
                $('#loaderPyament').hide();
                $('#pop-up-box-change-form').hide();
                $('#pop-up-box-change-address').show();
                $('#shipaddress2')[0].reset();
                getbillingaddlist();



            }
            if (response.status == "error") {
                $('#loaderPyament').hide();
                $('#pop-up-box-change-form').hide();
                $('#pop-up-box-change-address').show();

                getbillingaddlist();

            }

        }, 'json');
        return false;

    },
    rules: {
        full_name: {
            required: true,
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        zipcode: {
            required: true,
        },
        country: {
            required: true,
        },
        phone: {
            required: true,
            digits: true,
        },
    },
    messages: {
        full_name: {
            required: "Please provide a full name",
        },
        address: {
            required: "Please provide your  address",
        },
        city: {
            required: "Please provide your  city",
        },
        state: {
            required: "Please provide your  state",
        },
        zipcode: {
            required: "Please provide your  zipcode",
        },
        country: {
            required: "Please provide your  country",
        },
        phone: {
            required: "Please provide your  phone no",
        },
        digits: {
            required: "Please provide valid  phone no",
        },
    },
});
function getshipAddress() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_shipping_address_details',
        success: function (response) {
            if (response) {
                $('#shipping-address').html(response);
                calculateTax();
            }
        },
        dataType: 'html'
    });
}
function getship() {
    $('#pop-up-box-change-ship').show();
    getshipaddlist();

}
function getshipaddlist() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_ship_address_list',
        success: function (response) {
            if (response) {
                $('#changeShipAddress').html(response)
            }
        },
        dataType: 'html'
    });
}
function addNewAddress1() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/',
        success: function (response) {
            if (response.count <= 4) {
                $('#pop-up-box-change-ship').hide();
                $('#pop-up-box-change-ship-form').show();
            } else {
                $('#msg').show();
                $('#add-address').hide();
                $('#msg').html('<div class="alert alert-danger" id="e"  style="display: block;position: fixed;z-index: 1111;right: 0;border-radius: 0px;top: 0;border: none;">You can\'t add more than 5 address</div>');

                window.setTimeout(function () {

                    $('#msg').html('');
                }, 5000);
            }

        },
        dataType: 'json'
    });







}
$("#shipaddress3").validate({
    submitHandler: function () {
        var url = $('#pageurl').val();
        $('#loaderPyament').show();
        var formData = $('#shipaddress3').serialize();
        $.post(url + 'users/ajax_shipping_address', formData, function (response) {
            if (response.status == "success") {
                $('#loaderPyament').hide();
                $('#pop-up-box-change-ship').hide();
                $('#pop-up-box-change-ship').show();
                $('#pop-up-box-change-ship-form').hide();
                $('#shipaddress3')[0].reset();
                getshipaddlist();
            }
            if (response.status == "error") {
                $('#loaderPyament').hide();
                $('#pop-up-box-change-ship').hide();
                $('#pop-up-box-change-ship').show();
                getshipaddlist();

            }

        }, 'json');
        return false;

    },
    rules: {
        full_name: {
            required: true,
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        zipcode: {
            required: true,
        },
        country: {
            required: true,
        },
        phone: {
            required: true,
            digits: true,
        },
    },
    messages: {
        full_name: {
            required: "Please provide a full name",
        },
        address: {
            required: "Please provide your  address",
        },
        city: {
            required: "Please provide your  city",
        },
        state: {
            required: "Please provide your  state",
        },
        zipcode: {
            required: "Please provide your  zipcode",
        },
        country: {
            required: "Please provide your  country",
        },
        phone: {
            required: "Please provide your  phone",
        },
        digits: {
            required: "Please provide your  valid phone ",
        },
    },
});
$('#usethisaddress1').click(function () {
    var url = $('#pageurl').val();
    var formData = $('#useshhipForm').serialize();
    $.post(url + 'users/ajax_changeshipthis_address', formData, function (response) {
        if (response) {

            $('#pop-up-box-change-ship').hide();
            getshipAddress();
        }

    }, 'json');

});
$('.sechdule_fix_btn_kid').click(function () {
    var url = $('#pageurl').val();
    var id = $(this).attr('data-id');
    var formData = $('#sechdule_fix_kid' + id).serialize();
    $.post(url + 'users/ajax_sechdule_fix_kid', formData, function (response) {
        if (response) {

            $('#msgk-' + id).html(response.msg).fadeIn('slow');
            window.location.href = url + 'account';
        }
    }, 'json');

});
$('.preferences').click(function () {
    var url = $('#pageurl').val();
    var id = $(this).attr('data-id');
    var formData = $('#email_prefreper_kid' + id).serialize();
    $.post(url + 'users/ajax_email_preforme', formData, function (response) {
        if (response) {
            window.location.href = url + 'account';
            $('#msgk-' + id).html(response.msg).fadeIn('slow');
        }
    }, 'json');

});
$('.email_pre').click(function () {
    var url = $('#pageurl').val();
    var formData = $('#email_fix_profile').serialize();
    $.post(url + 'users/ajaxEmailPreformeProfile', formData, function (response) {
        if (response) {

            $('#msg').html(response.msg).fadeOut('slow');
            window.location.href = url + 'account';
        }
    }, 'json');

});
function getloginDetails() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_login_details/',
        success: function (response) {
            if (response) {
                $('#loginDetails').html(response);
            }
        },
        dataType: 'html'
    });
}
function changeLoginDetails() {
    $('#login-details-box').show();
}
function cancel_address() {
    $('#pop-up-box-change-form').hide();
    return false;
}
$("#ss").validate({
    submitHandler: function () {
        // alert('hi');
        var url = $('#pageurl').val();
        $('#loaderPyament').show();
        var formData = $('#changeloginDetailsfrm').serialize();
        $.post(url + 'users/ajax_login_save_details', formData, function (response) {
            if (response.status == "success") {
                $('#loaderPyament').hide();
            }
            if (response.status == "error") {
                $('#loaderPyament').hide();


            }

        }, 'json');
        return false;

    },
    rules: {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
    },
    messages: {
        first_name: {
            required: "Please provide a first name",
        },
        last_name: {
            required: "Please provide a last  name",
        }

    },
});
$("#changeloginDetailsfrm").validate({
    submitHandler: function () {
        var url = $('#pageurl').val();
        $('#loaderPyament').show();
        var formData = $('#changeloginDetailsfrm').serialize();
        $.post(url + 'users/ajax_login_save_details', formData, function (response) {
            if (response.status == "success") {
                getloginDetails();
                $('#loaderPyament').hide();
                $('#password_change-success').show().html(response.msg);
                $('#login-details-box').hide();

            }
            if (response.status == "error") {
                $('#password_login_details-error').show().html(response.msg);
                $('#loaderPyament').hide();
            }
            if (response.status == "error1") {
                $('#conpassword_login_details-error').show().html(response.msg);
                $('#loaderPyament').hide();

            }

        }, 'json');
        return false;

    },
    rules: {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        password: {
            required: true,
        },
        conpassword: {
            equalTo: '#passwordlogin',
            required: true,
        },
    },
    messages: {
        first_name: {
            required: "Please provide a first name",
        },
        last_name: {
            required: "Please provide a last  name",
        },
        password: {
            required: "Please provide a password  ",
        },
        conpassword: {
            required: "Please provide a confirm password",
            equalTo: "Confirm password do not match"
        }


    },
});
$('#readmecodeBtn').click(function () {
    var url = $('#pageurl').val();
    var promocode = $('#promocode').val();
    //var alltotalPrice = $('#alltotalPrice').val();
    var formData = {promocode: promocode};
    $.post(url + 'users/ajax_readme_code', formData, function (response) {
        if (response.status == 'error') {
            $('#msgIdread').html('<span style="color:red">' + response.msg + '</span>');
        }
        if (response.status == 'success') {
            $('#promocode').val('');
            $('#msgIdread').html('<span style="color:green">' + response.msg + '</span>');
            getWallets();
        }

    }, 'json');

});
$('#readmecodegiftBtn').click(function () {
    var url = $('#pageurl').val();
    var giftcode = $('#gifcode').val();
    $.post(url + 'users/ajax_readme_gift_code', {giftcode: giftcode}, function (response) {

        if (response.status == 'error') {
            $('#msgIdreadgift').html('<span style="color:red">' + response.msg + '</span>');
        }
        if (response.status == 'success') {
            $('#gifcode').val('');
            $('#msgIdreadgift').html('<span style="color:green">' + response.msg + '</span>');
            getWallets();
        }

    }, 'json');

});
$('#readmecodeBtnx').click(function () {
    var url = $('#pageurl').val();
    var promocode = $('#promocode').val();
    var totalPrice = $('#orderTotal').val();
    var paymentID = $('#paymentID').val();
    var wallet = $('#wallet').val();

    $.post(url + 'users/ajaxReadmeCodeOrder', {promocode: promocode, totalPrice: totalPrice, paymentID: paymentID, total_user_order_price: total_user_order_price}, function (response) {
        // alert(response.status);
        if (response.status == 'success') {
            var refund = $('#Refund').val();

            $('#promo_applied').append(response.msg);

            var to = parseFloat(response.gprice) + parseFloat(refund);
            $('#Refund').val(to);
            $('#totalSpanrefund').html('$' + parseFloat(to).toFixed(2));

            getTotal(response.price);
            if (totalPrice <= response.price) {
                $('#walletCheck').attr('disabled', true);
            }
            if ($('#walletCheck').is(':checked')) {
                var currentBlace = parseFloat(wallet) + parseFloat(response.price);
                $('#currentBlnce').html('$' + currentBlace);
            } else {
                alert("total price is big");
                if (totalPrice >= response.price) {
                    alert("total price is big");
                    var getPrice = parseFloat(totalPrice) - parseFloat(response.price);
                    var currentBlace = parseFloat(wallet) + parseFloat(response.price) - parseFloat(totalPrice);
                } else {
                    var getPrice = parseFloat(response.price) - parseFloat(totalPrice);
                }
                $('#currentBlnce').html('$' + parseFloat(currentBlace).toFixed(2));
            }



        }
        if (response.status == 'successgift') {
            $('#promo_applied').append(response.msg);
            getTotal(response.price);
            var refund = $('#Refund').val();
            var to = parseFloat(response.gprice) + parseFloat(refund);
            //alert(refund);
            //alert(response.gprice);
            $('#Refund').val(to);
            $('#totalSpanrefund').html('$' + parseFloat(to).toFixed(2));
            if (totalPrice <= response.price) {
                $('#walletCheck').attr('disabled', true);
            }
            if ($('#walletCheck').is(':checked')) {
                if (totalPrice >= response.price) {
                    var currentBlace = 0;
                } else {
                    var getPrice = parseFloat(response.price) - parseFloat(totalPrice);
                    var currentBlace = parseFloat(getPrice) - parseFloat(wallet);
                }

                $('#currentBlnce').html('$' + parseFloat(currentBlace).toFixed(2));





            } else {

                if (totalPrice >= response.price) {
                    var currentBlace = parseFloat(wallet);
                } else {
                    var getPrice = parseFloat(response.price) - parseFloat(totalPrice);
                    var currentBlace = parseFloat(getPrice) + parseFloat(wallet);
                }


                $('#currentBlnce').html('$' +  parseFloat(currentBlace).toFixed(2));
            }


        }

    }, 'json');

});
function calculateTax() {
    
    var subtotal = $('#stotal').val();
    var avg_sales_tax = $('#avg_sales_tax').val();
    var sales_tax_required = $('#sales_tax_required').val();
    var promoprice = $('#promoprice').val();

// sales_tax, including_sales_tax, total_sales_tax
    var sales_tax = 0;
    $('#sales_tax').val(sales_tax.toFixed(2));
    $('#total_sales_tax').html('$' + sales_tax.toFixed(2));
    var allTotal = parseFloat(subtotal);
    if ((promoprice != "") || (promoprice != undefined)) {
        allTotal = parseFloat(allTotal) - parseFloat(promoprice);
    }

    $('#totalSpan').html('$' + allTotal.toFixed(2));
    $('#total').val(allTotal.toFixed(2));

    if (sales_tax_required == "YES") {
        sales_tax = parseFloat(allTotal) * parseFloat(avg_sales_tax);
    }

    if (sales_tax_required == "NO") {
        sales_tax = 0;
    }
//    sales_tax = sales_tax.toFixed(2);
    $('#sales_tax').val(parseFloat(sales_tax).toFixed(2));
    $('#total_sales_tax').html('+$' + parseFloat(sales_tax).toFixed(2));
    
    let tt_prc =  (parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2);

    $('#totalSpan').html('$' +tt_prc);
    $('#including_sales_tax').html('$' + tt_prc);
    $('#total').val((parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2));

}
function getTotal(price) {

    var subtotal = $('#stotal').val();
    var avg_sales_tax = $('#avg_sales_tax').val();
    var sales_tax_required = $('#sales_tax_required').val();
    $('#promoprice').val(price);
// sales_tax, including_sales_tax, total_sales_tax
    var sales_tax = 0;
    $('#sales_tax').val(sales_tax.toFixed(2));
    $('#total_sales_tax').html('$' + sales_tax.toFixed(2));

    // $('#wallet').val(parseFloat(walletPrice) + parseFloat(price));
    // $('#wallet').val(parseFloat(walletPrice));

    if ($('#walletCheck').is(':checked')) {
        var walletPrice = $('#wallet').val();
        var walletTotal = parseFloat(walletPrice) + parseFloat(price);

        var allTotal = parseFloat(subtotal) - parseFloat(walletTotal);
        //alert('e');
        //alert(walletTotal);
        //alert(allTotal);
        if (walletTotal > subtotal) {
            $('#totalSpan').html('$0.00');
            $('#including_sales_tax').html('$0.00');
            $('#total').val('0');
        } else {
            $('#totalSpan').html('$' + allTotal.toFixed(2));
            $('#total').val(allTotal.toFixed(2));
            if (sales_tax_required == "YES") {
                sales_tax = parseFloat(allTotal) * parseFloat(avg_sales_tax);
            }
            sales_tax = sales_tax;
            $('#sales_tax').val(sales_tax.toFixed(2));
            $('#total_sales_tax').html('+$' + sales_tax.toFixed(2));
            let my_tt = (parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2);
            $('#totalSpan').html('$' + my_tt);
            $('#including_sales_tax').html('$' + my_tt);
            $('#total').val((parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2));
        }

    } else {
        //alert(subtotal);
        //alert(price);
        // alert("ji");
        var allTotal = parseFloat(subtotal) - parseFloat(price);

        if (price > subtotal) {
            $('#totalSpan').html('$0.00');
            $('#including_sales_tax').html('$0.00');
            $('#total').val('0');
        } else {
            $('#totalSpan').html('$' + allTotal.toFixed(2));
            $('#total').val(allTotal.toFixed(2));

            if (sales_tax_required == "YES") {
                sales_tax = parseFloat(allTotal) * parseFloat(avg_sales_tax);
            }
            sales_tax = sales_tax;
            $('#sales_tax').val(sales_tax.toFixed(2));
            $('#total_sales_tax').html('+$' + sales_tax.toFixed(2));
            let my_tt = (parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2);
            $('#totalSpan').html('$' + my_tt);
            $('#including_sales_tax').html('$' + my_tt);
            $('#total').val((parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2));
        }


    }


}
function getWallets() {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_wallets_details/',
        success: function (response) {
            if (response) {
                $('#wallDetails').html('ACCOUNT CREDIT <span>credit balance : $' + response.msg + '</span>');
                $('#creditAccount').html('$' + response.msg);
            }
        },
        dataType: 'json'
    });
}
function getPromocode() {
    var url = $('#pageurl').val();
    var promocode = $('#promocode').val();
    //var alltotalPrice = $('#alltotalPrice').val();
    var formData = {promocode: promocode,total_user_order_price:total_user_order_price};
    $.post(url + 'users/ajax_readme_code_check', formData, function (response) {

        if (response.status == 'error') {
            $('#msgIdread').html('<span style="color:red">' + response.msg + '</span>');
        }
        if (response.status == 'success') {
            //$('#promocode').val('');
            $('#msgIdread').html('<span style="color:green">' + response.msg + '</span>');
            getWallets();
        }
        if (response.status == 'success1') {
            //$('#promocode').val('');
            $('#msgIdread').html('<span style="color:green">' + response.msg + '</span>');
        }

    }, 'json');

}
$("#invitefrm").validate({
    submitHandler: function () {
        var url = $('#pageurl').val();
        var formData = $('#invitefrm').serialize();
        $.post(url + 'users/ajax_gmail', formData, function (response) {
            if (response.status == "success") {
                window.location.href = response.url;
            }


        }, 'json');
        return false;

    },
    rules: {
        email_send: {
            required: true,
        },
    },
    messages: {
        email_send: {
            required: "Please provide a friends email",
        },
    },
});
$('#walletCheck').click(function () {
    var wallet = $('#wallet').val();
    var excess = $('#excess').val();
    var Refund = $('#Refund').val();
    var refundTotal = parseFloat(wallet) + parseFloat(Refund);
    var stotal = $('#stotal').val();
    var total = $('#total').val();
    var sales_tax_required = $('#sales_tax_required').val();
    var sales_tax = $('#sales_tax').val();
    var promo = $('#promoprice').val();
    if ($(this).is(':checked')) {
        
        var lastBil = parseFloat(stotal) - parseFloat(wallet) - parseFloat(promo);
        if(sales_tax_required == "YES"){
            lastBil = parseFloat(lastBil) + parseFloat(sales_tax);
        }
        //alert(wallet);
        //alert(promo);
        // alert(stotal);
        if (lastBil >= 1) {
            $('#totalSpan').html('$' + lastBil.toFixed(2));
            $('#totalSpanrefund').html('$' + parseFloat(refundTotal).toFixed(2));
            //alert(refundTotal);
            $('#total').val(lastBil);
            $('#Refund').val(refundTotal);

        } else {

            $('#totalSpan').html('$0.00');
            $('#total').val('0');
            $('#totalSpanrefund').html('0');
            $('#Refund').val('0');
        }
        //alert(promo);
        var vek = parseFloat(promo) + parseFloat(wallet);
        if (stotal > vek) {
            // alert("ji");

            var currentBlace = 0;

        } else {

            var vek = parseFloat(promo) + parseFloat(wallet);
            var currentBlace = parseFloat(vek) - parseFloat(stotal);

        }

        $('#currentBlnce').html('$' + currentBlace.toFixed(2));



        //walletBlace2
    } else {
        var lastBil = parseFloat(stotal) - parseFloat(promo);
        if(sales_tax_required == "YES"){
            lastBil = parseFloat(lastBil) + parseFloat(sales_tax);
        }
        var refund = $('#excess').val();
        var xxx = parseFloat(Refund) - parseFloat(wallet);
        if (lastBil > 1) {

            $('#totalSpan').html('$' + lastBil.toFixed(2));
            $('#total').val(lastBil);
            $('#totalSpanrefund').html('$' + parseFloat(xxx).toFixed(2));
            $('#Refund').val(xxx);
        } else {
            $('#totalSpan').html('$0.00');
            $('#total').val('0');
            $('#totalSpanrefund').html('$' + parseFloat(refund).toFixed(2));
            $('#Refund').val(refund);


        }


        if (parseFloat(stotal) > parseFloat(promo)) {
            var currentBlace = parseFloat(wallet);
            //alert(wallet);
            // alert(promo);
        } else {
            // alert('promo');
            var vek = parseFloat(promo) - parseFloat(stotal);
            var currentBlace = parseFloat(vek) + parseFloat(wallet);

        }


        $('#currentBlnce').html('$' + currentBlace.toFixed(2));
        //$('#walletBlace2').hide();

        //$('#totalSpan').html('$' + lastBil.toFixed(2));
        //$('#walletBlace2').hide();
    }
});
$('.Address-details2').click(function () {
    var url = $('#pageurl').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/',
        success: function (response) {
            if (response.count <= 4) {


                $('#add-address').show();
                $('#shipaddress input[name=full_name]').focus();
                $('#shipaddress')[0].reset();
                $('#newAdress123').html("Add a new address");
                $('#add-address').addClass("add-address collapse in");


            } else {

                $('#add-address').hide();

                $('#msg').html('<div class="alert alert-danger" id="e"  style="display: block;position: fixed;z-index: 1111;right: 0;border-radius: 0px;top: 0;border: none;">You can\'t add more than 5 address</div>');
                window.setTimeout(function () {

                    $('#msg').html('');
                }, 5000);
            }

        },
        dataType: 'json'
    });







});
function getCheckBox() {
    //var try_new_items_with_scheduled_fixes12 = $('#try_new_items_with_scheduled_fixes12').val();
    if ($('#try_new_items_with_scheduled_fixes12').is(":checked")) {
        $('#optionsDIV').fadeIn('slow');
        $('#unitl-p').fadeIn('slow');
        //var try_new_items_with_scheduled_fixes12 = 1;
    } else {
        $('#optionsDIV').fadeOut('slow');
        $('#unitl-p').fadeOut('slow');
        //var try_new_items_with_scheduled_fixes12 = 0;
    }
    //alert(try_new_items_with_scheduled_fixes12);
    //if ($('#try_new_items_with_scheduled_fixes12').prop('checked')) {
    //$('#optionsDIV').fadeIn('slow');
    //$('#unitl-p').fadeIn('slow');
    // } else {

    //$('#optionsDIV').fadeOut('slow');
    // $('#unitl-p').fadeOut('slow');
//        var url = $('#pageurl').val();
//        $.ajax({
//            type: 'POST',            
//            url: url + 'users/subscriptionEmail/',
//            data: ({try_new_items_with_scheduled_fixes12: try_new_items_with_scheduled_fixes12}),
//            success: function (data) {
//                if (response) {
//                    
//                } else {
//                    
//                }
//            },
//            dataType: 'json'
//        });

    // }
}
function getCheckBox2(id, count) {
    if ($('#try_new_items_with_scheduled_fixesk1' + count).prop('checked')) {
        $('#optionsDIV-' + id).fadeIn('slow');
        $('#unitl-p-' + id).fadeIn('slow');
    } else {
        $('#optionsDIV-' + id).fadeOut('slow');
        $('#unitl-p-' + id).fadeOut('slow');
    }

}
function getErrorMessgeDetils(errorCode) {
    var msg = '';
    if (errorCode == 'I00001') {
        return msg = "Successful";
    } else if (errorCode == 'I00002') {
        return msg = "The subscription has already been canceled.";
    } else if (errorCode == 'I00003') {
        return msg = "The record has already been deleted.";
    } else if (errorCode == 'I00004') {
        return msg = "No records found";
    } else if (errorCode == 'I00005') {
        return msg = "he mobile device has been submitted for approval by the account administrator.";
    } else if (errorCode == 'I00006') {
        return msg = "The mobile device is approved and ready for use";
    } else if (errorCode == 'I00007') {
        return msg = "The Payment Gateway Account service (id=8) has already been accepted.";
    } else if (errorCode == 'I00008') {
        return msg = "The Payment Gateway Account service (id=8) has already been declined.";
    } else if (errorCode == 'I00009') {
        return msg = "The APIUser already exists.";
    } else if (errorCode == 'I00010') {
        return msg = "The merchant is activated successfully";
    } else if (errorCode == 'I00011') {
        return msg = "The merchant is not activated.";
    } else if (errorCode == 'I99999') {
        return msg = "This feature has not yet been completed. One day it will be but it looks like today is not that day.";
    } else if (errorCode == 'E00001') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == 'E00002') {
        return msg = "The content-type specified is not supported.";
    } else if (errorCode == 'E00003') {
        return msg = "An error occurred while parsing the XML request.";
    } else if (errorCode == 'E00004') {
        return msg = "The name of the requested API method is invalid.";
    } else if (errorCode == 'E00005') {
        return msg = "The transaction key or API key is invalid or not present.";
    } else if (errorCode == 'E00006') {
        return msg = "The API user name is invalid or not present.";
    } else if (errorCode == 'E00007') {
        return msg = "User authentication failed due to invalid authentication values.";
    } else if (errorCode == 'E00008') {
        return msg = "User authentication failed. The account or API user is inactive.";
    } else if (errorCode == 'E00009') {
        return msg = "The payment gateway account is in Test Mode. The request cannot be processed.";
    } else if (errorCode == 'E00010') {
        return msg = "User authentication failed. You do not have the appropriate permissions";
    } else if (errorCode == 'E00011') {
        return msg = "Access denied. You do not have the appropriate permissions.";
    } else if (errorCode == 'E00012') {
        return msg = "A duplicate subscription already exists.";
    } else if (errorCode == 'E00013') {
        return msg = "The field is invalid";
    } else if (errorCode == 'E00014') {
        return msg = "A required field is not present.";
    } else if (errorCode == 'E00015') {
        return msg = "The field length is invalid.";
    } else if (errorCode == 'E00016') {
        return msg = "The field type is invalid.";
    } else if (errorCode == 'E00017') {
        return msg = "The start date cannot occur in the past.";
    } else if (errorCode == 'E00018') {
        return msg = "The credit card expires before the subscription start date.";
    } else if (errorCode == 'E00019') {
        return msg = "The customer tax id or drivers license information is required.";
    } else if (errorCode == 'E00020') {
        return msg = "The payment gateway account is not enabled for eCheck.Net subscriptions";
    } else if (errorCode == 'E00021') {
        return msg = "The payment gateway account is not enabled for credit card subscriptions.";
    } else if (errorCode == 'E00022') {
        return msg = "The interval length cannot exceed 365 days or 12 months";
    } else if (errorCode == 'E00023') {
        return msg = "The subscription duration cannot exceed three years";
    } else if (errorCode == 'E00024') {
        return msg = "Trial Occurrences is required when Trial Amount is specified.";
    } else if (errorCode == 'E00025') {
        return msg = "Automated Recurring Billing is not enabled.";
    } else if (errorCode == 'E00026') {
        return msg = "Both Trial Amount and Trial Occurrences are required.";
    } else if (errorCode == 'E00027') {
        return msg = "The transaction was unsuccessful.";
    } else if (errorCode == 'E00028') {
        return msg = "Trial Occurrences must be less than Total Occurrences.";
    } else if (errorCode == 'E00029') {
        return msg = "Payment information is required.";
    } else if (errorCode == 'E00030') {
        return msg = "The payment schedule is required.";
    } else if (errorCode == 'E00031') {
        return msg = "The amount is required.";
    } else if (errorCode == 'E00032') {
        return msg = "The start date is required.";
    } else if (errorCode == 'E00033') {
        return msg = "The start date cannot be changed.";
    } else if (errorCode == 'E00034') {
        return msg = "The interval information cannot be changed.";
    } else if (errorCode == 'E00035') {
        return msg = "The subscription cannot be found.";
    } else if (errorCode == 'E00036') {
        return msg = "The payment type cannot be changed.";
    } else if (errorCode == 'E00037') {
        return msg = "The subscription cannot be updated.";
    } else if (errorCode == 'E00038') {
        return msg = "The subscription cannot be canceled.";
    } else if (errorCode == 'E00039') {
        return msg = "A duplicate record already exists.";
    } else if (errorCode == 'E00040') {
        return msg = "The record cannot be found.";
    } else if (errorCode == 'E00041') {
        return msg = "One or more fields must contain a value.";
    } else if (errorCode == 'E00042') {
        return msg = "You cannot add more than {0} payment profiles.";
    } else if (errorCode == 'E00043') {
        return msg = "You cannot add more than {0} shipping addresses.";
    } else if (errorCode == 'E00044') {
        return msg = "Customer Information Manager is not enabled.";
    } else if (errorCode == 'E00045') {
        return msg = "The root node does not reference a valid XML namespace.";
    } else if (errorCode == 'E00046') {
        return msg = "Generic InsertNewMerchant failure.";
    } else if (errorCode == 'E00047') {
        return msg = "Merchant Boarding API is not enabled.";
    } else if (errorCode == 'E00048') {
        return msg = "At least one payment method must be set in payment types or an echeck service must be provided";
    } else if (errorCode == 'E00049') {
        return msg = "The operation timed out before it could be completed.";
    } else if (errorCode == 'E00050') {
        return msg = "Sell Rates cannot be less than Buy Rates";
    } else if (errorCode == 'E00051') {
        return msg = "The original transaction was not issued for this payment profile.";
    } else if (errorCode == 'E00052') {
        return msg = "The maximum number of elements for an array {0} is {1}.";
    } else if (errorCode == 'E00053') {
        return msg = "Server too busy";
    } else if (errorCode == 'E00054') {
        return msg = "The mobile device is not registered with this merchant account.";
    } else if (errorCode == 'E00055') {
        return msg = "The mobile device has already been registered but is pending approval by the account administrator.";
    } else if (errorCode == 'E00056') {
        return msg = "The mobile device has been disabled for use with this account.";
    } else if (errorCode == 'E00057') {
        return msg = "The user does not have permissions to submit requests from a mobile device.";
    } else if (errorCode == 'E00058') {
        return msg = "The merchant has met or exceeded the number of pending mobile devices permitted for this account.";
    } else if (errorCode == 'E00059') {
        return msg = "The authentication type is not allowed for this method call.";
    } else if (errorCode == 'E00060') {
        return msg = "The transaction type is invalid.";
    } else if (errorCode == 'E00062') {
        return msg = "Fatal error when calling web service.";
    } else if (errorCode == 'E00063') {
        return msg = "Calling web service return error.";
    } else if (errorCode == 'E00064') {
        return msg = "Client authorization denied.";
    } else if (errorCode == 'E00065') {
        return msg = "Prerequisite failed.";
    } else if (errorCode == 'E00066') {
        return msg = "Invalid value.";
    } else if (errorCode == 'E00067') {
        return msg = "An error occurred while parsing the XML request. Too many {0} specified.";
    } else if (errorCode == 'E00068') {
        return msg = "An error occurred while parsing the XML request. {0} is invalid.";
    } else if (errorCode == 'E00069') {
        return msg = "The Payment Gateway Account service (id=8) has already been accepted. Decline is not allowed.";
    } else if (errorCode == 'E00070') {
        return msg = "The Payment Gateway Account service (id=8) has already been declined. Agree is not allowed.";
    } else if (errorCode == 'E00071') {
        return msg = "{0} must contain data.";
    } else if (errorCode == 'E00072') {
        return msg = "Required node missing.";
    } else if (errorCode == 'E00073') {
        return msg = "One of the field values is not valid.";
    } else if (errorCode == 'E00074') {
        return msg = "This merchant is not associated with this reseller.";
    } else if (errorCode == 'E00075') {
        return msg = "This is the result of an XML parser error. Missing field(s).";
    } else if (errorCode == 'E00076') {
        return msg = "Invalid value.";
    } else if (errorCode == 'E00077') {
        return msg = "Value too long.";
    } else if (errorCode == 'E00078') {
        return msg = "Pending Status (not completed).";
    } else if (errorCode == 'E00079') {
        return msg = "The impersonation login ID is invalid or not present.";
    } else if (errorCode == 'E00080') {
        return msg = "The impersonation API Key is invalid or not present.";
    } else if (errorCode == 'E00081') {
        return msg = "Partner account is not authorized to impersonate the login account.";
    } else if (errorCode == 'E00082') {
        return msg = "Country is not valid.";
    } else if (errorCode == 'E00083') {
        return msg = "Bank payment method is not accepted for the selected business country.";
    } else if (errorCode == 'E00084') {
        return msg = "Credit card payment method is not accepted for the selected business country.";
    } else if (errorCode == 'E00085') {
        return msg = "State for {0} is not valid.";
    } else if (errorCode == 'E00086') {
        return msg = "Merchant has declined authorization to resource.";
    } else if (errorCode == 'E00087') {
        return msg = "No subscriptions found for the given request.";
    } else if (errorCode == 'E00088') {
        return msg = "ProfileIds cannot be sent when requesting CreateProfile";
    } else if (errorCode == 'E00089') {
        return msg = "Payment data is required when requesting CreateProfile.";
    } else if (errorCode == 'E00090') {
        return msg = "PaymentProfile and PaymentData are mutually exclusive, only one of them can be provided at a time.";
    } else if (errorCode == 'E00091') {
        return msg = "PaymentProfileId cannot be sent with payment data.";
    } else if (errorCode == 'E00092') {
        return msg = "ShippingProfileId cannot be sent with ShipTo data.";
    } else if (errorCode == 'E00093') {
        return msg = "PaymentProfile cannot be sent with billing data.";
    } else if (errorCode == 'E00094') {
        return msg = "Paging Offset exceeds the maximum allowed value";
    } else if (errorCode == 'E00095') {
        return msg = "ShippingProfileId is not provided within Customer Profile.";
    } else if (errorCode == 'E00096') {
        return msg = "Finger Print value is not valid.";
    } else if (errorCode == 'E00097') {
        return msg = "Finger Print can't be generated.";
    } else if (errorCode == 'E00098') {
        return msg = "Customer Profile ID or Shipping Profile ID not found.";
    } else if (errorCode == 'E00099') {
        return msg = "Customer profile creation failed. This transaction ID is invalid.";
    } else if (errorCode == 'E00100') {
        return msg = "Customer profile creation failed. This transaction type does not support profile creation.";
    } else if (errorCode == 'E00101') {
        return msg = "Customer profile creation failed.";
    } else if (errorCode == 'E00102') {
        return msg = "Customer Info is missing.";
    } else if (errorCode == 'E00103') {
        return msg = "Customer profile creation failed. This payment method does not support profile creation";
    } else if (errorCode == 'E00104') {
        return msg = "Server in maintenance. Please try again later.";
    } else if (errorCode == 'E00105') {
        return msg = "The specified payment profile is associated with an active or suspended subscription and cannot be deleted.";
    } else if (errorCode == 'E00106') {
        return msg = "The specified customer profile is associated with an active or suspended subscription and cannot be deleted";
    } else if (errorCode == 'E00107') {
        return msg = "The specified shipping profile is associated with an active or suspended subscription and cannot be deleted.";
    } else if (errorCode == 'E00108') {
        return msg = "CustomerProfileId cannot be sent with customer data";
    } else if (errorCode == 'E00109') {
        return msg = "CustomerAddressId cannot be sent with shipTo data.";
    } else if (errorCode == 'E00110') {
        return msg = "CustomerPaymentProfileId is not provided within Customer Profile.";
    } else if (errorCode == 'E00111') {
        return msg = "The original subscription was not created with this Customer Profile.";
    } else if (errorCode == 'E00112') {
        return msg = "The specified month should not be in the future.";
    } else if (errorCode == 'E00113') {
        return msg = "Invalid OTS Token Data.";
    } else if (errorCode == 'E00114') {
        return msg = "Invalid OTS Token.";
    } else if (errorCode == 'E00115') {
        return msg = "Expired OTS Token.";
    } else if (errorCode == 'E00116') {
        return msg = "OTS Token access violation";
    } else if (errorCode == 'E00117') {
        return msg = "OTS Service Error '{0}'";
    } else if (errorCode == 'E00118') {
        return msg = "The transaction has been declined.";
    } else if (errorCode == 'E00119') {
        return msg = "Payment information should not be sent to Hosted Payment Page request.";
    } else if (errorCode == 'E00120') {
        return msg = "Payment and Shipping Profile IDs cannot be specified when creating new profiles.";
    } else if (errorCode == 'E00121') {
        return msg = "No default payment/shipping profile found.";
    } else if (errorCode == 'E00122') {
        return msg = "Please use Merchant Interface settings (API Credentials and Keys) to generate a signature key.";
    } else if (errorCode == 'E00123') {
        return msg = "The provided access token has expired";
    } else if (errorCode == 'E00124') {
        return msg = "The provided access token is invalid";
    } else if (errorCode == 'E00125') {
        return msg = "Hash doesnâ€™t match";
    } else if (errorCode == 'E00126') {
        return msg = "Failed shared key validation";
    } else if (errorCode == 'E00127') {
        return msg = "Invoice does not exist";
    } else if (errorCode == 'E00128') {
        return msg = "Requested action is not allowed";
    } else if (errorCode == 'E00129') {
        return msg = "Failed sending email";
    } else if (errorCode == 'E00130') {
        return msg = "Valid Customer Profile ID or Email is required";
    } else if (errorCode == 'E00131') {
        return msg = "Invoice created but not processed completely";
    } else if (errorCode == 'E00132') {
        return msg = "Invoicing or CIM service is not enabled.";
    } else if (errorCode == 'E00133') {
        return msg = "Server error.";
    } else if (errorCode == 'E00134') {
        return msg = "Due date is invalid";
    } else if (errorCode == 'E00135') {
        return msg = "Merchant has not provided processor information.";
    } else if (errorCode == 'E00136') {
        return msg = "Processor account is still in process, please try again later.";
    } else if (errorCode == 'E00137') {
        return msg = "Multiple payment types are not allowed.";
    } else if (errorCode == 'E00138') {
        return msg = "Payment and Shipping Profile IDs cannot be specified when requesting a hosted payment page.";
    } else if (errorCode == 'E00139') {
        return msg = "Access denied. Access Token does not have correct permissions for this API.";
    } else if (errorCode == 'E00140') {
        return msg = "Reference Id not found";
    } else if (errorCode == 'E00141') {
        return msg = "Payment Profile creation with this OpaqueData descriptor requires transactionMode to be set to liveMode.";
    } else if (errorCode == 'E00142') {
        return msg = "RecurringBilling setting is a required field for recurring tokenized payment transactions.";
    } else if (errorCode == 'E00143') {
        return msg = "Failed to parse MerchantId to integer";
    } else if (errorCode == 'E00144') {
        return msg = "We are currently holding the last transaction for review. Before you reactivate the subscription, review the transaction.";
    } else if (errorCode == 'E00145') {
        return msg = "This invoice has been canceled by the sender. Please contact the sender directly if you have questions. ";
    } else if (errorCode == '0') {
        return msg = "Unknown Error";
    } else if (errorCode == '1') {
        return msg = "This transaction has been approved.";
    } else if (errorCode == '2') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '3') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '4') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '5') {
        return msg = "A valid amount is required.";
    } else if (errorCode == '6') {
        return msg = "The credit card number is invalid.";
    } else if (errorCode == '7') {
        return msg = "Credit card expiration date is invalid.";
    } else if (errorCode == '8') {
        return msg = "The credit card has expired";
    } else if (errorCode == '9') {
        return msg = "The ABA code is invalid";
    } else if (errorCode == '10') {
        return msg = "The account number is invalid";
    } else if (errorCode == '11') {
        return msg = "A duplicate transaction has been submitted.";
    } else if (errorCode == '12') {
        return msg = "An authorization code is required but not present.";
    } else if (errorCode == '13') {
        return msg = "The merchant login ID or password is invalid or the account is inactive. 	";
    } else if (errorCode == '14') {
        return msg = "The referrer, relay response or receipt link URL is invalid.";
    } else if (errorCode == '15') {
        return msg = "The transaction ID is invalid or not present.";
    } else if (errorCode == '16') {
        return msg = "The transaction cannot be found.";
    } else if (errorCode == '17') {
        return msg = "The merchant does not accept this type of credit card.";
    } else if (errorCode == '18') {
        return msg = "ACH transactions are not accepted by this merchant.";
    } else if (errorCode == '19') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '20') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '21') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '22') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '23') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '24') {
        return msg = "The Elavon bank number or terminal ID is incorrect. Call Merchant Service Provider.";
    } else if (errorCode == '25') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '26') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '27') {
        return msg = "The transaction has been declined because of an AVS mismatch. The address provided does not match billing address of cardholder.";
    } else if (errorCode == '28') {
        return msg = "The merchant does not accept this type of credit card.";
    } else if (errorCode == '29') {
        return msg = "The Paymentech identification numbers are incorrect. Call Merchant Service Provider.";
    } else if (errorCode == '30') {
        return msg = "The configuration with processor is invalid. Call Merchant Service Provider.";
    } else if (errorCode == '31') {
        return msg = "The FDC Merchant ID or Terminal ID is incorrect. Call Merchant Service Provider.";
    } else if (errorCode == '32') {
        return msg = "The merchant password is invalid or not present.";
    } else if (errorCode == '33') {
        return msg = "%s cannot be left blank.";
    } else if (errorCode == '34') {
        return msg = "The VITAL identification numbers are incorrect. Call Merchant Service Provider.";
    } else if (errorCode == '35') {
        return msg = "An error occurred during processing. Call Merchant Service Provider.";
    } else if (errorCode == '36') {
        return msg = "The authorization was approved but settlement failed.";
    } else if (errorCode == '37') {
        return msg = "The credit card number is invalid.";
    } else if (errorCode == '38') {
        return msg = "The Global Payment System identification numbers are incorrect. Call Merchant Service Provider.";
    } else if (errorCode == '39') {
        return msg = "The supplied currency code is either invalid, not supported, not allowed for this merchant or doesnt have an exchange rate.";
    } else if (errorCode == '40') {
        return msg = "This transaction must be encrypted.";
    } else if (errorCode == '41') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '42') {
        return msg = "There is missing or invalid information in a required field.";
    } else if (errorCode == '43') {
        return msg = "The merchant was incorrectly set up at the processor. Call Merchant Service Provider.";
    } else if (errorCode == '44') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '45') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '46') {
        return msg = "Your session has expired or does not exist. You must log in again to continue working.";
    } else if (errorCode == '47') {
        return msg = "The amount requested for settlement cannot be greater than the original amount authorized.";
    } else if (errorCode == '48') {
        return msg = "This processor does not accept partial reversals.";
    } else if (errorCode == '49') {
        return msg = "The transaction amount submitted was greater than the maximum amount allowed.";
    } else if (errorCode == '50') {
        return msg = "This transaction is awaiting settlement and cannot be refunded.";
    } else if (errorCode == '51') {
        return msg = "The sum of all credits against this transaction is greater than the original transaction amount.";
    } else if (errorCode == '52') {
        return msg = "The transaction was authorized but the client could not be notified; it will not be settled.";
    } else if (errorCode == '53') {
        return msg = "The transaction type is invalid for ACH transactions.";
    } else if (errorCode == '54') {
        return msg = "The referenced transaction does not meet the criteria for issuing a credit.";
    } else if (errorCode == '55') {
        return msg = "The sum of credits against the referenced transaction would exceed original debit amount.";
    } else if (errorCode == '56') {
        return msg = "Credit card transactions are not accepted by this merchant.";
    } else if (errorCode == '57') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '58') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '59') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '60') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '61') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '62') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '63') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '64') {
        return msg = "The referenced transaction was not approved.";
    } else if (errorCode == '65') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '66') {
        return msg = "This transaction cannot be accepted for processing.";
    } else if (errorCode == '67') {
        return msg = "This transaction cannot be accepted for processing.";
    } else if (errorCode == '68') {
        return msg = "The version parameter is invalid";
    } else if (errorCode == '69') {
        return msg = "The transaction type is invalid";
    } else if (errorCode == '70') {
        return msg = "The transaction method is invalid.";
    } else if (errorCode == '71') {
        return msg = "The bank account type is invalid.";
    } else if (errorCode == '72') {
        return msg = "The authorization code is invalid.";
    } else if (errorCode == '73') {
        return msg = "The drivers license date of birth is invalid.";
    } else if (errorCode == '74') {
        return msg = "The duty amount is invalid.";
    } else if (errorCode == '75') {
        return msg = "The freight amount is invalid.";
    } else if (errorCode == '76') {
        return msg = "The tax amount is invalid.";
    } else if (errorCode == '77') {
        return msg = "The SSN or tax ID is invalid.";
    } else if (errorCode == '78') {
        return msg = "The card code is invalid.";
    } else if (errorCode == '79') {
        return msg = "The drivers license number is invalid.";
    } else if (errorCode == '80') {
        return msg = "The drivers license state is invalid.";
    } else if (errorCode == '81') {
        return msg = "The requested form type is invalid.";
    } else if (errorCode == '82') {
        return msg = "Scripts are only supported in version 2.5.";
    } else if (errorCode == '83') {
        return msg = "The requested script is either invalid or no longer supported.";
    } else if (errorCode == '84') {
        return msg = "The device type is invalid or missing.";
    } else if (errorCode == '85') {
        return msg = "The market type is invalid";
    } else if (errorCode == '86') {
        return msg = "The Response Format is invalid";
    } else if (errorCode == '87') {
        return msg = "Transactions of this market type cannot be processed on this system.";
    } else if (errorCode == '88') {
        return msg = "Track1 data is not in a valid format.";
    } else if (errorCode == '89') {
        return msg = "Track2 data is not in a valid format.";
    } else if (errorCode == '90') {
        return msg = "ACH transactions cannot be accepted by this system.";
    } else if (errorCode == '91') {
        return msg = "Version 2.5 is no longer supported.";
    } else if (errorCode == '92') {
        return msg = "The gateway no longer supports the requested method of integration.";
    } else if (errorCode == '93') {
        return msg = "A valid country is required.";
    } else if (errorCode == '94') {
        return msg = "The shipping state or country is invalid.";
    } else if (errorCode == '95') {
        return msg = "A valid state is required.";
    } else if (errorCode == '96') {
        return msg = "This country is not authorized for buyers.";
    } else if (errorCode == '97') {
        return msg = "This transaction cannot be accepted.";
    } else if (errorCode == '98') {
        return msg = "This transaction cannot be accepted.";
    } else if (errorCode == '99') {
        return msg = "This transaction cannot be accepted.";
    } else if (errorCode == '100') {
        return msg = "The eCheck type parameter is invalid.";
    } else if (errorCode == '101') {
        return msg = "The given name on the account and/or the account type does not match the actual account.";
    } else if (errorCode == '102') {
        return msg = "This request cannot be accepted.";
    } else if (errorCode == '103') {
        return msg = "This transaction cannot be accepted.";
    } else if (errorCode == '104') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '105') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '106') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '107') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '108') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '109') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '110') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '111') {
        return msg = "A valid billing country is required.";
    } else if (errorCode == '112') {
        return msg = "A valid billing state/province is required.";
    } else if (errorCode == '113') {
        return msg = "The commercial card type is invalid.";
    } else if (errorCode == '114') {
        return msg = "The merchant account is in test mode. This automated payment will not be processed.";
    } else if (errorCode == '115') {
        return msg = "The merchant account is not active. This automated payment will not be processed.";
    } else if (errorCode == '116') {
        return msg = "The authentication indicator is invalid.";
    } else if (errorCode == '117') {
        return msg = "The cardholder authentication value is invalid.";
    } else if (errorCode == '118') {
        return msg = "The combination of card type, authentication indicator and cardholder authentication value is invalid.";
    } else if (errorCode == '119') {
        return msg = "Transactions having cardholder authentication values cannot be marked as recurring.";
    } else if (errorCode == '120') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '121') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '122') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '123') {
        return msg = "This account has not been given the permission(s) required for this request.";
    } else if (errorCode == '124') {
        return msg = "This processor does not accept recurring transactions.";
    } else if (errorCode == '125') {
        return msg = "The surcharge amount is invalid.";
    } else if (errorCode == '126') {
        return msg = "The Tip amount is invalid.";
    } else if (errorCode == '127') {
        return msg = "The transaction resulted in an AVS mismatch. The address provided does not match billing address of cardholder.";
    } else if (errorCode == '128') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '130') {
        return msg = "This merchant account has been closed.";
    } else if (errorCode == '131') {
        return msg = "This transaction cannot be accepted at this time.";
    } else if (errorCode == '132') {
        return msg = "This transaction cannot be accepted at this time.";
    } else if (errorCode == '141') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '145') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '153') {
        return msg = "There was an error processing the payment data.";
    } else if (errorCode == '154') {
        return msg = "Processing Apple Payments is not enabled for this merchant account";
    } else if (errorCode == '155') {
        return msg = "This processor does not support this method of submitting payment data.";
    } else if (errorCode == '156') {
        return msg = "The cryptogram is either invalid or cannot be used in combination with other parameters.";
    } else if (errorCode == '157') {
        return msg = "";
    } else if (errorCode == '158') {
        return msg = "";
    } else if (errorCode == '159') {
        return msg = "";
    } else if (errorCode == '160') {
        return msg = "";
    } else if (errorCode == '161') {
        return msg = "";
    } else if (errorCode == '162') {
        return msg = "";
    } else if (errorCode == '163') {
        return msg = "";
    } else if (errorCode == '164') {
        return msg = "";
    } else if (errorCode == '165') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '166') {
        return msg = "";
    } else if (errorCode == '167') {
        return msg = "";
    } else if (errorCode == '168') {
        return msg = "";
    } else if (errorCode == '169') {
        return msg = "";
    } else if (errorCode == '170') {
        return msg = "An error occurred during processing. Please contact the merchant.";
    } else if (errorCode == '171') {
        return msg = "An error occurred during processing. Please contact the merchant.";
    } else if (errorCode == '172') {
        return msg = "An error occurred during processing. Please contact the merchant.";
    } else if (errorCode == '173') {
        return msg = "An error occurred during processing. Please contact the merchant.";
    } else if (errorCode == '174') {
        return msg = "The transaction type is invalid. Please contact the merchant.";
    } else if (errorCode == '175') {
        return msg = "This processor does not allow voiding of credits.";
    } else if (errorCode == '176') {
        return msg = "";
    } else if (errorCode == '177') {
        return msg = "";
    } else if (errorCode == '178') {
        return msg = "";
    } else if (errorCode == '179') {
        return msg = "";
    } else if (errorCode == '180') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '181') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '182') {
        return msg = "One or more of the sub-merchant values are invalid.";
    } else if (errorCode == '183') {
        return msg = "One or more of the required sub-merchant values are missing.";
    } else if (errorCode == '184') {
        return msg = "Invalid Token Requestor Name.";
    } else if (errorCode == '185') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '186') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '187') {
        return msg = "Invalid Token Requestor ECI Length.";
    } else if (errorCode == '188') {
        return msg = "";
    } else if (errorCode == '189') {
        return msg = "";
    } else if (errorCode == '190') {
        return msg = "";
    } else if (errorCode == '191') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '192') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '193') {
        return msg = "The transaction is currently under review.";
    } else if (errorCode == '194') {
        return msg = "";
    } else if (errorCode == '195') {
        return msg = "One or more of the HTML type configuration fields do not appear to be safe.";
    } else if (errorCode == '196') {
        return msg = "";
    } else if (errorCode == '197') {
        return msg = "";
    } else if (errorCode == '198') {
        return msg = "";
    } else if (errorCode == '199') {
        return msg = "";
    } else if (errorCode == '200') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '201') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '202') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '203') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '204') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '205') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '206') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '207') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '208') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '209') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '210') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '211') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '212') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '213') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '214') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '215') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '216') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '217') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '218') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '219') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '220') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '221') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '222') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '223') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '224') {
        return msg = "This transaction has been declined";
    } else if (errorCode == '225') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '226') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '227') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '228') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '229') {
        return msg = "Conversion rate for this card is available.";
    } else if (errorCode == '230') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '231') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '232') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '233') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '234') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '235') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '236') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '237') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '238') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '239') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '240') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '241') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '242') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '243') {
        return msg = "Recurring billing is not allowed for this eCheck.Net type.";
    } else if (errorCode == '244') {
        return msg = "This eCheck.Net type is not allowed for this Bank Account Type.";
    } else if (errorCode == '245') {
        return msg = "This eCheck.Net type is not allowed when using the payment gateway hosted payment form.";
    } else if (errorCode == '246') {
        return msg = "This eCheck.Net type is not allowed.";
    } else if (errorCode == '247') {
        return msg = "This eCheck.Net type is not allowed.";
    } else if (errorCode == '248') {
        return msg = "The check number is invalid.";
    } else if (errorCode == '250') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '251') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '252') {
        return msg = "Your order has been received. Thank you for your business!";
    } else if (errorCode == '253') {
        return msg = "Your order has been received. Thank you for your business!";
    } else if (errorCode == '254') {
        return msg = "This transaction has been declined.";
    } else if (errorCode == '260') {
        return msg = "Reversal not supported for this transaction type.";
    } else if (errorCode == '261') {
        return msg = "An error occurred during processing. Please try again.";
    } else if (errorCode == '265') {
        return msg = "The PayformMask is invalid.";
    } else if (errorCode == '270') {
        return msg = "Line item %1 is invalid.";
    } else if (errorCode == '271') {
        return msg = "The number of line items submitted is not allowed. A maximum of %1 line items can be submitted.";
    } else if (errorCode == '280') {
        return msg = "The auction platform name is invalid.";
    } else if (errorCode == '281') {
        return msg = "The auction platform ID is invalid.";
    } else if (errorCode == '282') {
        return msg = "The auction listing type is invalid.";
    } else if (errorCode == '283') {
        return msg = "The auction listing ID is invalid.";
    } else if (errorCode == '283') {
        return msg = "The auction seller ID is invalid.";
    } else if (errorCode == '285') {
        return msg = "The auction buyer ID is invalid.";
    } else if (errorCode == '286') {
        return msg = "One or more required auction values were not submitted.";
    } else if (errorCode == '287') {
        return msg = "The combination of auction platform ID and auction platform name is invalid.";
    } else if (errorCode == '288') {
        return msg = "This transaction cannot be accepted.";
    } else if (errorCode == '289') {
        return msg = "This processor does not accept zero dollar authorization for this card type.";
    } else if (errorCode == '290') {
        return msg = "There is one or more missing or invalid required fields.";
    } else if (errorCode == '295') {
        return msg = "The amount of this request was only partially approved on the given prepaid card. An additional payment is required to fulfill the balance of this transaction.";
    } else if (errorCode == '296') {
        return msg = "The specified SplitTenderID is invalid.";
    } else if (errorCode == '297') {
        return msg = "Transaction ID and Split Tender ID cannot both be used in the same request.";
    } else if (errorCode == '298') {
        return msg = "This order has already been released or voided therefore new transaction associations cannot be accepted.";
    } else if (errorCode == '300') {
        return msg = "The device ID is invalid.";
    } else if (errorCode == '301') {
        return msg = "The device batch ID is invalid.";
    } else if (errorCode == '302') {
        return msg = "The reversal flag is invalid.";
    } else if (errorCode == '303') {
        return msg = "The device batch is full. Please close the batch.";
    } else if (errorCode == '304') {
        return msg = "The original transaction is in a closed batch.";
    } else if (errorCode == '305') {
        return msg = "The merchant is configured for auto-close.";
    } else if (errorCode == '306') {
        return msg = "The batch is already closed.";
    } else if (errorCode == '307') {
        return msg = "The reversal was processed successfully.";
    } else if (errorCode == '308') {
        return msg = "Original transaction for reversal not found.";
    } else if (errorCode == '309') {
        return msg = "The device has been disabled.";
    } else if (errorCode == '310') {
        return msg = "This transaction has already been voided.";
    } else if (errorCode == '311') {
        return msg = "This transaction has already been captured.";
    } else if (errorCode == '312') {
        return msg = "The specified security code was invalid.";
    } else if (errorCode == '313') {
        return msg = "A new security code was requested.";
    } else if (errorCode == '314') {
        return msg = "This transaction cannot be processed.";
    } else if (errorCode == '315') {
        return msg = "The credit card number is invalid.";
    } else if (errorCode == '316') {
        return msg = "Credit card expiration date is invalid.";
    } else if (errorCode == '317') {
        return msg = "The credit card has expired.";
    } else if (errorCode == '318') {
        return msg = "A duplicate transaction has been submitted.";
    } else if (errorCode == '319') {
        return msg = "The transaction cannot be found.";
    } else if (errorCode == '320') {
        return msg = "The device identifier is either not registered or not enabled.";
    } else if (errorCode == '325') {
        return msg = "The request data did not pass the required fields check for this application.";
    } else if (errorCode == '326') {
        return msg = "The request field(s) are either invalid or missing.";
    } else if (errorCode == '327') {
        return msg = "The void request failed. Either the original transaction type does not support void, or the transaction is in the process of being settled.";
    } else if (errorCode == '328') {
        return msg = "A validation error occurred at the processor.";
    } else if (errorCode == '330') {
        return msg = "V.me transactions are not accepted by this merchant.";
    } else if (errorCode == '331') {
        return msg = "The x_call_id value is missing.";
    } else if (errorCode == '332') {
        return msg = "The x_call_id value is not found or invalid.";
    } else if (errorCode == '333') {
        return msg = "A validation error was returned from V.me.";
    } else if (errorCode == '334') {
        return msg = "The V.me transaction is in an invalid state.";
    } else if (errorCode == '339') {
        return msg = "Use x_method to specify method or send only x_call_id or card/account information.";
    } else if (errorCode == '340') {
        return msg = "V.me by Visa does not support voids on captured or credit transactions. Please allow the transaction to settle, then process a refund for the captured transaction.";
    } else if (errorCode == '341') {
        return msg = "The x_discount value is invalid.";
    } else if (errorCode == '342') {
        return msg = "The x_giftwrap value is invalid.";
    } else if (errorCode == '343') {
        return msg = "The x_subtotal value is invalid.";
    } else if (errorCode == '344') {
        return msg = "The x_misc value is invalid.";
    } else if (errorCode == '350') {
        return msg = "Country must be a valid two or three-character value if specified.";
    } else if (errorCode == '351') {
        return msg = "Employee ID must be 1 to %x characters in length.";
    } else if (errorCode == '355') {
        return msg = "An error occurred while parsing the EMV data.";
    } else if (errorCode == '356') {
        return msg = "EMV-based transactions are not currently supported for this processor and card type.";
    } else if (errorCode == '357') {
        return msg = "Opaque Descriptor is required.";
    } else if (errorCode == '358') {
        return msg = "EMV data is not supported with this transaction type.";
    } else if (errorCode == '359') {
        return msg = "EMV data is not supported with this market type.";
    } else if (errorCode == '360') {
        return msg = "An error occurred while decrypting the EMV data.";
    } else if (errorCode == '361') {
        return msg = "The EMV version is invalid.";
    } else if (errorCode == '362') {
        return msg = "The EMV version is required.";
    } else if (errorCode == '363') {
        return msg = "The POS Entry Mode value is invalid.";
    } else if (errorCode == '370') {
        return msg = "Signature data is too large.";
    } else if (errorCode == '371') {
        return msg = "Signature must be PNG formatted data.";
    } else if (errorCode == '375') {
        return msg = "Terminal/lane number must be numeric.";
    } else if (errorCode == '380') {
        return msg = "KSN is duplicated.";
    } else if (errorCode == '901') {
        return msg = "This transaction cannot be accepted at this time due to system maintenance. Please try again later.";
    } else if (errorCode == '2000') {
        return msg = "Need payer consent.";
    } else if (errorCode == '2001') {
        return msg = "PayPal transactions are not accepted by this merchant.";
    } else if (errorCode == '2002') {
        return msg = "PayPal transactions require x_version of at least 3.1.";
    } else if (errorCode == '2003') {
        return msg = "Request completed successfully";
    } else if (errorCode == '2004') {
        return msg = "Success URL is required.";
    } else if (errorCode == '2005') {
        return msg = "Cancel URL is required.";
    } else if (errorCode == '2006') {
        return msg = "Payer ID is required.";
    } else if (errorCode == '2007') {
        return msg = "This processor does not accept zero dollar authorizations.";
    } else if (errorCode == '2008') {
        return msg = "The referenced transaction does not meet the criteria for issuing a Continued Authorization.";
    } else if (errorCode == '2009') {
        return msg = "The referenced transaction does not meet the criteria for issuing a Continued Authorization w/ Auto Capture.";
    } else if (errorCode == '2100') {
        return msg = "PayPal transactions require valid URL for success_url";
    } else if (errorCode == '2101') {
        return msg = "PayPal transactions require valid URL for cancel_url";
    } else if (errorCode == '2102') {
        return msg = "Payment not authorized. Payment has not been authorized by the user.";
    } else if (errorCode == '2103') {
        return msg = "This transaction has already been authorized.";
    } else if (errorCode == '2104') {
        return msg = "The totals of the cart item amounts do not match order amounts. Be sure the total of the payment detail item parameters add up to the order total.";
    } else if (errorCode == '2105') {
        return msg = "PayPal has rejected the transaction.Invalid Payer ID.";
    } else if (errorCode == '2106') {
        return msg = "PayPal has already captured this transaction.";
    } else if (errorCode == '2107') {
        return msg = "PayPal has rejected the transaction. This Payer ID belongs to a different customer.";
    } else if (errorCode == '2108') {
        return msg = "PayPal has rejected the transaction. x_paypal_hdrimg exceeds maximum allowable length.";
    } else if (errorCode == '2109') {
        return msg = "PayPal has rejected the transaction. x_paypal_payflowcolor must be a 6 character hexadecimal value.";
    } else if (errorCode == '2200') {
        return msg = "The amount requested for settlement cannot be different than the original amount authorized. Please void transaction if required";
    } else if (errorCode == '820') {
        return msg = " Please check your card details.";
    } else if (errorCode == ' Error Message : The credit card has expired.\n') {
        return msg = "The credit card has expired.";
    }
}

