@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('categorys.show_fields')
                    <a href="{{ route('categorys.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection