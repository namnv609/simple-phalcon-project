<h1>List users</h1>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    {% if users.items|length > 0 %}
        {% for user in users.items %}
        <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
        </tr>
        {% endfor %}
    {% else %}
        <tr>
            <td colspan="3">No user(s) :/</td>
        </tr>
    </tbody>
    {% endif %}
    <tr>
        <td colspan="3">
            {{ link_to("users/", "First") }}
            {{ link_to("users/?page=" ~ users.before, "Previous") }}
            {{ link_to("users/?page=" ~ users.next, "Next") }}
            {{ link_to("users/?page=" ~ users.last, "Last") }}
            You are in page {{ users.current }} of {{ users.total_pages }}
        </td>
    </tr>
</table>
