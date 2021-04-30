<form method="POST" id="id_form_messages">
    @csrf
    <div class="form-group">
        <label for="name">Никнейм: *</label>
        <input type="text" class="form-control" placeholder="Никнейм" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="formessage">Сообщение: *</label>
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Текст сообщения"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Добавить" id="add">
    </div>
</form>