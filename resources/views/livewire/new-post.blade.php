
<div class="mx-auto">

    <div class="mx-auto my-4">
        <textarea class="border-transparent h-32 shadow-lg rounded bg-gray-200 block mx-auto new-post-textarea" 
            id="write-post"
            placeholder="{{ __('New Post') }}"
            name="post"
            wire:model.defer="post">
        </textarea>

        <form class="grid my-2 justify-items-center">
        @if ($postImg)
            <img class="h-40 w-40 object-contain rounded uploaded-img" src="{{ $postImg->temporaryUrl() }}">
        @endif
            <div id="post-file" class="grid">
                <span>{{ __('Choose a related photo') }}</span>
                <input type="file" wire:model="postImg">
                @error('photo') <span class="error">{{ $message }}</span> @enderror

                <div wire:loading wire:target="postImg">
                    uploading image...
                </div>
            </div>
        </form>
    </div>


    <div class="container mx-auto my-2 flex justify-center content-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg post-button"
        wire:click="publish()"
        id="publish-post">
            {{ __('Post') }}
        </button>
    </div>

    <script type="text/javascript">

        var publish_post = document.getElementById("publish-post") , 
        post_file = document.getElementById("post-file")

        publish_post.style.display = "none"
        post_file.style.display = "none"

        document.getElementById("write-post").onkeyup = function(){

            let post_len = this.value.trim().length >=2

            publish_post.style.display = post_len ? "inline-block" : "none";
            post_file.style.display = post_len ? "grid" : "none";
        }

    </script>

    <script type="module">
        Livewire.on('postAdded' , () => {
            location.reload()
        })
    </script>

</div>



