<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">

            <div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="@lang('site.search')">
                    </div>
                    <div class="col-md-4">
                        <a href="{{ auth()->user()->hasPermission('users_create') ? route('dashboard.users.create') : '#' }}"
                            class="btn btn-primary {{ auth()->user()->hasPermission('users_create') ? '' : 'disabled' }}">
                            <i class="fa fa-plus"></i> @lang('site.add')
                        </a>
                    </div>
                </div>
            </div> <!-- end of search -->

        </div> <!-- end of box-header -->

        <div class="box-body mt-4">
            @if ($users->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width='2%'>#</th>
                            <th width='20%'>@lang('site.name')</th>
                            <th width='20%'>@lang('site.email')</th>
                            <th width='20%'>@lang('site.image')</th>
                            <th width='40%'>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img src="{{ asset($user->image) }}" width="50px" height="50px">
                                </td>
                                <td>
                                    <a href="{{ auth()->user()->hasPermission('users_update') ? route('dashboard.users.edit', $user->id) : '#' }}"
                                        class="btn btn-success btn-sm {{ auth()->user()->hasPermission('users_update') ? '' : 'disabled' }}">
                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                    </a>
                                    <form action="{{ auth()->user()->hasPermission('users_delete') ? route('dashboard.users.destroy', $user->id) : '#' }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm {{ auth()->user()->hasPermission('users_delete') ? 'delete' : 'disabled' }}">
                                            <i class="fa fa-trash"></i> @lang('site.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links('') }}
            @else
                <h2>
                    @lang('site.no_data_found')
                </h2>
            @endif
        </div> <!-- end of box-body -->

    </div>

</section><!-- end of content -->
