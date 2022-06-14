
@extends("layouts.app")

@section("content")
    <h1 class="border-bottom mb-4">プロフィール編集ページ</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ["route" => ["users.profile_update", $user->id], "method" => "put", "enctype" => "multipart/form-data"]) !!}
            
                <div class="form-group">
                    {!! Form::label("name", "name:") !!}
                    {!! Form::text("name", null, ["class" => "form-control"]) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label("email", "email:") !!}
                    {!! Form::text("email", null, ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("affiliation", "affiliation:") !!}
                    {!! Form::text("affiliation", null, ["class" => "form-control"]) !!}
                </div>
                
                {!! Form::file('profile_image') !!}
                {!! Form::submit("Update", ["class" => "btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
