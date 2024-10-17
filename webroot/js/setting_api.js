
$(document).ready(function () {
    getaddress();
    getPaymentDetails();
//    getloginDetails();
    getWallets();


});
function getaddress() {
    var url = $('#pageurl').val();
    var user_id = $('#user_id').val();

    $.ajax({
        type: 'POST',
        url: url + 'users/getAllAddress/' + user_id,
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_payment_details/' + user_id,
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
        var user_id = $('#user_id').val();
        $('#loaderPyament').show();
        var formData = $('#shipaddress').serialize();
        $.post(url + 'users/ajax_shipping_address/' + user_id, formData, function (response) {
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/'+user_id,
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
        var user_id = $('#user_id').val();
        $('#loaderPyament').show();
        var formData = $('#changeAddAddress').serialize();
        $.post(url + 'users/ajax_shipping_address/'+user_id, formData, function (response) {
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
    var user_id = $('#user_id').val();
    $.post(url + 'users/ajax_use_this_card/'+user_id, formData, function (response) {
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_payment_card_details/' + user_id,
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_billing_address_details/' + user_id,
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_billing_address_list/' + user_id,
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
    var user_id = $('#user_id').val();
    var formData = $('#useAdForm').serialize();
    $.post(url + 'users/ajaxChangeBillingAddress/'+user_id, formData, function (response) {
        if (response) {
            $('#pop-up-box-change-address').hide();
            getBillingAddress();
        }

    }, 'json');

});
function addNewAddress() {

    var url = $('#pageurl').val();
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/'+user_id,
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
        var user_id = $('#user_id').val();
        $('#loaderPyament').show();
        var formData = $('#shipaddress2').serialize();
        $.post(url + 'users/ajax_shipping_address/'+user_id, formData, function (response) {
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_shipping_address_details/'+user_id,
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/get_ship_address_list/'+user_id,
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/'+user_id,
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
        var user_id = $('#user_id').val();
        $('#loaderPyament').show();
        var formData = $('#shipaddress3').serialize();
        $.post(url + 'users/ajax_shipping_address/'+user_id, formData, function (response) {
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
    var user_id = $('#user_id').val();
    var formData = $('#useshhipForm').serialize();
    $.post(url + 'users/ajax_changeshipthis_address/'+user_id, formData, function (response) {
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
    var user_id = $('#user_id').val();
    var kid_id = $('#kid_id').val();

    $.post(url + 'api/ajaxReadmeCodeOrder', {user_id:user_id,promocode: promocode, totalPrice: totalPrice, paymentID: paymentID, total_user_order_price: total_user_order_price, kid_id:kid_id}, function (response) {
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


                $('#currentBlnce').html('$' + parseFloat(currentBlace).toFixed(2));
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

    let tt_prc = (parseFloat(allTotal) + parseFloat(sales_tax)).toFixed(2);

    $('#totalSpan').html('$' + tt_prc);
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_wallets_details/' + user_id,
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
    var user_id = $('#user_id').val();
    var kid_id = $("#kid_id").val();
    var formData = {promocode: promocode, total_user_order_price: total_user_order_price, user_id:user_id, kid_id:kid_id};
    $.post(url + 'api/ajax_readme_code_check', formData, function (response) {

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
    var promo = $('#promoprice').val();
    if ($(this).is(':checked')) {
        var lastBil = parseFloat(stotal) - parseFloat(wallet) - parseFloat(promo);
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
    var user_id = $('#user_id').val();
    $.ajax({
        type: 'POST',
        url: url + 'users/ajax_address_count/'+user_id,
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

