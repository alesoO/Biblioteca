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
})

$(document).ready(function () {
    $('#formReportHistoryButton').on("click", function (e) {
        e.preventDefault(); // Evitar o envio padrão do formulário
        updateTable();
    });
});

function updateTable(page) {
    var formData = $('#formReportHistory').serialize() + "&page=" + page;
    // Enviar solicitação Ajax para obter os resultados
    $.ajax({
        type: "GET",
        url: "/generate_History_Table", // Substitua pela sua URL
        data: formData,
        success: function (response) {
            $('#reportTable thead').empty();

            var row = '<tr>';

            console.log(response);

            if (document.getElementById('student_check').checked) {
                row += '<th scope="col">ESTUDANTE</th>';
            }

            if (document.getElementById('title_check').checked) {
                row += '<th scope="col">TITULO DO LIVRO</th>';
            }

            if (document.getElementById('school_year_check').checked) {
                row += '<th scope="col">ANO ESCOLAR</th>';
            }

            if (document.getElementById('registration_check').checked) {
                row += '<th scope="col">MATRÍCULA</th>';
            }

            if (document.getElementById('created_at_check').checked) {
                row += '<th scope="col">CRIADO EM</th>';
            }


            row += '</tr>';
            $('#reportTable thead').append(row);

            // Limpar a tabela de resultados
            $('#reportTable tbody').empty();

            // Adicionar resultados à tabela
            response.data.forEach(function (result) {
                var row = '<tr>';

                if (document.getElementById('student_check').checked) {
                    row += '<td>' + result.student + '</td>';
                }

                if (document.getElementById('title_check').checked) {
                    row += '<td>' + result.title + '</td>';
                }

                if (document.getElementById('school_year_check').checked) {
                    row += '<td>' + result.school_year +'°ano'+ '</td>';
                }

                if (document.getElementById('registration_check').checked) {
                    row += '<td>' + result.registration_id + '</td>';
                }

                if (document.getElementById('created_at_check').checked) {
                    row += '<td>' + result.created_at + '</td>';
                }

                row += '</tr>';
                $('#reportTable tbody').append(row);
            });
            $('#paginationContainer').html(response.pagination);
            $('#genPDF').html('<button class="btn btn-secondary" type="submit"><i class="fas fa-print"></i> Imprimir</button>');
        }
    });
}