<div>
    @foreach($posts as $post)
        <livewire:post :post="$post" :key="$post->id" />
    @endforeach
</div>
