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

    $(document).on("click", "#paginationContainer a", function (e) {
        e.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        updateTable(page);
    });

    $('#formReportBookButton').on("click", function (e) {
        e.preventDefault(); // Evitar o envio padrão do formulário
        updateTable();
    });

    $('#title_select').on('change', function () {
        const selectedTitle = $(this).val();
        getAuthorOptionsByBook(selectedTitle, function (authorOptions) {
            updateSelectOptions($('#author_id_select'), authorOptions);
        });

        getPublisherOptionsByBook(selectedTitle, function (publisherOptions) {
            updateSelectOptions($('#publisher_id_select'), publisherOptions);
        });
    });

    $('#author_id_select').on('change', function () {
        const selectedAuthor = $(this).val();
        const selectedTitle = $('#title_select').val();

        /* getBookOptionsByAuthor(selectedAuthor, function (bookOptions) {
            console.log(bookOptions);
            updateSelectOptions($('#title_select'), bookOptions);
        }); */

        getPublisherOptionsByAuthorAndTitle(selectedAuthor, selectedTitle, function (publisherOptions) {
            updateSelectOptions($('#publisher_id_select'), publisherOptions);
        });
    });

    $('#publisher_id_select').on('change', function () {
/*         const selectedPublisher = $(this).val();
        const selectedTitle = $('#title_select').val();

        getBookOptionsByPublisher(selectedPublisher, function (bookOptions) {
            updateSelectOptions($('#title_select'), bookOptions);
        });

        getAuthorOptionsByPublisherAndTitle(selectedPublisher, selectedTitle, function (authorOptions) {
            updateSelectOptions($('#author_id_select'), authorOptions);
        }); */
    });

    $('#button_clean').on('click', function (e) {
        e.preventDefault();
        $('input[type="number"]').val('');
        $('input[type="date"]').val('');
        $('select').val('all').trigger('change');
    });

    function getAuthorOptionsByBook(bookTitle, callback) {
        $.ajax({
            url: '/get_Author_Options_By_Book',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                bookTitle: bookTitle,
            },
            type: "POST",
            success: function (response) {
                callback(response.authorOptions);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

 /*    function getAuthorOptionsByPublisherAndTitle(publisherId, title, callback) {
        $.ajax({
            url: '/get_Author_Options_By_Publisher_And_Title',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                publisherId: publisherId,
                title: title,
            },
            type: "POST",
            success: function (response) {
                callback(response.authorOptions);
            },
            error: function (error) {
                console.error(error);
            }
        });
    } */

    function getPublisherOptionsByBook(bookTitle, callback) {
        $.ajax({
            url: '/get_Publisher_Options_By_Book',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                bookTitle: bookTitle,
            },
            type: "POST",
            success: function (response) {
                callback(response.publisherOptions);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function getPublisherOptionsByAuthorAndTitle(authorId, title, callback) {
        $.ajax({
            url: '/get_Publisher_Options_By_Author_And_Title',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                authorId: authorId,
                title: title,
            },
            type: "POST",
            success: function (response) {
                callback(response.publisherOptions);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

/*     function getBookOptionsByAuthor(authorId, callback) {
        $.ajax({
            url: '/get_Book_Options_By_Author',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                authorId: authorId,
            },
            type: "POST",
            success: function (response) {
                callback(response.bookOptions);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function getBookOptionsByPublisher(publisherId, callback) {
        $.ajax({
            url: '/get_Book_Options_By_Publisher',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                publisherId: publisherId,
            },
            type: "POST",
            success: function (response) {
                callback(response.bookOptions);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
 */
    function updateSelectOptions(selectElement, options) {
        selectElement.empty();
        options.forEach(option => {
            selectElement.append($('<option>', {
                value: option.id,
                text: option.name || option.title
            }));
        });
    }

    function updateTable(page) {
        var formData = $('#formReportBook').serialize() + "&page=" + page;
        // Enviar solicitação Ajax para obter os resultados
        $.ajax({
            type: "GET",
            url: "/generate_Book_Table", // Substitua pela sua URL
            data: formData,
            success: function (response) {
                $('#reportTable thead').empty();

                var row = '<tr>';

                console.log(response);

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

