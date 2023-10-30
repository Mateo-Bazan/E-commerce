<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_inscripcion') }}
            {{ Form::text('tipo_inscripcion', $categoria->tipo_inscripcion, ['class' => 'form-control' . ($errors->has('tipo_inscripcion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Inscripcion']) }}
            {!! $errors->first('tipo_inscripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>