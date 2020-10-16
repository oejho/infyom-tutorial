<li class="{{ Request::is('location/continents*') ? 'active' : '' }}">
    <a href="{{ route('location.continents.index') }}"><i class="fa fa-edit"></i><span>@lang('models/continents.plural')</span></a>
</li>

