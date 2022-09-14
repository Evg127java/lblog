@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post editing</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit post</li>
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
                <form action="{{ route('admin.post.update', $post->id) }}" class="W-25" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Type post name"
                               value="{{ $post->title }}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" name="content" placeholder="Type content">
                            {!! $post->content !!}
                        </textarea>
                    </div>
                    @error('content')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label for="exampleInputFile">Add preview:</label>
                    @if(!is_null($post->preview))
                        <div class="w-25">
                            <img src="{{ Storage::url($post->preview) }}" alt="image_preview">
                        </div>
                    @endif
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
                    @if(!is_null($post->image))
                        <div class="w-25">
                            <img src="{{ Storage::url($post->image) }}" alt="image">
                        </div>
                    @endif
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
                                    {{ $post->category_id == $category->id ? ' selected' : '' }}
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
                            @if(isset($post->tags))
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ is_array($post->tags->pluck('id')->toArray()) && $post->tags->pluck('id')->contains($tag->id) ? ' selected' : '' }}
                                    >{{ $tag->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="pt-2 pb-2">
                        <input type="submit" value="Update" class="btn btn-block btn-info col-1">
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
