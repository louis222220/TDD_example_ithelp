<form method="post" action="/post">
    @csrf
    <input type="text" size="50" name="post_text">
    <input type="submit" value="送出貼文">
</form>