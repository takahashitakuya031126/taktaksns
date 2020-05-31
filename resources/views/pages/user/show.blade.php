@extends('layouts.app')

@section('content')
  <div class="p-user-show">

    <div class="c-user-profile">
      <div class="profile">

          <div class="profile-image">

            <img src="{{ $user->logo_url }}" alt="">

          </div>

          <div class="profile-user-settings">

            <h1 class="profile-user-name">{{ $user->name }}_</h1>

            @if($user->is_following)
              <form action="{{ route('follows.destroy', $user->follow_id) }}" method="POST" style="display: inline;">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <button class="profile-edit-btn" style="color: #fff; background-color: #0095f6;" type="submit">unfollow</button>
              </form>
            @else
              <form action="{{ route('follows.store') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <button class="profile-edit-btn" type="submit">follow</button>
              </form>
            @endif
          </div>

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($user->posts) }}</span> posts</li>
              <li><span class="profile-stat-count">{{ count($user->followers) }}</span> followers</li>
              <li><span class="profile-stat-count">{{ count($user->following) }}</span> following</li>
            </ul>

          </div>

          <div class="profile-bio">

            <p><span class="profile-real-name">{{ $user->name }}</span>️</p>

          </div>

      </div>
    </div>
    <!-- End of profile section -->

    @include('components.post.gallery', ['posts' => $user->posts])
    
  </div>
@endsection