@isset($user->id)
    {{-- Id Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("id", \Lang::get("attributes.id").":") !!}
        <p>{{ $user->id }}</p>
    </div>
@endisset

@isset($user->username)
    {{-- Username Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("username", \Lang::get("attributes.username").":") !!}
        <p>{{ $user->username }}</p>
    </div>
@endisset

@isset($user->email)
    {{-- Email Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("email", \Lang::get("attributes.email").":") !!}
        <p>{{ $user->email }}</p>
    </div>
@endisset

@isset($user->name)
    {{-- Name Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("name", \Lang::get("attributes.name").":") !!}
        <p>{{ $user->name }}</p>
    </div>
@endisset

@isset($user->cpf)
    {{-- Cpf Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("cpf", \Lang::get("attributes.cpf").":") !!}
        <p>{{ $user->cpf }}</p>
    </div>
@endisset

@isset($user->phone_number)
    {{-- Phone Number Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("phone_number", \Lang::get("attributes.phone_number").":") !!}
        <p>{{ $user->phone_number }}</p>
    </div>
@endisset

@isset($user->photo)
    {{-- Photo Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label('photo', \Lang::get('attributes.photo').':') !!}
        {{-- Div needed to restrict link to img --}}
        <div>
            <a href="{{ $user->photo }}" target="_blank">
                <img class="thumbnail" src="{{ $user->photo }}" style="width:10%"/>
            </a>
        </div>
    </div>
@endisset

@isset($user->readable_created_at)
    {{-- Created At Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("created_at", \Lang::get("attributes.created_at").":") !!}
        <p>{{ $user->readable_created_at }}</p>
    </div>
@endisset

@isset($user->readable_updated_at)
    {{-- Updated At Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("updated_at", \Lang::get("attributes.updated_at").":") !!}
        <p>{{ $user->readable_updated_at }}</p>
    </div>
@endisset
