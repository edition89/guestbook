<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginLabel">Вход</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="id_form_messages">
          <div class="form-group">
            <label for="name">Логин: *</label>
            <input type="text" class="form-control" placeholder="Логин" name="login" id="login">
          </div>
          <div class="form-group">
            <label for="formessage">Пароль: *</label>
            <input type="text" class="form-control" placeholder="Пароль" name="password" id="password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Войти</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="success">Успех</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Запись успешна добавлена</p>
      </div>
    </div>
  </div>
</div>