<x-app-layout>
    <div class="py-4">
        <div class="p-5 max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>
                <!-- User Avatar -->
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />


                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="hover:underline">{{ $post->user->name }}</a>
                            &middot;
                            <a href="#" class="text-emerald-600">Follow</a>
                        </div>
                        <div class="flex gap-2 text-sm text-gray-500">
                            <span>
                                {{ $post->readTime() }} min read
                            </span>
                            &middot;

                                {{  $post->created_at->format('M d, Y') }}


                        </div>
                    </div>

                </div>





                <!-- Clap Section -->
                <x-clap-button />
                <!-- Content Section -->

                <div class="p-5 mt-4 ">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full" >

                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-300 rounded-2xl">
                        {{ $post->category->name }}
                    </span>
                </div>



                <!-- Clap Section -->
                <x-clap-button />




            </div>


        </div>
    </div>
</x-app-layout>
