@extends('dashboard.layouts.app')

@section('title',__('site.products'))
@section('products-active','sidebar-active')

@section('content')

    <div class="content-wrapper">

        <section class="content-header d-flex justify-content-between align-items-center">

            <h1>@lang('site.products')</h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-main"><a href="{{ route('dashboard.index') }}"><i class="nav-icon fas fa-tachometer-alt"></i> @lang('site.dashboard')</a></li>
                <li class="active"><span class="breadcrumb-span">/</span> @lang('site.products')</li>
                <li class="active"></i> <span class="breadcrumb-span-last">/</span> @lang('site.add')</li>
            </ol>

        </section>
        <hr>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="text-center"> <span class="header-title"> @lang('site.add') @lang('site.products') </span></h1>
                </div> <!-- end of box-header -->
                <hr>

                <div class="box-body">

                    @include('dashboard.partials._errors')

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                        <label>@lang('site.category')</label>
                            <select name="category_id" class="form-control input-height">
                                <option value="" selected disabled>@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->getTranslation('name', app()->getLocale()) }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach (config('app.supported_locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale .'.name')</label>
                                <input type="text" class="form-control form-control-sm" name="name[{{ $locale }}]" value="{{ old('name.' . $locale) }}" placeholder="@lang('site.name')">
                            </div>
                            <div class="form-group">
                                <label>@lang('site.' . $locale .'.description')</label>
                                <textarea class="form-control form-control-sm editor" style="height: 200px; width: 300px;" name="description[{{ $locale }}]" placeholder="@lang('site.description')">{{ old('description.' . $locale ) }}</textarea>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" class="form-control form-control-sm image" name="image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('storage/products/default.png') }}" style="width: 100px; height: 80px;" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.purchase_price')</label>
                            <input type="text" class="form-control form-control-sm" name="purchase_price" value="{{ old('purchase_price') }}" placeholder="@lang('site.purchase_price')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.sale_price')</label>
                            <input type="text" class="form-control form-control-sm" name="sale_price" value="{{ old('sale_price') }}" placeholder="@lang('site.sale_price')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.stock')</label>
                            <input type="text" class="form-control form-control-sm" name="stock" value="{{ old('stock') }}" placeholder="@lang('site.stock')">
                        </div>

                        <div class="form-group btn-fix-center">
                            <button type="submit" class="btn btn-primary btn-fix"> <i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form>

                </div> <!-- end of box-body -->

            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

@section('scripts')
    <script>
        const appLanguage = "{{ app()->getLocale() }}";

        tinymce.init({
            selector: '.editor',
            language: appLanguage, // Set TinyMCE language dynamically
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
            width: 1600,
            height: 300,
            menubar: false,
            branding: false,
            content_style: "body { font-family:Arial,sans-serif; font-size:14px }"
        });
    </script>
@endsection
