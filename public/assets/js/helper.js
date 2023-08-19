/**
 * Initialization
 */
$(document).ready(function() {
    $('.dataTables_paginate').addClass('hide');

    // spinner
    jQuery.ajaxSetup({
        beforeSend: function() {
            $('.spinner-overlay').show(); // Display the spinner container
        },
        complete: function(){
            $('table:first').DataTable().ajax.reload();
            $('.spinner-overlay').hide();
        },
        success: function() {}
    });
});

/**
 * Open calendar by click on input group append
 */
$(document).on('click', '.input-group-append.calendar, .input-group-prepend.calendar', function() {
    let calendar = $(this).parents('.input-group').first();
    calendar && calendar !== undefined ? $(calendar).find('input').datepicker("show") : null;
});

/**==================================================================================================================**/
/**        Frontend functions
 /**==================================================================================================================**/

/**
 * Show/Hide loader
 *
 * @param mode
 */
loader = function(mode) {
    let loader = $('.spinner-loader.global');
    mode === 'show' ? $(loader).show() : $(loader).hide();
};

/**
 * Show message notification
 *
 * @param mode
 * @param message
 */
notify = function(mode = '', message = '') {
    var bg = '';
    mode === 'error' ? bg = 'bg-danger' : null;
    mode === 'warning' ? bg = 'bg-warning' : null;
    mode === 'success' ? bg = 'bg-success' : null;

    let el = $(".poppay-flash-notify-item").clone();
    $(el).addClass('show poppay-flash-notify ' + bg).removeClass('poppay-flash-notify-item').show();
    $(el).find('.flash-notify_message').text(message);
    $('.notify-docker').append(el);

    setTimeout(function() { $(el).remove(); },9000);
};

/**==================================================================================================================**/
/**        Format functions
 /**==================================================================================================================**/

/**
 * Trim string
 *
 * @param str
 * @param ch
 * @returns {string}
 */
trimStr = function(str = '', ch = []) {
    let start = 0;
    let end = str.length;

    while(start < end && str[start] === ch)  ++start;
    while(end > start && str[end - 1] === ch)  --end;
    return (start > 0 || end < str.length) ? str.substring(start, end) : str;
};

/**
 * Format date
 *
 * @param date
 * @param month_type
 * @returns {string}
 */
formatDateTo = function (date = null, month_type = 'short') {
    let result = '';

    if (date) {
        const month_names = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const month_names_short = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const format = Number.isInteger(date) ? date : date;
        const dateFormat = new Date(format);

        result = ('0' + dateFormat.getDate()).slice(-2) + " "
            + (month_type === 'short' ? month_names_short[dateFormat.getMonth()] : month_names[dateFormat.getMonth()]) + " "
            + dateFormat.getFullYear() + " "
            + ('0' + dateFormat.getHours()).slice(-2) + ":"
            + ('0' + dateFormat.getMinutes()).slice(-2) + ":"
            + ('0' + dateFormat.getSeconds()).slice(-2);
    }
    return result;
};

/**
 * Format value to money format
 *
 * @param amount
 * @param currency
 * @param currency_show
 * @returns {string}
 */
formatMoneyTo = function(amount = 0, currency = 'LYD', currency_show = true) {
    var _currency = currency ? currency : window.getAppVariable('currency_default');

    let config = currency_show ? { style: 'currency', currency: _currency, maximumFractionDigits: 2, minimumFractionDigits: 2 } : { maximumFractionDigits: 2, minimumFractionDigits: 2 };
    let formatter = new Intl.NumberFormat('en-US', config);
    return formatter.format(amount);
};

/**==================================================================================================================**/
/**        Help functions
 /**==================================================================================================================**/

/**
 * Get app variable
 * located in default layout
 *
 * @param variable
 * @returns {*}
 */
getAppVariable = function (variable = '') {
    let value = $('.app-variables').attr('data-' + variable);
    return value !== undefined ? value : '';
};

/**
 * Send Ajax request
 *
 * @param url
 * @param data
 * @param callback
 */
window.ajaxRequest = function(url, data, callback) {
    let request_type = data.request_type !== undefined ? data.request_type : 'post';

    loader('show');

    data._csrfToken = getAppVariable('csrf_token');

    $.ajax({
        url: url,
        data: data,
        type: request_type,
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', getAppVariable('csrf_token'));
        },
        success: function (response) {
            loader('hide');
            callback(response);
        },
        error: function (error) {
            loader('hide');
            callback(error);
        }
    });
};

/**
 * Small tag builder
 *
 * @param text
 * @returns {string}
 */
getTagSmall = function (text = '') {
    return "<small class='c-gray-light'><i>" + text + "</i></small>";
};