マイナンバーを入力してください
<form action="/prestore" method="POST">
    @csrf
    <input type="text" name="mynumber"/>
    <input type="submit" value="送信する"/>
</form>