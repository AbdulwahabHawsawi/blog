@extends('layouts/main')

@section('title', '| Edit Title')

@section('scripts')
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
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>Edit Post</h1>
                    <hr>
                    <form method='POST' action="{{ route('posts.update', ['post' => $post->id]) }}" id="submitForm"
                        data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <label for="title">Title: </label>
                        <input class="form-control" type="text" id="title" name="title" value='{{ $post->title }}'>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                            </ul>
                        </select>
                        <label class='form-label  mt-3' for="tags">Tags: </label>
                        <br>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            @php
                                $post_tag_ids = array_map(fn($hello): string => $hello['id'], $post->tags->toArray());
                            @endphp
                            @foreach ($tags as $tag)
                                <input type="checkbox" class="btn-check" id="{{ $tag->id }}" autocomplete="off"
                                    name="tags[]" value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $post_tag_ids) ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary" for="{{ $tag->id }}">{{ $tag->name }}</label>
                            @endforeach
                        </div>
                        <br>


                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <select class="form-select select2-multi" name="tags[]" multiple='multiple' id="select2-">
                                <option>Select tag(s):</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="slug">Slug: </label>
                        <input class="form-control" type="text" id="slug" name="slug"
                            value='{{ $post->slug }}'>
                        <label for="body">Post Body: </label>
                        <textarea class="form-control" rows=20 name="body" id="body" data-parsley-required="">{{ $post->body }}</textarea>
                        <div class="d-grid gap-2 my-3">
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body bg-light">
                <dl>
                    <dt>Posted On:</dt>
                    <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s', $post->created_at)->format('o M. j | G:i') }}</dd>
                    <dt>Last Updated:</dt>
                    <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s', $post->updated_at)->format('o M. j | G:i') }}</dd>
                </dl>

                <a class="btn btn-danger btn-block" href="{{ route('posts.index') }}">Cancel</a>
                <input class="btn btn-success btn-lg btn-block my-3" form="submitForm" type="submit" value="Save">
            </div>
        </div>
    </div>
@endsection
