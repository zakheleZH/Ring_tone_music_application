@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 50px;">
                <div class="card-header">{{$ringtone->title}}</div>

                <div class="card-body">
                     <audio controls controlsList="nodownload">
                                <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
                                Your browser does not support this element
                </audio>
                </div>
                <div class="card-footer">
                    <form action="{{route('ringtones.download',[$ringtone->id])}}" method="post">@csrf
                    <button type="submit" class="btn btn-secondary btn-sm">Download</button>
                </form>

                </div>


                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>



            </div>
            <table class="table mt-4">
                <tr>
                    <th>Name</th>
                    <td>{{$ringtone->title}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$ringtone->description}}</td>
                </tr>
                <tr>
                    <th>Format</th>
                    <td>{{$ringtone->format}}</td>
                </tr>
                <tr>
                    <th>Size</th>
                    @php
                        $size = $ringtone->size/1000000;
                        $real_size = (int)$size;
                    @endphp


                    <td>{{$real_size}} MB</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$ringtone->category->name}}</td>
                </tr>
                <tr>
                    <th>Download</th>
                    <td>{{$ringtone->download}}</td>
                </tr>

            </table>
            </div>
            <div class="col-md-4"style="margin-top: 50px;">
            <div class="card-header">Categories</div>
            @foreach(App\Models\Category::all() as $category)
                <div class="card-header" style="background-color: #ccc;"><a href="{{route('ringtones.category',[$category->id])}}"> {{$category->name}}</a></div>

            @endforeach

        </div>



    </div>


@endsection
