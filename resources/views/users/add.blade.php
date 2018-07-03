<form action="{{url('users/add')}}" method="post">
    <input type="text" name="username"> <br>
    <input type="text" name="email"> <br>
    {{csrf_token()}}
    <input type="submit" name="add">
</form>