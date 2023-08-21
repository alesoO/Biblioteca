document.addEventListener('DOMContentLoaded', function() {
    const showPasswordBtns = document.querySelectorAll('.showPasswordBtn');

    showPasswordBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const targetInputId = btn.getAttribute('data-target');
            const senhaInput = document.querySelector(targetInputId);

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                senhaInput.type = 'password';
                btn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    });
});



