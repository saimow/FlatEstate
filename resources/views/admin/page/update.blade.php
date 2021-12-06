@extends('layouts.admin.master')

@section('content')
<div>
    <h2>Create Page</h2>
    <form action="{{route('page.update', $page->id)}}" method="post">
    @csrf
    <div class="row">
        
        <div class="col-9">
            <div class="card py-2 px-3">
                <div class="form-group">
                    <label for="name" class="m-0">Name <strong class="text-danger">*</strong></label>
                    <input type="text" value="{{$page->name}}" class="form-control bg-light @error('name') is-invalid @enderror" placeholder="Name" name="name" id="name">
                    @error('name')
                        <p class="text-danger mb-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="m-0">Slug <strong class="text-danger">*</strong></label>
                    <input type="text" value="{{$page->slug}}" class="form-control bg-light @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" id="slug">
                    @error('slug')
                        <p class="text-danger mb-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="m-0">Content</label>
                    <textarea class="form-control bg-light @error('content') is-invalid @enderror" placeholder="content" name="content" id="content" rows="3">{{$page->content}}</textarea>
                    @error('content')
                        <p class="text-danger mb-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-primary font-weight-bold m-0">Publish</h5>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mr-1">Submit</button>
                    <button class="btn btn-danger mx-1">Cancel</button>
                </div>
            </div>
            <div class="mt-2 card">
                <div class="card-header">
                    <h5 class=" m-0">Status <strong class="text-danger">*</strong></h5>
                </div>
                <div class="card-body">
                    <select name="status" class="form-control">
                    <option value="published" @if($page->status=='published') selected @endif>Published</option>
                        <option value="draft" @if($page->status=='draft') selected @endif>Draft</option>
                    </select>
                </div>
            </div>
        </div>
        
    </div>
</form>
</div>
    
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );

</script>
<script>
    $('#name').change(function(e){
        $.get("{{route('page.checkSlug') }}",
            {'name': $(this).val() },
            function(data){
                $('#slug').val(data.slug);
            }
        );
    });
</script>
@endsection