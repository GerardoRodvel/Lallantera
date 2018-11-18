<!-- formulario de creacion de productos -->
@extends("layouts.app")

@section("content")
  <div class="container white">
    <h1>Editar producto</h1>
    <!-- formulario -->
      @include('products.form',['product'=>$product, 'url'=>'/products/'.$product->id,'method'=>'PATCH'])
  </div>
@endsection
