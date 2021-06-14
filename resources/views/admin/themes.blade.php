@extends('layouts.admin')

@section('content')
<section class="py-5">
    <div class="row gy-5 mb-4">
      @foreach ($all_themes as $key => $value)
        <!-- Theme Item-->
        <div class="col-lg-6">
          <h2 class="h5 text-uppercase letter-spacing-0 mb-0">{{ $value->name ?? '' }}</h2>
          <p class="text-muted mb-4">{{ $value->description($key) }}</p>
          <!-- Theme Item Card-->
          <div class="card theme-card shadow rounded-lg" style="background: url({{ $value->activeImage() ?? asset('img/index1.png')}})">
            <div class="card-overlay p-3">
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <form  action="{{ route('active.theme' , $value->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    @if ($value->active == 1)
                      <button class="btn btn-gradient-success btn-sm apply-btn" type="button"><i class="fas fa-check me-2"></i>{{__('Applied')}}</button>
                    @else
                      <button class="btn btn-gradient-success btn-sm apply-btn" type="submit">{{__('Apply theme')}}</button>
                    @endif
                    <span class="btn btn-gradient-success btn-sm applied-btn">
                      <i class="fas fa-check me-2"></i>
                      {{__('Applied')}}
                    </span>
                  </form>
                </li>
                <li class="list-inline-item">
                  <a class="btn btn-light bg-white btn-sm edit-btn" href="{{ route('single-theme' , $value->id) }}">{{__('Edit theme')}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      @endforeach


    </div>
</section>
@endsection
