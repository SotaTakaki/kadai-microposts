@extends('layouts.app')

@section('content')

    <h1 class="border-bottom mb-4">投稿編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}

                <div class="form-group">
                {{--    {!! Form::label('content', 'Content:') !!} --}}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-outline-success btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection