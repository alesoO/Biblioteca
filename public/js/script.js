document.addEventListener('DOMContentLoaded', function () {
    const showPasswordBtns = document.querySelectorAll('.showPasswordBtn');

    showPasswordBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
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

$(document).ready(function () {
    $('.select-search').select2();

    $('#formReportBookButton').on("click", function (e) {
        e.preventDefault(); // Evitar o envio padrão do formulário
        updateTable();
    });

    $(document).on("click", ".paginate a", function (e) {
        e.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        updateTable(page);
    });

    function updateTable(page) {
        var formData = $('#formReportBook').serialize() + "&page=" + page;
        // Enviar solicitação Ajax para obter os resultados
        $.ajax({
            type: "GET",
            url: "/generate_Book_Table", // Substitua pela sua URL
            data: formData,
            success: function (response) {
                $('#reportTable thead').empty();

                console.log("Success! Response data:", response);

                var row = '<tr>';

                if (document.getElementById('title_check').checked) {
                    row += '<th scope="col">TITULO DO LIVRO</th>';
                }

                if (document.getElementById('author_check').checked) {
                    row += '<th scope="col">AUTOR</th>';
                }

                if (document.getElementById('publisher_check').checked) {
                    row += '<th scope="col">EDITORA</th>';
                }

                if (document.getElementById('page_check').checked) {
                    row += '<th scope="col">NUMERO DE PAGINAS</th>';
                }

                if (document.getElementById('created_at_check').checked) {
                    row += '<th scope="col">CRIADO EM</th>';
                }

                if (document.getElementById('updated_at_check').checked) {
                    row += '<th scope="col">EDITADO EM</th>';
                }

                row += '</tr>';
                $('#reportTable thead').append(row);

                // Limpar a tabela de resultados
                $('#reportTable tbody').empty();

                // Adicionar resultados à tabela
                response.data.forEach(function (result) {
                    var row = '<tr>';

                    if (document.getElementById('title_check').checked) {
                        row += '<td>' + result.title + '</td>';
                    }

                    if (document.getElementById('author_check').checked) {
                        row += '<td>' + result.author + '</td>';
                    }

                    if (document.getElementById('publisher_check').checked) {
                        row += '<td>' + result.publisher + '</td>';
                    }

                    if (document.getElementById('page_check').checked) {
                        row += '<td>' + result.page_count + '</td>';
                    }

                    if (document.getElementById('created_at_check').checked) {
                        row += '<td>' + result.created_at + '</td>';
                    }

                    if (document.getElementById('updated_at_check').checked) {
                        row += '<td>' + result.updated_at + '</td>';
                    }

                    row += '</tr>';
                    $('#reportTable tbody').append(row);
                });
                $('#paginationContainer').html(response.pagination);
                $('#genPDF').html('<button class="btn btn-secondary" type="submit"><i class="fas fa-print"></i> Imprimir</button>');
            }
        });
    }
});

