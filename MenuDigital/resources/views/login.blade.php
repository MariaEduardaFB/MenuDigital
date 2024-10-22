<form method="POST" action="{{ url('/login') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form>
