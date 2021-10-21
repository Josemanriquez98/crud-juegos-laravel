<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tienda_id') }}
            {{ Form::select('tienda_id', $tiendas , $juego->tienda_id, ['class' => 'form-control' . ($errors->has('tienda_id') ? ' is-invalid' : ''), 'placeholder' => 'Tienda']) }}
            {!! $errors->first('tienda_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $juego->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar Juego</button>
    </div>
</div>
