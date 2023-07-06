@extends('layouts.back.app')
@section('content')
    <div class="col-lg-8">
        <h1 class="mt-4">Create Artikel</h1>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" @error('category') is-invalid @enderror name="category">
                    <option value=""@if(old('category')=='' or old('category')==0) selected="selected" @endif>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"@if(old('category')==$category->id) selected="selected" @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" @error('title') is-invalid @enderror name="title" value="{{old('title')}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Artikel</label>
                <textarea class="form-control" rows="4" @error('content') is-invalid @enderror name="content">{{old('content')}}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>File</label>
                <input type="file" class="form-control" @error('file') is-invalid @enderror name="file" accept="image/*">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
    </div>
        
@endsection