
<div>
    @foreach($errors->all() as $error)
        <b>{{ $error }}</b>
    @endforeach
</div>

<form action="{{ route('auth.auth') }}" method="post">
    @csrf
    <label>
        <input type="email" name="email" />
    </label>
    <label>
        <input type="password" name="password" />
    </label>
    <button type="submit">login</button>
</form>
