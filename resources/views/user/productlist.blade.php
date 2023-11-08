<!DOCTYPE html>
<html lang="en">
  <head>
    @include('user.css')
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    @include('user.navbar')
    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body d-flex flex-wrap justify-content-center">
          @foreach ($product as $product)
            <div class="card mx-2 mb-4" style="width: 18rem;">
              <img class="card-img-top" src='/product/{{ $product->image }}' alt="Product Image">
              <div class="card-body">
                <h5 class="card-title font-weight-bold">{{ $product->title }}</h5>
                <p class="card-text text-gray-700" id="productDescription{{ $product->id }}" style="display: none;">
                  {{ $product->description }}
                </p>
                <p class="card-text text-xl mt-4">P {{ $product->price }}</p>
                <div class="flex flex-row justify-between space-x-2">
                  <button class="btn btn-secondary toggle-description-button"
                    data-description-id="productDescription{{ $product->id }}">
                    View More Details
                  </button>
                  <button class="btn btn-primary toggle-cart-button"
                    data-cart-id="addToCart{{ $product->id }}">
                    Add to Cart
                  </button>
                </div>
                <form method="POST" action="{{ url('add_cart', $product->id) }}">
                  @csrf
                  <div class="hidden d-flex justify-content-end m-4" id="addToCart{{ $product->id }}">
                    <label for="quantity" class="text-gray-700 mr-2">Quantity</label>
                    <input type="number" name="quantity" value="1" min="1"
                      class="form-control w-25 border border-gray-400 rounded">
                    <button type="submit" class="btn btn-primary ml-2" style="background: blue">
                      OK
                    </button>
                  </div>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <script>
      const toggleDescriptionButtons = document.querySelectorAll('.toggle-description-button');

      toggleDescriptionButtons.forEach(button => {
        button.addEventListener('click', () => {
          const descriptionId = button.getAttribute('data-description-id');
          const descriptionElement = document.getElementById(descriptionId);

          if (descriptionElement) {
            const isDescriptionVisible = descriptionElement.style.display === 'block';
            descriptionElement.style.display = isDescriptionVisible ? 'none' : 'block';
            button.textContent = isDescriptionVisible ? 'View More Details' : 'Hide Details';
          }
        });
      });

      const toggleCartButtons = document.querySelectorAll('.toggle-cart-button');

      toggleCartButtons.forEach(button => {
        button.addEventListener('click', () => {
          const cartId = button.getAttribute('data-cart-id');
          const cartElement = document.getElementById(cartId);

          if (cartElement) {
            cartElement.classList.toggle('hidden');
          }
        });
      });
    </script>

    @include('user.js')
  </body>
</html>
