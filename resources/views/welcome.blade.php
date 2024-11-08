<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }
            .button{
                @apply bg-green-600 rounded text-white py-2 px-4;
            }

        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class='text-xl text-red-500'>Home</h2>
            <a href="/create" class="button">Add New Post</a>
        </div>
        @if (session('success'))
            <h2 class="text-green-600">{{ session('success') }}</h2>
        @endif
        <div class="">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 border border-green-400">
                                <thead class="bg-green-600 my-5 ">
                                    <tr class="text-white">
                                        <th scope="col "
                                            class="px-6 py-3 text-start text-xs font-medium  uppercase">ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Description</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium  uppercase">Image
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium  uppercase">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr class="odd:bg-white even:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                {{ $post->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $post->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $post->description }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800  ">
                                                <img src="images/{{ $post->image }}" width="60px" height="60" class=" w-10 h-10 rounded-full" alt="Error"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="{{route('edit',$post->id)}}"class="button">Edit</a>
                                                <a href="{{route('delete',$post->id)}}"class="bg-red-600 rounded text-white py-2 px-4">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                    </tr>
                                </tbody>
                            </table>
                            {{$posts -> links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
