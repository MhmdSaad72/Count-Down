@extends('adminlte::page')

@section('title', __('Themes'))

@section('content_header')
<h1>{{__('Themes')}}</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('/admin/posts/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                        <i class="fa fa-plus"></i> {{__('Add New')}}
                    </a>

                    <form method="GET" action="{{ url('/admin/posts') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="{{__('Search...')}}" value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br />
                    <br />
                    <div class="table-responsive">
                        {{-- <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
