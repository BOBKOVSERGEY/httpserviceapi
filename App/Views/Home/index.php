{% extends "base.php" %}
{% block title %}Home{% endblock %}

{% block body %}
<h1>Welcome {{ name }} </h1>
  <ul>
      {% for colour in colours %}
        <li>{{ colour }}</li>
      {% endfor %}
  </ul>
{% endblock %}