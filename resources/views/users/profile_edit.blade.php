
@extends("layouts.app")

@section("content")
    <h1 class="border-bottom mb-4">投稿編集ページ</h1>
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
                {!! Form::file('profile_image') !!}
                {!! Form::submit("Update", ["class" => "btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

{{--
{!! Form::open(['route' => ['users.profile_update', $user->id], "enctype" => "multipart/form-data", "method" => 'put', "files" => true]) !!}
    {!! Form::file('profile_image') !!}
    {!! Form::submit('Upload', ['class' => 'btn btn-outline-success btn-sm']) !!}
{!! Form::close() !!}
--}}

{{--
<img src="{{ asset("storage/profiles/".str_replace('public/profiles/', '',$user->profile_image)) }}">

{!! Form::open(['route' => ['users.profile_update', $user->id], "enctype" => "multipart/form-data", "method" => 'put', "files" => true]) !!}
    {!! Form::file('profile_image') !!}
    {!! Form::submit('Upload', ['class' => 'btn btn-outline-success btn-sm']) !!}
{!! Form::close() !!}
--}}
