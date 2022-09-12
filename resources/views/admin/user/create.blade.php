@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User adding</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create user</li>
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
                <form action="{{ route('admin.user.store') }}" class="" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Type user name" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Type user email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Choose Role</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $roleId => $roleTitle)
                                <option value="{{ $roleId }}"
                                    {{ old('role') == $roleId ? ' selected' : '' }}
                                >{{ $roleTitle }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="pb-2">
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
