{{-- Store Id Field --}}
<div class="form-group col-md-6">
    {!! Form::label("store_id", \Lang::get("attributes.store_id").":") !!}
    {!! Form::select("store_id", ["" => "Selecionar"] + $storesArray, null, ["class" => "form-control first-disabled custom-select"]) !!}
</div>


{{-- Name Field --}}
<div class="form-group col-md-6">
    {!! Form::label("name", \Lang::get("attributes.name").":") !!}
    {!! Form::text("name", null, ["class" => "form-control"]) !!}
</div>

{{-- Brand Field --}}
<div class="form-group col-md-4">
    {!! Form::label("brand", \Lang::get("attributes.brand").":") !!}
    {!! Form::text("brand", null, ["class" => "form-control"]) !!}
</div>

{{-- Model Field --}}
<div class="form-group col-md-4">
    {!! Form::label("model", \Lang::get("attributes.model").":") !!}
    {!! Form::text("model", null, ["class" => "form-control"]) !!}
</div>

{{-- Price Field --}}
<div class="form-group col-md-4">
    {!! Form::label("price", \Lang::get("attributes.price").":") !!}
    {!! Form::text("price", null, ["class" => "form-control money-mask"]) !!}
</div>

{{-- Description Field --}}
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', \Lang::get("attributes.description").":") !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div id="sizes-div">
    <div class="row">
        <!-- Tamanho Field -->
        <div class="form-group col-sm-5">
            <label for="size">Tamanho:</label>
            <input type="number" class="form-control sizes" required name="size" id="product-size">
        </div>

        <!-- Quantity Field -->
        <div class="form-group col-sm-5">
            <label for="stock">Quantidade:</label>
            <input type="number" class="form-control stocks" required name="stock" id="product-stock">
        </div>

        <div class="form-group col-sm-2">
            <a href="#" class='btn btn-danger btn-lg remove-row' style="position: absolute;bottom: 0;right: 7.5px;padding-left: 0.5rem;padding-right: 0.5rem">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    </div>
</div>
<a href="#" id="more-sizes" class="float-right">
    <div class="row">
        <h6>Adicionar mais tamanhos</h6>
        <i class="fas fa-plus" style="margin-left:1rem; padding-right: 7.5px"></i>
    </div>
</a>

@push('page_scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#more-sizes', function () {
                $('#sizes-div').append(`
                    <div class="row">
                        <!-- Tamanho Field -->
                        <div class="form-group col-sm-5">
                            <label for="size">Tamanho:</label>
                            <input type="number" class="form-control sizes" required name="size" id="product-size">
                        </div>

                        <!-- Quantity Field -->
                        <div class="form-group col-sm-5">
                            <label for="stock">Quantidade:</label>
                            <input type="number" class="form-control stocks" required name="stock" id="product-stock">
                        </div>

                        <div class="form-group col-sm-2">
                            <a href="#" class='btn btn-danger btn-lg remove-row' style="position: absolute;bottom: 0;right: 7.5px;padding-left: 0.5rem;padding-right: 0.5rem">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                `);
            });
        });

        // Send ajax request to create product
        $(document).on('click', "#create-product", function() {
            let allFilled = true;
            document.getElementById("create-form").querySelectorAll("[required]").forEach(function(i) {
                if (!allFilled) return;
                if (!i.value) allFilled = false;
            });
            // Check if all fields are filled
            if (!allFilled) {
                Swal.fire({
                    title: "Preencha todos os campos!",
                    icon: "error",
                    showCloseButton: true,
                    showConfirmButton: false
                });
            }
            // Get forms values
            store_id = $('#store_id').val();
            name = $('#name').val();
            price = $('#price').val();
            description = $('#description').val();
            brand = $('#brand').val();
            model = $('#model').val();
            this.sizes = [];
            this.stocks = [];
            var self = this;
            // Get each size and each stock in form
            document.getElementById("create-form").querySelectorAll(".sizes").forEach(function(i){
                self.sizes.push(i.value);
            });
            document.getElementById("create-form").querySelectorAll(".stocks").forEach(function(i){
                self.stocks.push(i.value);
            });
            allSizes = self.sizes;
            allStocks = self.stocks;
            // Send AJAX request to store product
            let routeCreate = "{{ route('products.store') }}";
            let routeIndex = "{{ route('products.index') }}";
            $.ajax({
                url: routeCreate,
                datatype: "json",
                data: {name, price, description, brand, model, allSizes, allStocks, store_id, _token: "{{ csrf_token() }}" },
                method: "POST"
            })
            .done(function(response) {
                location.replace(routeIndex);
            });
        });

        $(document).on('click', '.remove-row', function () {
            $(this).closest('.row').remove();
        });
    </script>
@endpush