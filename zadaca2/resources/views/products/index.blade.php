@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>BIRT PRODUKTI</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Dodaj novi produkt</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <input type="text" name="search" id="search" class="form-control" placeholder="Pretraži proizvode">
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Produktna linija</th>
        <th>Produktna skala</th>
        <th>Prodavač</th>
        <th>Količina na stanju</th>
        <th>Prodajna cijena</th>
        <th>MSRP</th>
        <th width="280px">Opcije</th>
    </tr>
    <tbody id="tableData">
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->productCode }}</td>
            <td>{{ $product->productName }}</td>
            <td>{{ $product->productLine }}</td>
            <td>{{ $product->productScale }}</td>
            <td>{{ $product->productVendor }}</td>
            <td>{{ $product->quantityInStock }}</td>
            <td>{{ $product->buyPrice }}</td>
            <td>{{ $product->MSRP }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->productCode) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->productCode) }}">Detalji</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->productCode) }}">Uredi</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Izbriši</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}

<script>
$(document).ready(function(){
    fetch_product_data();

    function fetch_product_data(query = '') {
        $.ajax({
            url: "{{ route('products.search') }}",
            method: 'GET',
            data: { query: query },
            dataType: 'json',
            success: function (data) {
                var tableData = '';

                if (data.length === 0) {
                    tableData += '<tr><td colspan="9" class="text-center">Nema rezultata</td></tr>';
                } else {
                    $.each(data, function (key, product) {
                        tableData += '<tr>';
                        tableData += '<td>' + product.productCode + '</td>';
                        tableData += '<td>' + product.productName + '</td>';
                        tableData += '<td>' + product.productLine + '</td>';
                        tableData += '<td>' + product.productScale + '</td>';
                        tableData += '<td>' + product.productVendor + '</td>';
                        tableData += '<td>' + product.quantityInStock + '</td>';
                        tableData += '<td>' + product.buyPrice + '</td>';
                        tableData += '<td>' + product.MSRP + '</td>';
                        tableData += '<td>';
                        tableData += '<form action="{{ route('products.destroy', ':productCode') }}" method="POST">';
                        tableData += '<a class="btn btn-info" href="{{ route('products.show', ':productCode') }}">Detalji</a>';
                        tableData += '<a class="btn btn-primary" href="{{ route('products.edit', ':productCode') }}">Uredi</a>';
                        tableData += '@csrf';
                        tableData += '@method('DELETE')';
                        tableData += '<button type="submit" class="btn btn-danger">Izbriši</button>';
                        tableData += '</form>';
                        tableData += '</td>';
                        tableData += '</tr>';
                        tableData = tableData.replace(/:productCode/g, product.productCode);
                    });
                }

                $('#tableData').html(tableData);
            }
        });
    }

    $(document).on('keyup', '#search', function () {
        var query = $(this).val();
        fetch_product_data(query);
    });
});
</script>

@endsection
