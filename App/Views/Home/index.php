{% extends "base.php" %}
{% block title %}Products{% endblock %}

{% block body %}
<h1 class="mt-3">Products</h1>

  <table class="table table-striped table-hover my-5">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Date and Time</th>
      </tr>
    </thead>
    <tbody class="product__list">
    </tbody>
  </table>
  <form class="row g-3 needs-validation formAdd" action="/products/add" novalidate method="post">
  <input type="hidden" name="nocsrf" value="{{ session.token }}">
  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Укажите название товара</label>
    <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="Баунти" value="{{ product.name }}" required>

    <div class="text-danger error-name">

    </div>
  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Укажите цену товара</label>
    <input type="text" class="form-control" name="price" id="validationTooltip02" placeholder="10.00" value="{{ product.price }}" required>

    <div class="text-danger error-price">

    </div>

  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Укажите дату и время</label>
    <input type="text" name="date" class="form-control" id="validationTooltip03" placeholder="09.08.2021 16:41:23" value="{{ product.date }}"  required>

    <div class="text-danger error-date">

    </div>
  </div>
  <div class="col-12 mt-5">
    <button class="btn btn-primary btnAddPost" type="submit">Create Product</button>
  </div>
</form>
<script>
    'use strict';
    document.addEventListener('DOMContentLoaded', () => {
        const elements = {
            shopping: document.querySelector('.product__list'),
            elBtnAddPost: document.querySelector('.btnAddPost'),
            elFormAdd: document.querySelector('.formAdd'),
            alertErrorName: document.querySelector('.error-name'),
            alertErrorPrice: document.querySelector('.error-price'),
            alertErrorDate: document.querySelector('.error-date'),
        };
        async function getPosts() {
            try {
                const res = await fetch('/products/index');
                let posts = await res.json();

                posts.forEach(item => {
                    renderItem(item)
                });
            } catch (error) {
                console.log(error);
                alert('Something went wrong :(');
            }
        }


        getPosts();

        const renderItem = item => {

            const markup = `
            <tr>
              <td>${item.NAME}</td>
              <td>$${item.PRICE}</td>
              <td>${item.DATE}</td>
            </tr>
              `;

            elements.shopping.insertAdjacentHTML('beforeend', markup);
        };

        async function AddProduct(e) {

            e.preventDefault();

            const formData = new FormData(elements.elFormAdd);

            try {
                const response = await fetch('/products/add', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if(result.success === true) {
                    elements.shopping.innerHTML = '';
                    await getPosts();
                    elements.elFormAdd.reset();
                    elements.elFormAdd.classList.remove('was-validated');
                    elements.alertErrorName.innerHTML = '';
                    elements.alertErrorPrice.innerHTML = '';
                    elements.alertErrorDate.innerHTML = '';
                }
                if(result.error) {
                    console.log(result.error);


                    if(result.error.name) {
                        elements.alertErrorName.innerHTML = result.error.name;

                    }
                    if (result.error.price) {
                        elements.alertErrorPrice.innerHTML = result.error.price;
                        console.log(result.error.price)
                    }
                    if (result.error.date) {
                        elements.alertErrorDate.innerHTML = result.error.date;
                    }
                }

            } catch (error) {
                console.error('Ошибка:', error);
            }
        }

        elements.elFormAdd.addEventListener('submit', AddProduct)

    });


</script>
{% endblock %}
