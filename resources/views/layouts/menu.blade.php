<li class="{{ Request::is('location/continents*') ? 'active' : '' }}">
    <a href="{{ route('location.continents.index') }}"><i class="fa fa-edit"></i><span>@lang('models/continents.plural')</span></a>
</li>

<li class="{{ Request::is('admin/location/continents*') ? 'active' : '' }}">
    <a href="{{ route('admin.location.continents.index') }}"><i class="fa fa-edit"></i><span>@lang('models/continents.plural')</span></a>
</li>

