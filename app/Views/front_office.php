<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu | Trusted & Easy PoS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .menu-item {
      margin: 1% 0px;
    }

    .menu-category {
      color: rgb(255, 255, 255);
      border-radius: 0%;
    }

    .sidebar-item {
      border-radius: 0%;
    }

    a {
      text-decoration: none;
    }

    .img-fluid {
      max-width: 100%;
      height: 50%;
    }

    h5 {
      font-size: 110%;
    }
  </style>
</head>

<body class="container-fluid">
  <div class="row row-cols-12 h-100 ">
    <div class="col col-1 bg-dark p-0">
      <div class="btn-group-vertical w-100" role="group" aria-label="Vertical button group">
        <button type="button" class="btn btn-danger sidebar-item fw-bold p-1 ">
          <h5>Menu</h5>
        </button>
        <button type="button" class="btn btn-secondary sidebar-item fw-bold p-1 ">
          <h5>Queue</h5>
        </button>
      </div>
    </div>

    <div class="col col-7">
      <div class="row row-cols-5 mx-2 my-3">
        <?php foreach ($menu as $item): ?>
          <div class="col menu-item" data-category="<?= $item['category'] ?>" data-item-id="<?= $item['menu_id'] ?>"
            data-item-name="<?= $item['menu_name'] ?>" data-item-price="<?= $item['price'] ?>">
            <div class="card h-100">
              <img src="<?= $item['img_url'] ?>" class="img-fluid" alt="...">
              <div class="card-body d-flex justify-content-center">
                <a href="#" class="stretched-link align-self-start text-center">
                  <span class="text-danger text-center fw-bold">Rp<?= number_format($item['price'], 2, ',', '.') ?></span>
                  <h5 class="card-title text-center align-text-bottom fw-bold text-black"><?= $item['menu_name'] ?></h5>
                </a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="col col-1 text-center p-0 bg-secondary border border-black">
      <div class="sidebar d-flex flex-column ">
        <h5 class=" fw-bold text-black bg-warning py-2 my-0">Category</h5>
        <?php if (isset($categories) && !empty($categories)): ?>
          <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group"
            style="border-radius: 0px;">
            <?php $i = 1; // Counter for unique IDs ?>
            <?php foreach ($categories as $category): ?>
              <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio-<?= $i ?>" autocomplete="off"
                data-category="<?= $category['category'] ?>">
              <label class="btn btn-secondary text-black menu-category" for="vbtn-radio-<?= $i ?>">
                <?= $category['category'] ?>
              </label>
              <?php $i++; // Increment counter for unique IDs ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="col col-3 bg-dark border border-black vh-100 p-0">
      <div class="row h-100 w-100 mx-0">
        <div class="col col-12 d-flex flex-column h-50 ">
          <div class="overflow-y-auto" id="cart">
            <!-- Cart items will be appended here -->
          </div>
        </div>
        <div class="col col-12 bg-light text-black p-0">
          <form class="w-100">
            <h4 class="text-start">
              <span class="badge text-bg-dark text-white px-5 py-3 m-2">
                Order #1
              </span>
            </h4>
            <div class="row mx-0">
              <div class="col-12">
                <input type="text" class="form-control border border-black w-50" id="inputAddress" placeholder="Name">
              </div>
              <div class="col-12 my-3">
                <div class="row border border-black mx-0">
                  <div class="col col-6 bg-secondary text-white py-1">
                    <span>DISCOUNT</span>
                  </div>
                  <div class="col col-6 text-end ">
                    <span>0%</span>
                  </div>
                  <div class="col col-6 bg-dark text-white py-1">
                    <span>SUBTOTAL</span>
                  </div>
                  <div class="col col-6 text-end ">
                    <span id="subtotal">Rp0</span>
                  </div>
                  <div class="col col-6 bg-secondary text-white py-1">
                    <span>TAX</span>
                  </div>
                  <div class="col col-6 text-end ">
                    <span>11%</span>
                  </div>
                  <div class="col col-6 bg-danger text-white py-1">
                    <span>TOTAL</span>
                  </div>
                  <div class="col col-6 text-end ">
                    <span id="total">Rp0</span>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="btn-group w-100 p-0" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-danger" style="border-radius: 0%;">CLEAR</button>
          <button type="button" class="btn btn-dark" style="border-radius: 0%;">SEND</button>
          <button type="button" class="btn btn-success" style="border-radius: 0%;">DISCOUNT</button>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

      const radioButtons = document.querySelectorAll('.btn-check[name="vbtn-radio"]');
      const menuItems = document.querySelectorAll('.menu-item');

      radioButtons.forEach(radioButton => {
        radioButton.addEventListener('change', function () {
          const selectedCategory = this.dataset.category;

          // Hide all menu items
          menuItems.forEach(menuItem => menuItem.classList.add('d-none'));

          // Show only items matching the selected category
          menuItems.forEach(menuItem => {
            if (menuItem.dataset.category === selectedCategory || selectedCategory === 'all') {
              menuItem.classList.remove('d-none');
            }
          });
        });
      });

      function updateCartSummary() {
        let subtotal = 0;
        document.querySelectorAll('#cart .card').forEach(cartItem => {
          const itemPriceElement = cartItem.querySelector('.item-price');
          const itemPrice = parseFloat(itemPriceElement.innerText.replace(/Rp|,/g, ''));
          subtotal += itemPrice;
        });

        const tax = subtotal * 0.11;
        const total = subtotal + tax;

        document.getElementById('subtotal').innerText = `Rp${subtotal.toFixed(0).toLocaleString('id-ID')}`;
        document.getElementById('total').innerText = `Rp${total.toFixed(0).toLocaleString('id-ID')}`;
      }

      function addItemToCart(itemId, itemName, itemPrice) {
        const existingCartItem = document.querySelector(`#cart-item-${itemId}`);
        if (existingCartItem) {
          // Update quantity and price
          const quantityElement = existingCartItem.querySelector('.item-quantity');
          const priceElement = existingCartItem.querySelector('.item-price');
          let quantity = parseInt(quantityElement.innerText);
          quantity += 1;
          quantityElement.innerText = quantity;
          priceElement.innerText = `Rp${(itemPrice * quantity).toFixed(0).toLocaleString('id-ID')}`;
        } else {
          // Add new item to the cart
          const cartItem = document.createElement('div');
          cartItem.className = 'card mx-3 my-3';
          cartItem.id = `cart-item-${itemId}`;
          cartItem.innerHTML = `
        <div class="card-body d-inline-flex align-items-center justify-content-between mx-2">
          <span class="fs-6">${itemName}</span>
          <div class="btn-group d-flex align-items-center w-auto" role="group" aria-label="Second group">
            <button type="button" class="btn btn-outline-dark text-danger border-white rounded-0">-</button>
            <button type="button" class="btn btn-outline-dark text-dark border-white item-quantity rounded-0">1</button>
            <button type="button" class="btn btn-outline-dark text-success border-white rounded-0">+</button>
          </div>
          <span class="item-price fw-bold fs-6 mx-2">Rp${itemPrice.toFixed(0).toLocaleString('id-ID')}</span>
        </div>
      `;
          document.getElementById('cart').appendChild(cartItem);

          // Add event listeners to the new buttons
          const minusButton = cartItem.querySelector('.text-danger');
          const plusButton = cartItem.querySelector('.text-success');

          minusButton.addEventListener('click', function () {
            const quantityElement = cartItem.querySelector('.item-quantity');
            const priceElement = cartItem.querySelector('.item-price');
            let quantity = parseInt(quantityElement.innerText);
            if (quantity > 1) {
              quantity -= 1;
              quantityElement.innerText = quantity;
              priceElement.innerText = `Rp${(itemPrice * quantity).toFixed(0).toLocaleString('id-ID')}`;
              updateCartSummary();
            } else {
              cartItem.remove();
              updateCartSummary();
            }
          });

          plusButton.addEventListener('click', function () {
            const quantityElement = cartItem.querySelector('.item-quantity');
            const priceElement = cartItem.querySelector('.item-price');
            let quantity = parseInt(quantityElement.innerText);
            quantity += 1;
            quantityElement.innerText = quantity;
            priceElement.innerText = `Rp${(itemPrice * quantity).toFixed(0).toLocaleString('id-ID')}`;
            updateCartSummary();
          });
        }
        updateCartSummary();
      }

      // Event listeners for adding items to the cart
      document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function (e) {
          e.preventDefault(); // Prevent default anchor click behavior
          const itemId = this.dataset.itemId;
          const itemName = this.dataset.itemName;
          const itemPrice = parseFloat(this.dataset.itemPrice);
          addItemToCart(itemId, itemName, itemPrice);
        });
      });
    });

  </script>

</body>

</html>