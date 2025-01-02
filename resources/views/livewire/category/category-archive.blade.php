<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">

            <div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="@lang('site.search')">
                    </div>
                </div>
            </div>
        </div> <!-- end of search -->
    </div> <!-- end of box-header -->

        <div class="box-body mt-4">
            @if ($categories->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width='2%'>#</th>
                            <th width='40%'>@lang('site.name')</th>
                            <th width='40%' class="text-center">@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->getTranslation('name', app()->getLocale()) }}</td>
                                <td class="text-center">
                                    <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success restore btn-archive">@lang('site.restore')</button>
                                    </form>
                                    <form action="{{ route('dashboard.categories.force_delete', $category->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete btn-force-delete btn-archive">@lang('site.force_delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links('') }}
            @else
                <h2>
                    @lang('site.no_data_found')
                </h2>
            @endif
        </div> <!-- end of box-body -->

    </div>

</section><!-- end of content -->
