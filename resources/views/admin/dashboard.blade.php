@extends('layouts.admin')

@section('content')
<section class="py-5">
    <div class="row gy-4">

        <div class="col-lg-4 col-md-6">
            <!-- Dashboard Item-->
            <div class="card rounded-lg card-striped card-striped-gradient-success">
                <div class="card-body rounded-lg bg-white shadow-sm p-lg-4">
                    <h2 class="h5 text-uppercase letter-spacing-0 mb-0 fw-bold">{{__('All subscribers')}}</h2>
                    <p class="text-gray-500 mb-4">{{__('Users that confirmed their emails')}}</p>
                    <p class="h1 mb-0 fw-bold text-success">{{ $all_users }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <!-- Dashboard Item-->
            <div class="card rounded-lg card-striped card-striped-gradient-danger">
                <div class="card-body rounded-lg bg-white shadow-sm p-lg-4">
                    <h2 class="h5 text-uppercase letter-spacing-0 mb-0 fw-bold">{{__('New subscribers')}}</h2>
                    <p class="text-gray-500 mb-4">{{__('Users that haven\'t')}}</p>
                    <p class="h1 mb-0 fw-bold text-danger">{{ $new_users }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <!-- Dashboard Item-->
            <div class="card rounded-lg card-striped card-striped-gradient-info">
                <div class="card-body rounded-lg bg-white shadow-sm p-lg-4">
                    <h2 class="h5 text-uppercase letter-spacing-0 mb-0 fw-bold">{{__('Page views')}}</h2>
                    <p class="text-gray-500 mb-4">{{__('All the subscribers all time')}}</p>
                    <p class="h1 mb-0 fw-bold text-info">{{ $views }}</p>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection
