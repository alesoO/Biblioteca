/* show password code */

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


document.addEventListener("DOMContentLoaded", function () {
    const loanTable = document.getElementById("loanTable");
    const completedLoanTable = document.getElementById("completedLoanTable");
    const completeButtons = document.querySelectorAll(".complete-button");

    completeButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const clone = row.cloneNode(true);
            
            completedLoanTable.querySelector("tbody").appendChild(clone);
            row.remove();
        });
    });
});


