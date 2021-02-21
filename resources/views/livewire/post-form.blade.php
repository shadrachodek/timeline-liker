<div>
    <form action="#" wire:submit.prevent="{{ $action }}">
        <div class="mb-3">
            <label for="body" class="sr-only">Post Body</label>
            <textarea name="body" id="body" cols="30" rows="3" class="w-full border-2
             border-gray-200 rounded-lg @error('body') border-red-500 @enderror" placeholder="Share something.."
                      wire:model.defer="body"></textarea>
            @error('body')
                <span class="font-semibold text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        @if($edit)
            <button
                wire:click="storeEditedPost"
                class="h-10 px-4 text-center text-white bg-indigo-500 font-medium rounded-lg">
                Edit it
            </button>
        @else
            <button type="submit"
                    class="h-10 px-4 text-center text-white bg-indigo-500 font-medium rounded-lg">
                Post it
            </button>
        @endif
    </form>
</div>
