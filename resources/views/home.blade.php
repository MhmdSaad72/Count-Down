@if ($themeOne)
  @include('themes.theme-one')
@elseif ($themeTwo)
  @include('themes.theme-two')
@elseif ($themeThree)
  @include('themes.theme-three')
@elseif ($themeFour)
  @include('themes.theme-four')
@endif
