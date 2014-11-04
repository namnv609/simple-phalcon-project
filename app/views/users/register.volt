{{ partial("elements/errors") }}
<h2>Register</h2>
{{ form("users/register") }}
<p>
    <label for="name">Name</label>
    {{ text_field("name") }}
</p>
<p>
    <label for="name">Email</label>
    {{ email_field("email") }}
</p>
<p>
    <label for="password">Name</label>
    {{ password_field("password") }}
</p>
{{ submit_button("Register") }}
{{ link_to('users/login', "Have an account? Login here") }}