@extends('layouts.front.app')
@section('body')
<div class="col-lg-8">
    <!-- title -->
    <h1 class="mt-4">{{ $articles->title }}</h1>

    <!-- author -->
    <p class="lead">
        by
        <a href="#">{{ $articles->category->name }}</a>
    </p>

    <hr>

    <!-- date/time -->
    <p>{{ date('d M Y',strtotime($articles->created_at)) }}</p>

    <hr>
    <p>{{ $articles->content }}</p>
 
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('storage/'.$articles->file)}}" alt="..." /></figure>
        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <h5 class="card-header">Leave a Comment :</h5>
                <div class="card-body">
                    <!-- Single comment-->
                    <!-- Comment form-->
                    <form method="POST" action="{{ route('article.comment', ['id' => $articles->id]) }}">
                        @csrf
                        <div class="form-group">
                            <p>Name : </p>
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <p>Comment : </p>
                            <input class="form-control" type="text" name="komentar">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <!-- Single comment-->
                        @foreach($komen as $k)
                        @if ($k->id_article==$id)
                        <div class="d-flex">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="{{$k->profile_photo}}" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">{{ $k->name }}</div>
                                <p>{{ $k->comment }}</p>
                            </div>
                        </div>  
                        @endif
                        @endforeach
                </div>
            </div>
        </section>

</div>
@endsection