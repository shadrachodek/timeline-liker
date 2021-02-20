<div>
    @foreach($posts as $post)
        <div class="flex items-center justify-between borrder-b border-gray-200 p-3">
            <div class="flex">
                <img src="..." alt="..." class="w-12 h-12 rounded-full mr-4">
                <div>
                    <h2 class="font-semibold">
                        {{ $post->user->name }}
                        <span class="text-sm text-gray-500">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </h2>
                    <p class="mb-2">{{ $post->body }}</p>
                </div>
            </div>
            <div>
                Likes
            </div>
        </div>

    @endforeach
</div>
