@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    New Influencer
                </div>
                <div class="card-body">
                    <form action="/admin/influencers" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="screen_name">Twitter user</label>
                            <input type="text" class="form-control" name="screen_name" id="screen_name" placeholder="@miputotuit">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-danger" onclick="window.location = '/admin/influencers'">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
