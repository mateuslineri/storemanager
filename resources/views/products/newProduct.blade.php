@extends('layouts.app')
@section('title', 'Cadastrar novo Produto')
@section('content')
  <div class="page-title-container">
    <div class="page-icon">
      <img src="{{ asset('img/products.png') }}" alt="-">
    </div>

    <div class="page-text">
      <div class="page-title">Cadastrar produto</div>
      <div class="page-description">
        Cadastre um novo produto preenchendo os dados abaixo
      </div>
    </div>
  </div>

  <form action="/products" class="page" method="POST">
    @csrf

    <div class="row"> <!-- name, stock, category -->
      <div class="group grid-size-6"> <!-- name -->
        <label for="name" class="label">Nome (Obrigatório)</label>
        <input type="text" 
          name="name" 
          id="name" 
          class="field border-bottom-primary"
          placeholder="Nome do produto">

        <div class="invalid-msg">
        @if ($errors->has('name'))
          {{ $errors->first('name') }}
        @endif
        </div>
      </div> <!-- end name -->

      <div class="group grid-size-1"> <!-- stock -->
        <label for="stock" class="label">Estoque</label>  
        <input type="number" 
          name="stock" 
          id="stock" 
          class="field border-bottom-primary" 
          placeholder="Quantidade ">
      </div> <!-- end stock -->
      
      <div class="group grid-size-3"> <!-- category -->
        <label for="category_id" class="label">Categoria (Obrigatório)</label>
        <select name="category_id" 
          id="category_id" 
          class="field border-bottom-primary">
          <option value="" default selected>Selecione uma categoria</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        
        <div class="invalid-msg">
        @if ($errors->has('category_id'))
          {{ $errors->first('category_id') }}
        @endif
        </div>
      </div> <!-- end category -->
    </div>
    
    <div class="row"> <!-- manufacturer, suppliers, extra_code -->
      <div class="group grid-size-3"> <!-- manufacturer -->
        <label for="manufacturer" class="label">Fabricante</label>
        <input type="text" 
          name="manufacturer" 
          id="manufacturer"
          class="field border-bottom-primary"
          placeholder="Marca">
      </div> <!-- end manufacturer -->

      <div class="group grid-size-3"> <!-- suppliers -->
        <label for="supplier_id" class="label">Fornecedor</label>
        <select name="supplier_id" 
          id="supplier_id" 
          class="field border-bottom-primary">
          <option value="" default selected>Selecione um fornecedor</option>
          @foreach ($suppliers as $supplier)
          <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
          @endforeach
        </select>
      </div> <!-- end suppliers -->

      <div class="group grid-size-1"> <!-- spacer --> </div>

      <div class="group grid-size-3"> <!-- extra_code -->
        <label for="extra_code" class="label">Código Extra</label>
        <input type="text" 
          name="extra_code" 
          id="extra_code" 
          class="field border-bottom-primary"
          placeholder="Código Interno (Opcional)">
      </div> <!-- end extra_code -->
    </div>
    
    <div class="row"> <!-- price -->
      <div class="group grid-size-3"> <!-- buy_price -->
        <label for="buy_price" class="label">Preço de compra - R$</label>  
        <input type="number" 
          name="buy_price" 
          id="buy_price" 
          class="field border-bottom-primary" 
          placeholder="Comprou por...">
      </div> <!-- end buy_price -->

      <div class="group grid-size-3"> <!-- sell_price -->
        <label for="sell_price" class="label">Preço de venda - R$</label>  
        <input type="number" 
          name="sell_price" 
          id="sell_price" 
          class="field border-bottom-primary" 
          placeholder="Vender por...">
      </div> <!-- end sell_price -->

      <div class="group grid-size-1"> <!-- spacer --> </div>
      
      <div class="group grid-size-3"> <!-- promo_price -->
        <label for="promo_price" class="label">Preço promocional - R$</label>  
        <input type="number" 
          name="promo_price" 
          id="promo_price" 
          class="field border-bottom-primary" 
          placeholder="Deixe em branco se não houver">
      </div> <!-- end promo_price -->
    </div>

    <div class="row"> <!-- desc, obs -->
      <div class="group grid-size-5"> <!-- desc input -->
        <label for="description" class="label">Descrição</label>
        <textarea name="description" 
          id="description"  
          class="field border-bottom-primary no-resize" 
          rows="1" 
          maxlength="150" 
          placeholder="Opcional - Descreva brevemente o produto">
        </textarea>
      </div> <!-- end desc input -->

      <div class="group grid-size-5"> <!-- obs input -->
        <label for="obs" class="label">Observações</label>
        <textarea name="obs" 
          id="obs"  
          class="field border-bottom-primary no-resize" 
          rows="1" 
          maxlength="150" 
          placeholder="Opcional - Adicione alguma observação sobre o produto">
        </textarea>
      </div> <!-- end obs input -->
    </div>

      
    <div class="button-field">
      <a href="/products" class="btn btn-neutral">Cancelar</a>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </form>

@endsection