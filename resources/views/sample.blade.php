<form method="GET" action="{{ route('your.index.route') }}" class="mb-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="form-control" />
</form>
