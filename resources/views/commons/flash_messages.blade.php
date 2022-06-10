
    @if (session('update_profile_message'))
        <div class="alert alert-success">
            {{ session('update_profile_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (session('edit_post_message'))
        <div class="alert alert-success">
            {{ session('edit_post_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (session('delete_post_message'))
        <div class="alert alert-danger">
            {{ session('delete_post_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (session('post_message'))
        <div class="alert alert-success">
            {{ session('post_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @endif
    
    @if (session('unfavorite_message'))
        <div class="alert alert-dark">
            {{ session('unfavorite_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @endif
    
    @if (session('favorite_message'))
        <div class="alert alert-warning">
            {{ session('favorite_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @endif
    
    @if (session('follow_message'))
        <div class="alert alert-primary">
            {{ session('follow_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @endif
    
    @if (session('unfollow_message'))
        <div class="alert alert-danger">
            {{ session('unfollow_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @endif
    