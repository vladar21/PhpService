$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '/auth/processRegister',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                var message = response.message || 'Registration completed successfully.';
                $('#successMessage').text(message).fadeIn(1000, function() {
                    setTimeout(function() {
                        $('#successMessage').fadeOut(1000, function() {
                            window.location.href = '/dashboard'; // Редирект на дашборд
                        });
                    }, 5000);
                });
                $('#errorMessage').hide();
            },
            error: function(xhr) {
                var errorMessage = xhr.responseJSON && xhr.responseJSON.error;
                var message = errorMessage || 'Error during registration. Please try again later.';
                $('#errorMessage').text(message).fadeIn(1000).delay(5000).fadeOut(1000);
            }
        });
    });
});