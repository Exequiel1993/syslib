<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}<span class="required">*</span>
    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'required']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Correo:') !!}<span class="required">*</span>
    {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control', 'required']) !!}
</div>
<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', 'Nueva Contraseña:') !!}<span class="required confirm-pwd">*</span>
    <input class="form-control input-group__addon" id="pfNewPassword" type="password"
           name="password" required>
</div>
<div class="form-group col-sm-3">
    {!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}<span
            class="required confirm-pwd">*</span>
    <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
           name="password_confirmation" required>
</div>
<!-- Phone Field -->
<div class="form-group col-sm-3">
    {!! Form::label('phone', 'Telefono:') !!}
    {!! Form::number('phone', null, ['id'=>'phone', 'class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-3 ">
    {!! Form::label('photo', 'Foto') !!}
    <div class="input-group-btn">
        <div class="col-sm-1" style="width: 11.333333%;">
            <span class="btn btn-primary btn-file" style="margin-right: 5px;margin-left: -17px;">
                <div id="lb">Subir</div>
                {!! Form::file('photo', ['id'=>'userImage']) !!}
            </span>
        </div>
    </div>
    <div class="text-right" style="margin-top: -55px; margin-right: 170px;">
        <img id='edit_preview' class="img-thumbnail" width="100px;"
             src="{{asset('images/user-avatar.png')}}"/>
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>