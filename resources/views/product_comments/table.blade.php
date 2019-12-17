<div class="table-responsive">
    <table class="table" id="productComments-table">
        <thead>
            <tr>
                <th>{{ __('Text') }}</th>
        <th>{{ __('Allowed') }}</th>
        <th>{{ __('Product Id') }}</th>
        <th>{{ __('User Id') }}</th>
        <th>{{ __('Session') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productComments as $productComment)
            <tr>
                <td>{!! $productComment->text !!}</td>
            <td>{!! $productComment->allowed !!}</td>
            <td>
                <a href="/products/{{ $productComment->product_id }}">
                    {!! \App\Models\Product::find($productComment->product_id)->name !!}
                </a>
            </td>
            <td>{!! $productComment->user_id !!}</td>
            <td>{!! $productComment->session !!}</td>
                <td>
                    {!! Form::open(['route' => ['productComments.destroy', $productComment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('productComments.show', [$productComment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{!! route('productComments.edit', [$productComment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
