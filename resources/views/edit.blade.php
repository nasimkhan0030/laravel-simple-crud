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

        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class='text-xl text-red-500'>Edit- {{$ourPost->name}}</h2>
            <a href="/" class="bg-green-600 rounded text-white py-2 px-4">Back to Home</a>
        </div>

        <div>
            <form method="POST" action="{{route('update', $ourPost->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                    Name <br>
                    <input type="text" name="name" value="{{$ourPost->name}}">

                    @error('name')
                    <p class="text-red-600">{{$message}}</p>  
                    @enderror

                    Description: <br>
                    <input type="text" name="description" value="{{$ourPost->description}}">

                    @error('description')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror

                    Select Image: <br>
                    <input type="file" name="image">

                    @error('image')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror

                    <div>
                        <input type="submit" value="Submit" class="bg-green-600  px-4 py-2 rounded">
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
