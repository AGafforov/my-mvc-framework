<div class="container">
    <h1>Создание новой задачи</h1>
    <form action="/index.php?route=task/add"
          method="post"
          enctype="multipart/form-data">


        <div class="form-group">
            <label for="username">Пользователь:</label>
            <input id="username"
                   type="text"
                   name="username"
                   class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input id="email" type="email" name="email" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="image">Изображение:</label>
            <input id="image" type="file" name="image" class="form-control-file"/>
        </div>

        <div class="form-group">
            <label>Контент:</label>
            <textarea name="content" required class="form-control" id="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Создать задачу</button>
        <button id="preview-btn"
                type="button"
                class="btn btn-info"
                data-toggle="modal"
                data-target="#classModal">
            Предварительный просмотр
        </button>
    </form>
</div>

<div id="classModal"
     class="modal fade bs-example-modal-lg"
     tabindex="-1"
     role="dialog"
     aria-labelledby="classInfo"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="classModalLabel">
                    Предварительный просмотр
                </h4>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 10px;">
                    <img src="#"
                         alt="Image"
                         id="pr-image"
                         style="width: 400px; display: block;margin-left: auto;margin-right: auto;"
                         class="rounded mx-auto d-block"/>
                </div>
                <table id="classTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Пользователь</th>
                        <th>E-mail</th>
                        <th>Контент</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="pr-username"></td>
                        <td id="pr-email"></td>
                        <td id="pr-content"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        /**
         * Handle for preview event
         */
        function onPreview() {
            var email = $("#email").val();
            var content = $("#content").val();
            var username = $("#username").val();

            $("#pr-email").html(email);
            $("#pr-content").html(content);
            $("#pr-username").html(username);

            console.log(email, content, username);
        }

        /**
         * Reads uploaded image
         * @param input
         */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pr-image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        /**
         * Handle for click on preview button
         */
        $("#preview-btn").on('click', onPreview);

        /**
         * Handle for upload image
         */
        $("#image").change(function () {
            readURL(this);
        });
    });
</script>
