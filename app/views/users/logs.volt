<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Time</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    {% if logs.items is defined %}
        {% set idx = 0 %}
        {% for email, time in logs.items %}
            {% set idx += 1 %}
        <tr>
            <td>{{ idx }}</td>
            <td>{{ date('m/d/Y H:i:s', time) }}</td>
            <td>{{ email }}</td>
        </tr>
        {% endfor %}
    {% else %}
        <tr>
            <td colspan="3">No log(s)</td>
        </tr>
    {% endif %}
        <tr>
            <td colspan="3">
                {{ link_to("users/logs", "First") }}
                {{ link_to("users/logs?page=" ~ logs.before, "Previous") }}
                {{ link_to("users/logs?page=" ~ logs.next, "Next") }}
                {{ link_to("users/logs?page=" ~ logs.last, "Last") }}
                You are in page {{ logs.current }} of {{ logs.total_pages }}
            </td>
        </tr>
    </tbody>
</table>