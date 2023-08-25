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
});

$(document).ready(function () {
    $('#title_select').change(function () {
        var selectedBookTitle = $(this).val();

        $.ajax({
            url: "/get_Updated_Options_Books",
            method: 'GET',
            data: { bookTitle: selectedBookTitle },
            success: function (data) {
                // Atualize as opções do seletor de autores
                var authorSelect = $('#author_id_select');
                authorSelect.empty();
                data.authorOptions.forEach(function (author) {
                    authorSelect.append($('<option>', {
                        value: author.id,
                        text: author.name
                    }));
                });

                // Atualize as opções do seletor de editoras
                var publisherSelect = $('#publisher_id_select');
                publisherSelect.empty();
                data.publisherOptions.forEach(function (publisher) {
                    publisherSelect.append($('<option>', {
                        value: publisher.id,
                        text: publisher.name
                    }));
                });
            }
        });
    });

    $('#author_id_select').change(function () {
        var selectedAuthorId = $(this).val();

        $.ajax({
            url: "/get_Updated_Options_Authors",
            method: 'GET',
            data: { authorID: selectedAuthorId },
            success: function (data) { },
        });
    });
});










