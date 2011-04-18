
function typeChange() {
    if ($('#type').val() == 'radio') {
        $('#text_size').css("display","none");
        $('#max_size').css("display","none");
        $('#textarea_size').css("display","none");
        $('#validate_type').css("display","none");
        $('#line_num').css("display","block");
        $('#option').css("display","block");
        $('#add_button').css("display","block");
    } else if ($('#type').val() == 'checkbox') {
        $('#text_size').css("display","none");
        $('#max_size').css("display","none");
        $('#textarea_size').css("display","none");
        $('#validate_type').css("display","none");
        $('#line_num').css("display","block");
        $('#option').css("display","block");
        $('#add_button').css("display","block");
    } else if ($('#type').val() == 'selectmenu') {
        $('#text_size').css("display","none");
        $('#max_size').css("display","none");
        $('#textarea_size').css("display","none");
        $('#validate_type').css("display","none");
        $('#line_num').css("display","none");
        $('#option').css("display","block");
        $('#add_button').css("display","block");
    } else if ($('#type').val() == 'textbox') {
        $('#text_size').css("display","block");
        $('#max_size').css("display","block");
        $('#textarea_size').css("display","none");
        $('#validate_type').css("display","block");
        $('#line_num').css("display","none");
        $('#option').css("display","none");
        $('#add_button').css("display","none");
    } else if ($('#type').val() == 'textarea') {
        $('#text_size').css("display","none");
        $('#max_size').css("display","block");
        $('#textarea_size').css("display","block");
        $('#validate_type').css("display","block");
        $('#line_num').css("display","none");
        $('#option').css("display","none");
        $('#add_button').css("display","none");
    } 
}

