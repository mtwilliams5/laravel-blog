<div class="container">
    <ul class="nav nav-pills nav-justified">
        <li role="presentation"{{ (Route::is('admin.index' )) ? ' class=active' : '' }} >
            <a href="{{ (Route::is('admin.index')) ? '#' : route('admin.index') }}">Manage Posts</a>
        </li>
        <li role="presentation"{{ (Route::is('admin.tags.index')) ? ' class=active' : '' }} >
            <a href="{{ (Route::is('admin.tags.index')) ? '#' : route('admin.tags.index') }}">Manage Tags</a>
        </li>
        <li role="presentation"{{ (Route::is('admin.users.index')) ? ' class=active' : '' }} >
            <a href="{{ (Route::is('admin.users.index')) ? '#' : route('admin.users.index') }}">Manage Users</a>
        </li>
    </ul>
</div>