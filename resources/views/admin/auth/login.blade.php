<!-- resources/views/admin/auth/login.blade.php -->
<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <div>
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
    </div>

    <button type="submit">Login</button>
</form>
