@auth
@else
<form id="id_form_messages">
    <div class="form-group">
        <label for="name">Никнейм: *</label>
        <input type="text" class="form-control" placeholder="Никнейм" name="username" id="username" required="true">
    </div>
    <div class="form-group">
        <label for="formessage">Сообщение: *</label>
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Текст сообщения" required="true"></textarea>
    </div>
    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LecG8MaAAAAAEjfTSMMjIhUC4hu6EQi4rZui0L8"></div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Добавить" id="add">
    </div>
</form>
@endauth