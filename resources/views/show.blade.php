@extends('layout')

@section('content')
      <div style="padding-left:50px">
        <h1>review</h1>
        <p>{{ $message }}</p>
        <!-- <img style= width:300px;float:left src= {{ $posts }} > -->
        <!-- <img style="width:300px;margin-bottom:30px" src={{ $article->image_url }}> -->
        <!-- <div style="display: inline-block;padding-left:50px;position:relative;bottom:100px;font-size:130%;width:700px"> -->
        <!-- <p style="margin-bottom:10px;border-bottom:dotted 1px #00e7ff">{{ $article->titile }}</p>
        <p style="display:none">{{ $article->user_name }}</p>
        <p style="margin-right:100px;padding-top:50px">{{ $article->content }}</p> -->
        <div class="row">
          <div class="col-xs-4 col-lg-4">
              <img style="width:300px;margin-bottom:30px" src={{ $article->image_url }}>
          </div>
          <div class="col-xs-4 col-lg-6">
              <p style="display:block;border-bottom:dotted 1px #00e7ff;font-size:160%;font-weight:400">{{ $article->titile }}</p>
              <p style="display:block;font-size:110%">{{ $article->content }}</p>
              <p style="display:block;color:#696975">{{ $article->user_name }}</p>
          </div>
        </div>
        <p></p>
        <div>
        @unless(Auth::user())
            {{ Form::open(['method' => 'post', 'route' => ['likes.showFlash', $article->id]]) }}
              {{ Form::submit('いいね',['class'=>'btn btn-outline-secondary']) }} {{ $count_like_users }}
            {{ Form::close() }}

          @if(session('flash_message'))
          <P>{{ session('flash_message')}}</p>
          @endif

        @else
              @auth
                    @if(Auth::user()->is_like($article->id))

                      {{ Form::open(['method' => 'delete', 'route' => ['likes.unlike', $article->id]]) }}
                          {{ Form::submit('いいねを外す',['class'=>'btn btn-outline-secondary']) }}
                          {{ $count_like_users }}
                      {{ Form::close() }}

                    @else

                    {{ Form::open(['method' => 'posts', 'route' => ['likes.like', $article->id]]) }}
                          {{ Form::submit('いいね',['class'=>'btn btn-outline-secondary']) }}
                          {{ $count_like_users }}
                      {{ Form::close() }}

                    @endif

              @endauth
        @endif
        </div>
        <p>
            <a href={{ route('article.list') }} class='btn btn-outline-primary'>一覧に戻る</a>
        </p>
        <div>
            @auth 
              @if ($article->user_id ===$login_user_id)
                    {{ Form::open(['method' => 'delete', 'route' => ['article.delete', $article->id]]) }}
                        {{ Form::submit('削除',['class'=>'btn btn-outline-secondary']) }}
                        <a href={{ route('article.edit',['id' =>$article->id]) }} class='btn btn-outline-primary'>編集</a>
                    {{ Form::close() }}
              @endif
            @endauth
        </div>
      </div>
@endsection


