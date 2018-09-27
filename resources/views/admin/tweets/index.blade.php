@extends('layouts.admin')

@section('content')

    <admin-influencer-tweets-view inline-template>
        <div>
            <h1>{{ $influencer->name }}</h1>
            <tweets></tweets>
        </div>
    </admin-influencer-tweets-view>
@endsection