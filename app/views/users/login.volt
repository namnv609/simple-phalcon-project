{{ partial("elements/errors") }}
<h2>Login</h2>
{{ form('users/login') }}
<p>
    <label for="email">Email</label>
    {{ text_field('email') }}
</p>
<p>
    <label for="password">Password</label>
    {{ password_field('password') }}
</p>
<p>
    {{ submit_button('Login') }}
    {{ link_to('users/register', "Don't have an account? Register here") }}
</p>