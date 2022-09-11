@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post adding</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form action="{{ route('admin.post.store') }}" class="W-25" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Type post name"
                               value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" name="content" placeholder="Type content"></textarea>
                    </div>
                    @error('content')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label for="exampleInputFile">Add preview:</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="preview">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('preview')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label for="exampleInputFile">Add main image:</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Choose Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 's elected' : '' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Choose tags</label>
                        <select multiple="multiple" class="select2" data-placeholser="Choose tags" style="width: 100%;"
                                name="tags[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ is_array(old('tags')) && in_array($tag->id, old('tags'), false) ? ' selected' : '' }}
                                >{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-2 pb-2">
                        <input type="submit" value="Create" class="btn btn-block btn-info col-1">
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
