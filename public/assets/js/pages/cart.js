(function($) {

    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    };

}($));

//Set Private Roles and Actions to Events

var SetCartActions  = function(){
    var stringVi        = 'xtremecardz';
    var urlPath         = window.location;
    var fullpath        = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend        = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
    var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+frontend;

    var handleSpotColorClick    = function () {
        $('select[name="custom_die_cut"], select[name="uv_printing"], select[name="white_ink"]').change(function(e){

            var selectedDataRow = $(this).prop('value');
            var getPriceTag = parseInt($('#tagPrice').text().toString());

            if ($.isNumeric(selectedDataRow)) {
                $('#initPriceTag').val(getPriceTag + parseInt(selectedDataRow));
                $('#tagPrice').text((getPriceTag + parseInt(selectedDataRow)).toFixed(2));
                //alert(getPriceTag + parseInt(selectedDataRow));
            }
            else {
                $('#initPriceTag').val(getPriceTag - parseInt(selectedDataRow));
                $('#tagPrice').text((getPriceTag - parseInt(selectedDataRow)).toFixed(2));
            }
        });

    };

    var handleColorFrontRadioBox = function(){
        var previous        = 0;
        var radioBtn        = $('input[name="color_front_side"]');
        //var defaultChecked  = $('input[name="color_front_side"]');

        radioBtn.on("change",function(e){
            var getPriceTag = parseInt($('#tagPrice').text().toString());
            if (sessionStorage.getItem("color_front_side")) {
                previous = sessionStorage.getItem("color_front_side");
            }
            var newPrevRow  = $(this).val();
            var totalAmt    = ((getPriceTag + parseInt(newPrevRow)) - parseInt(previous.toString()));
            $('#tagPrice').text(totalAmt.toFixed(2));
            $('#initPriceTag').val(totalAmt);
            sessionStorage.setItem("color_front_side", $(this).val());
        })
    };

    var handleColorBackSideRadio    = function(){
        var previous        = 0;
        var radioBtn        = $('input[name="color_back_side"]');
        //var defaultChecked  = $('input[name="color_back_side"]');
        radioBtn.on("change",function(e){
            var getPriceTag = parseInt($('#tagPrice').text().toString());
            if (sessionStorage.getItem("color_back_side")) {
                previous = sessionStorage.getItem("color_back_side");
            }
            var newPrevRow = $(this).val();
            var totalAmt    = ((getPriceTag + parseInt(newPrevRow)) - parseInt(previous.toString()));
            $('#tagPrice').text(totalAmt.toFixed(2));
            $('#initPriceTag').val(totalAmt);
            sessionStorage.setItem("color_back_side", $(this).val());
        });
    };

    var formSubmitRow   = function(){
        $('#addToCartBtn').click(function(e){
            e.preventDefault();
            var emptyTextRow    = true;
            $("#cartFormRow").find("input, select, textarea").each(function(keyRow, valueRow){
                if($(this).val() ==""){
                    emptyTextRow    = false;
                    alert("Empty Field! Check the Fields"+valueRow.attr("name"));
                    return false;
                }
            });
            var serializeRow = $("#cartFormRow").serialize();
            if(emptyTextRow) {
                var notify = $.notify(
                    '<strong>Please Wait...</strong>Adding to Cart', {
                        type: 'success',
                        allow_dismiss: false,
                        showProgressbar: false,
                        newest_on_top: true,
                    }
                );
                $.ajax({
                    method: "POST",
                    data: serializeRow,
                    url: urlRowString + '/cart/',
                    success: function (result) {
                        //alert(JSON.stringify(result));
                        if(result.status === "OK"){
                            window.location.reload();
                        }
                    }
                });
            }
        });
    };

    var laserEngraveAction  = function(){
        $("#engrave_front_side").change(function(e){
            var getEngrave = parseInt($(this).val().toString());
            var getPriceTag = parseInt($('#tagPrice').text().toString());
            if ($(this).is(':checked')) {
                $('#tagPrice').text((getPriceTag + getEngrave).toFixed(2));
                $('#initPriceTag').val(getPriceTag + getEngrave);
            }
            else {
                $('#tagPrice').text((getPriceTag - getEngrave).toFixed(2));
                $('#initPriceTag').val(getPriceTag - getEngrave);
            }
        });

        $("#engrave_back_side").change(function(e){
            var getEngrave = parseInt($(this).val().toString());
            var getPriceTag = parseInt($('#tagPrice').text().toString());
            if ($(this).is(':checked')) {
                $('#tagPrice').text((getPriceTag + getEngrave).toFixed(2));
                $('#initPriceTag').val(getPriceTag + getEngrave);
            }
            else {
                $('#tagPrice').text((getPriceTag - getEngrave).toFixed(2));
                $('#initPriceTag').val(getPriceTag - getEngrave);
            }
        });
    }

    return {
        init: function(){
            formSubmitRow();
            handleSpotColorClick();
            handleColorFrontRadioBox();
            handleColorBackSideRadio();
            laserEngraveAction();
        }
    }
}();

$(document).ready(function(){
    SetCartActions.init();
});

$("#numQtyRow").inputFilter(function(value){
    var getInitPrice    = $.trim($('#initPriceTag').val());
    $('#tagPrice').text((getInitPrice * value).toFixed(2));
    return /^-?\d*$/.test(value);
    // return value.match(/^-?\d*$/);
});

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
