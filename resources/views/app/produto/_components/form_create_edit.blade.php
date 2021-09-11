@if(isset($pedido->id))
    <form method="post" action="{{route('pedido.update', ['pedido' => $pedido->id])}}">
    @csrf 
    @method('PUT')
@else
    <form method="post" action="{{route('pedido.store')}}">
    @csrf
@endif
        <select name="fornecedor_id" id="">
            <option value="">Selecione um fornecedor</option>
            @foreach ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id}}" {{($pedido->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{$fornecedor->nome}}</option>
            @endforeach
        </select>
        {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}
        <input type="text" name="nome" value="{{$pedido->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <input type="text" name="descricao" value="{{$pedido->descricao ?? old('descricao')}}" placeholder="Descrição" class="borda-preta">
        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
        <input type="text" name="peso" value="{{$pedido->peso ?? old('peso')}}" placeholder="Peso" class="borda-preta">
        {{$errors->has('peso') ? $errors->first('peso') : ''}}
        <select name="unidade_id" id="">
            <option value="">Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id}}" {{($pedido->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
            @endforeach
        </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
        <button type="submit" class="borda-preta">Cadastrar</button>
</form>