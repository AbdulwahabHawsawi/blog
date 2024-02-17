@extends('layouts/main')

@section('title', '| Create New Post')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script script src="https://cdn.tiny.cloud/1/{{ config('services.TinyMCE.key') }}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <form method='POST' action="{{ route('posts.store') }}" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                <label for="title">Title: </label>
                <input class="form-control" type="text" id="title" name="title" data-parsley-required="">
                <label for="category">Category: </label>
                <select class="form-select" name="category_id">
                    <option>Select a Category:</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </ul>
                </select>
                <label class='form-label  mt-3' for="tags">Tags: </label>
                <br>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($tags as $tag)
                        <input type="checkbox" class="btn-check" id="{{ $tag->id }}" autocomplete="off" name="tags[]"
                            value="{{ $tag->id }}">
                        <label class="btn btn-outline-primary" for="{{ $tag->id }}">{{ $tag->name }}</label>
                    @endforeach
                </div>
                <br>

                <label for="slug">Slug: </label>
                <input class="form-control mb-3" type="text" id="title" name="slug" data-parsley-required="">

                <label for="thumbnail ">Thumbnail: </label>
                <input class="form-control mb-3" type="file" id="thumbnail" name="thumbnail" data-parsley-required="">

                <label for="body">Post Body: </label>
                <textarea class="form-control" rows=20 name="body" id="body" data-parsley-required=""></textarea>
                <div class="d-grid gap-2 my-3">
                    <input class="btn btn-success btn-lg btn-block" type="submit" value="Create New Post">
                </div>

            </form>
        </div>
    </div>
@endsection
