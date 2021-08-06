
{% extends "base.php" %}
{% block title %}New Products{% endblock %}

{% block body %}
<h1 class="my-5">New Products</h1>
<form class="row g-3 needs-validation" novalidate action="/products/new" method="post">
  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationTooltip01" name="name" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please provide a valid product title.
    </div>
  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Price</label>
    <input type="number" class="form-control" name="price" id="validationTooltip02" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please provide a valid price.
    </div>
  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Date and Time</label>
    <input type="datetime-local" name="date" class="form-control" id="validationTooltip02" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please provide a valid Date and Time.
    </div>
  </div>
  <div class="col-12 mt-5">
    <button class="btn btn-primary" type="submit">Create Product</button>
  </div>
</form>
{% endblock %}