
{% extends "base.php" %}
{% block title %}Products{% endblock %}

{% block body %}
<h1>Products</h1>
<div>
  {% for products in product %}
    <h2>{{ product.title }}</h2>
    <p>{{ product.content }}</p>
  {% endfor %}
</div>
{% endblock %}