@push('css')
    @isset($user)
        <style type="text/css">
            .password-field {
                display: none;
            }
        </style>
    @endisset
@endpush

{{-- Name Field --}}
<div class="form-group col-md-4">
    {!! Form::label('name', \Lang::get("attributes.name").":") !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{{-- Role Name Field --}}
<div class="form-group col-md-4">
    {!! Form::label("role_name", \Lang::get("attributes.role_name").":") !!}
    {!! Form::select("role_name", ["" => "Selecionar"] + $rolesArray, null, ["class" => "form-control first-disabled"]) !!}
</div>

{{-- CPF Field --}}
<div class="form-group col-md-4">
    {!! Form::label('cpf', \Lang::get("attributes.cpf").":") !!}
    {!! Form::text('cpf', null, ['class' => 'form-control cpf-mask']) !!}
</div>

{{-- Phone Number Field --}}
<div class="form-group col-md-6">
    {!! Form::label('phone_number', \Lang::get("attributes.phone_number").":") !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control phone-mask']) !!}
</div>

{{-- Email Field --}}
<div class="form-group col-md-6">
    {!! Form::label('email', \Lang::get("attributes.email").":") !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

@isset($user)
    {{-- Keep Password --}}
    <div class="form-group col-md-12">
        <div class="icheck">
            <label>
                {!! Form::checkbox('keep_password', 1, true, ['id' => 'keep_password']) !!}
                <span>{!! \Lang::get('attributes.keep_password') !!}</span>
            </label>
        </div>
    </div>
@endisset

{{-- Password Field --}}
<div class="form-group col-md-6 password-field">
    {!! Form::label('password', \Lang::get('attributes.password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

{{-- Password Confirmation Field --}}
<div class="form-group col-md-6 password-field">
    {!! Form::label('password_confirmation', \Lang::get('attributes.password_confirmation').':') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

{{-- Photo Field --}}
<div class="form-group col-md-12">
    {!! Form::label('photo', \Lang::get('attributes.photo').':') !!}
    @if(isset($user->photo) && !strpos($user->photo, "default-square"))
        <!-- Div needed to restrict link to img -->
        <div>
            <a href="{!! $user->photo !!}" target="_blank">
                <img class="thumbnail" src="{!! $user->photo !!}" style="width:10%"/>
            </a>
        </div>
        <!-- Delete img -->
        <div class="form-group col-md-12 no-padding" style="margin-bottom:10px">
            <div class="icheck">
                {!! Form::checkbox('photo', 'delete', false) !!}
                {!! Form::label('photo', \Lang::get('attributes.delete_img')) !!}
            </div>
        </div>
    @else
        <img src=""/>
    @endif
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        // Actions on page load
        $(window).on("pageshow", function() {
            $("#keep_password").trigger("change");
        });

        // Show password fields
        $(document).on("change", "#keep_password", function(){
            if ($(this).is(":checked")) {
                $(".password-field").hide();
            } else {
                $(".password-field").show();
            }
        });
    </script>
@endpush